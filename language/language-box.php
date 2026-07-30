<?php
$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');
if (isset($_COOKIE['pa_language']) && in_array($_COOKIE['pa_language'], $language_array, true))
	$_COOKIE['pa_language'] = $_COOKIE['pa_language'];
else
	$_COOKIE['pa_language'] = 'pt';
set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once('box/language-box-' . $_COOKIE['pa_language'] . '.php');
restore_error_handler();
