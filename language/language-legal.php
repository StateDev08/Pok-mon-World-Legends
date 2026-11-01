<?php
require_once __DIR__ . '/resolve.php';
$legal_lang = resolve_game_language();
$_COOKIE['pa_language'] = $legal_lang;
set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once(__DIR__ . '/legal/language-legal-' . $legal_lang . '.php');
restore_error_handler();
