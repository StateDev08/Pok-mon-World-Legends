<?php
require_once __DIR__ . '/resolve.php';
require_once __DIR__ . '/move-label.php';
$lang = resolve_game_language();
$_COOKIE['pa_language'] = $lang;
set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once(__DIR__ . '/pages/language-pages-' . $lang . '.php');
restore_error_handler();

if (!isset($txt['pagetitle'])) $txt['pagetitle'] = 'Pokémon World Legends';
