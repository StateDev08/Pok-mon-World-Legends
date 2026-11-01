<?php

final class Security
{
    // Public informational popups do not need a selected trainer.
    public const PUBLIC_AJAX = ['privacy', 'rules', 'terms', 'pokemon_info'];
    public const AJAX_ACTIONS = [
        'box', 'change-sound', 'daily-bonus', 'honor', 'league', 'map_ajax',
        'map_users', 'new-chat', 'new-message', 'poke_stats', 'poke-loot',
        'poke-puffin', 'pokemon_info', 'privacy', 'release-box',
        'remove_league_ad', 'rules', 'sell-box', 'soltar', 'terms',
        'transfer-box', 'transferlist-remove', 'use_attack_finish',
        'use_attack', 'use_equip_item', 'use_item_equip', 'use_potion',
        'use_rarecandy', 'use_spcitem', 'use_stone',
    ];

    public static function ajaxFile($action)
    {
        if (!is_string($action) || !in_array($action, self::AJAX_ACTIONS, true)) {
            return null;
        }
        return dirname(__DIR__) . '/ajax/' . $action . '.php';
    }

    public static function positiveId($value)
    {
        if ((!is_string($value) && !is_int($value)) ||
            !preg_match('/^[1-9][0-9]*$/D', (string) $value)) {
            return null;
        }
        $id = filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        return $id === false ? null : $id;
    }

    public static function teamIds($values)
    {
        if (!is_array($values) || count($values) < 1 || count($values) > 6) {
            return null;
        }
        $ids = [];
        foreach ($values as $value) {
            $id = self::positiveId($value);
            if ($id === null || in_array($id, $ids, true)) {
                return null;
            }
            $ids[] = $id;
        }
        return $ids;
    }

    public static function safeItemIdentifier($value)
    {
        return is_string($value) && strpos($value, '`') === false &&
            !preg_match('/[\x00-\x1f\x7f]/', $value);
    }

    // Compatibility for legacy SQL callers; new queries should use parameters.
    public static function escapeInput($value)
    {
        if (is_array($value)) {
            return array_map([self::class, 'escapeInput'], $value);
        }
        return DB::real_escape_string((string) $value);
    }

    public static function ajaxIdentity(array $session, $sessionId)
    {
        $accountId = self::positiveId($session['acc_id'] ?? null);
        $trainerId = self::positiveId($session['id'] ?? null);
        if ($accountId === null || $trainerId === null || $sessionId === '') {
            return null;
        }
        $account = DB::exQuery("SELECT * FROM `rekeningen` WHERE `acc_id`={$accountId} LIMIT 1")->fetch_assoc();
        if (!$account || (string) $account['account_code'] !== '1' ||
            ($account['bloqueado'] ?? '') === 'sim' ||
            empty($account['keylog']) || !is_string($session['keylog'] ?? null) ||
            !hash_equals((string) $account['keylog'], $session['keylog'])) {
            return null;
        }
        $trainer = DB::exQuery("SELECT * FROM `gebruikers` WHERE `user_id`={$trainerId} AND `acc_id`={$accountId} LIMIT 1")->fetch_assoc();
        if (!$trainer || ($trainer['banned'] ?? '') === 'Y' ||
            !hash_equals((string) ($trainer['session'] ?? ''), $sessionId)) {
            return null;
        }
        return ['account' => $account, 'trainer' => $trainer];
    }
}
