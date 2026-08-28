<?php
$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');

$legal_lang = $_COOKIE['pa_language'] ?? $_SESSION['pa_language'] ?? 'pt';
if (!in_array($legal_lang, $language_array, true)) $legal_lang = 'pt';

set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once('legal/language-legal-' . $legal_lang . '.php');
restore_error_handler();
