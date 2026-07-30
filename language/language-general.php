<?php
ob_start();

$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');

if (isset($_GET['language']) && in_array($_GET['language'], $language_array, true)) {
	$_SESSION['pa_language'] = $_GET['language'];
	setcookie('pa_language', $_GET['language'], time() + (86400 * 365), '/');
	$page = $_GET['page'] ?? '';
	$page = preg_replace('/[^a-zA-Z0-9\/\-_]/', '', $page);
	$page = str_replace('..', '', $page);
	$page = ltrim($page, '/');
	$page = preg_replace('#/{2,}#', '/', $page);
	exit(header('Location: ./' . urlencode($page)));
}

$lang = $_COOKIE['pa_language'] ?? $_SESSION['pa_language'] ?? 'pt';
if (!in_array($lang, $language_array, true)) $lang = 'pt';
$_COOKIE['pa_language'] = $lang;

set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once('general/language-general-' . $lang . '.php');
restore_error_handler();

ob_flush();
