<?php

final class PaymentSecurity
{
    public const PROCESSING = 'security_processing';

    public static function cents($value)
    {
        if (!is_string($value) || !preg_match('/^([0-9]{1,9})(?:[.,]([0-9]{2}))?$/D', $value, $matches)) {
            return null;
        }
        return ((int) $matches[1]) * 100 + (int) ($matches[2] ?? '0');
    }

    public static function validateTransaction($xml, array $invoice)
    {
        $actual = self::cents((string) $xml->grossAmount);
        $expected = self::cents((string) $invoice['valor']);
        return (string) $xml->reference === (string) $invoice['id'] &&
            (string) $xml->currency === 'BRL' && $actual !== null &&
            $expected !== null && $expected > 0 && $actual === $expected &&
            preg_match('/^[1-9][0-9]*$/D', (string) $invoice['id_user']) &&
            preg_match('/^[1-9][0-9]*$/D', (string) $invoice['user_id']);
    }

    public static function alreadyClaimed($status)
    {
        // Legacy statuses 3 and 4 indicate paid/available invoices.
        return in_array((string) $status, ['3', '4', self::PROCESSING], true);
    }

    public static function processInvoice($reference, $xml, callable $credit)
    {
        if (!is_int($reference) || $reference < 1 ||
            !in_array((string) $xml->status, ['1','2','3','4','5','6','7','8','9'], true)) {
            return 400;
        }
        $lockName = 'wl_payment_' . $reference;
        $lock = DB::exQuery("SELECT GET_LOCK('{$lockName}', 5) AS acquired")->fetch_assoc();
        if ((string) ($lock['acquired'] ?? '') !== '1') {
            return 503;
        }
        try {
            $invoice = DB::exQuery("SELECT * FROM fatura WHERE id={$reference} LIMIT 1")->fetch_assoc();
            if (!$invoice || !self::validateTransaction($xml, $invoice)) {
                return 400;
            }
            if ($invoice['status'] === self::PROCESSING) {
                error_log('Payment invoice ' . $reference . ' requires manual reconciliation.');
                return 503;
            }
            if (self::alreadyClaimed($invoice['status'])) {
                return 200;
            }
            $status = (string) $xml->status;
            if (!in_array($status, ['3', '4'], true)) {
                DB::exQuery("UPDATE fatura SET status='{$status}' WHERE id={$reference}");
                return 200;
            }
            $packId = (int) $invoice['pack_id'];
            $pack = DB::exQuery("SELECT * FROM donate_packs WHERE id={$packId} LIMIT 1")->fetch_assoc();
            $accountId = (int) $invoice['id_user'];
            $trainerId = (int) $invoice['user_id'];
            $owner = DB::exQuery("SELECT g.user_id FROM gebruikers g INNER JOIN rekeningen r ON r.acc_id=g.acc_id WHERE g.user_id={$trainerId} AND r.acc_id={$accountId} LIMIT 1")->fetch_assoc();
            if (!$pack || !$owner) {
                throw new RuntimeException('Invalid payment recipient or pack.');
            }
            // This claim must commit before touching the legacy MyISAM reward tables.
            DB::exQuery("UPDATE fatura SET status='security_processing' WHERE id={$reference}");
            $credit($invoice, $pack);
            DB::exQuery("UPDATE fatura SET status='3' WHERE id={$reference}");
            return 200;
        } finally {
            DB::exQuery("SELECT RELEASE_LOCK('{$lockName}')");
        }
    }

    public static function request($url, $postFields = null)
    {
        if (!extension_loaded('curl') || !extension_loaded('simplexml')) {
            throw new RuntimeException('Payment extensions unavailable.');
        }
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
        ]);
        if ($postFields !== null) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postFields));
        }
        $body = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);
        if (!is_string($body) || $code < 200 || $code >= 300 ||
            stripos($body, '<!DOCTYPE') !== false || stripos($body, '<!ENTITY') !== false) {
            throw new RuntimeException('Payment provider request failed.');
        }
        $previous = libxml_use_internal_errors(true);
        try {
            $xml = simplexml_load_string($body, 'SimpleXMLElement', LIBXML_NONET);
            if ($xml === false) {
                throw new RuntimeException('Invalid payment response.');
            }
            return $xml;
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
    }
}
