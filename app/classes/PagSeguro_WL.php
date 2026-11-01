<?php
require_once(__DIR__ . '/../includes/PaymentSecurity.php');

class PagSeguro {
    public function getCode($id, $name, $price, $id_ref) {
        $email = Env::get('PAGSEGURO_EMAIL', '');
        $token = Env::get('PAGSEGURO_TOKEN', '');
        if ($email === '' || $token === '') {
            error_log('Payment configuration required.');
            return null;
        }
        try {
            $xml = PaymentSecurity::request('https://ws.pagseguro.uol.com.br/v2/checkout', [
                'token' => $token, 'email' => $email, 'currency' => 'BRL',
                'itemId1' => $id, 'itemQuantity1' => '1',
                'itemDescription1' => $name, 'itemAmount1' => $price,
                'reference' => $id_ref, 'shippingAddressRequired' => 'false',
            ]);
            $code = (string) $xml->code;
            return preg_match('/^[A-Za-z0-9-]{6,128}$/D', $code) ? $code : null;
        } catch (Throwable $error) {
            error_log('Payment checkout request failed.');
            return null;
        }
    }
}
?>

}