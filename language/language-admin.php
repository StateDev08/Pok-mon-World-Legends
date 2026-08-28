<?php
$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');

$lang = $_COOKIE['pa_language'] ?? $_SESSION['pa_language'] ?? 'pt';
if (!in_array($lang, $language_array, true)) $lang = 'pt';

set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once('admin/language-admin-' . $lang . '.php');
restore_error_handler();
