<?php
ob_start();

$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');

// Sanitize the page used in the redirect so an open redirect is not possible.
$page = $_GET['page'] ?? '';
$page = preg_replace('/[^a-zA-Z0-9\/\-_]/', '', $page);
$page = str_replace('..', '', $page);
$page = ltrim($page, '/');
$page = preg_replace('#/{2,}#', '/', $page);

if (isset($_GET['language']) && in_array($_GET['language'], $language_array, true)) {
	setcookie('pa_language', $_GET['language'], time() + (86400 * 365), '/');
	exit(header('Location: ./' . urlencode($page)));
} else {
	if (isset($_COOKIE['pa_language']) && in_array($_COOKIE['pa_language'], $language_array, true))
		// Language is wat jij hebt gekozen
		$_COOKIE['pa_language'] = $_COOKIE['pa_language'];
	else
		// Default language is Engels
		$_COOKIE['pa_language'] = 'pt';
	require_once('general/language-general-' . $_COOKIE['pa_language'] . '.php');
}

ob_flush();
