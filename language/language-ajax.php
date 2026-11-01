<?php
require_once __DIR__ . '/resolve.php';
$lang = resolve_game_language();
$_COOKIE['pa_language'] = $lang;
set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once(__DIR__ . '/ajax/language-ajax-' . $lang . '.php');
restore_error_handler();
