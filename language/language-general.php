<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
require_once __DIR__ . '/resolve.php';
ob_start();

$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');

if (isset($_GET['language']) && in_array(($_GET['language'] ?? ''), $language_array, true)) {
	$_SESSION['pa_language'] = ($_GET['language'] ?? '');
	setcookie('pa_language', ($_GET['language'] ?? ''), time() + (86400 * 365), '/');
	if (!empty($_SESSION['id']) && class_exists('DB')) {
		DB::exQuery("UPDATE `gebruikers` SET `language`='" . ($_GET['language'] ?? '') . "' WHERE `user_id`='" . (int) $_SESSION['id'] . "' LIMIT 1");
	}
	$page = $_GET['page'] ?? '';
	$page = preg_replace('/[^a-zA-Z0-9\/\-_]/', '', $page);
	$page = str_replace('..', '', $page);
	$page = ltrim($page, '/');
	$page = preg_replace('#/{2,}#', '/', $page);
	exit(game_redirect_header('Location: ./' . implode('/', array_map('rawurlencode', explode('/', $page)))));
}

$lang = resolve_game_language();
$_COOKIE['pa_language'] = $lang;

set_error_handler(function($severity, $message) {
	if ($severity === E_WARNING && strpos($message, 'Undefined array key') !== false) return true;
	return false;
});
require_once(__DIR__ . '/general/language-general-' . $lang . '.php');
restore_error_handler();

ob_flush();
