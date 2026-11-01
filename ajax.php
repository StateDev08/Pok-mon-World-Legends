<?php
require_once __DIR__ . '/app/includes/GameUrl.php';
require_once(__DIR__ . '/app/includes/Security.php');
$action = $_GET['act'] ?? null;
if ($action === null) {
    game_redirect_header('Location: ./home');
    exit;
}
$file = Security::ajaxFile($action);
if ($file === null || !is_file($file)) {
    http_response_code(400);
    exit('Bad request!');
}

ob_start();
require_once(__DIR__ . '/app/includes/resources/config.php');
require_once(__DIR__ . '/language/language-general.php');
require_once(__DIR__ . '/language/language-user.php');
require_once(__DIR__ . '/app/includes/resources/ingame.inc.php');

if (!in_array($action, Security::PUBLIC_AJAX, true)) {
    $identity = Security::ajaxIdentity($_SESSION, session_id());
    if ($identity === null) {
        http_response_code(401);
        exit('Authentication required.');
    }
    $rekening = $identity['account'];
    $gebruiker = $identity['trainer'];
}
if (in_array($action, ['use_attack', 'use_attack_finish', 'use_equip_item', 'use_item_equip', 'use_potion', 'use_rarecandy', 'use_spcitem', 'use_stone'], true)) {
    foreach ([$_GET['name'] ?? null, $_POST['item'] ?? null] as $identifier) {
        if ($identifier !== null && !Security::safeItemIdentifier($identifier)) {
            http_response_code(400);
            exit('Bad request!');
        }
    }
}
$page = $action;
require_once(__DIR__ . '/language/language-ajax.php');
require($file);
ob_end_flush();
