<?php
/*
 * Helpers to render text in the language of a *specific* character instead of
 * the language of the current request. Needed wherever a message is written
 * for somebody else (stored events, e-mails) or where there is no request at
 * all (cron jobs).
 */

if (!function_exists('language_available')) {
	function language_available() {
		return array('pt', 'de', 'en', 'pl', 'ru', 'zh');
	}
}

if (!function_exists('user_language')) {
	function user_language($user_id) {
		static $cache = array();

		$user_id = (int) $user_id;
		if (isset($cache[$user_id])) return $cache[$user_id];

		$lang = 'pt';
		if (class_exists('DB')) {
			$row = DB::exQuery("SELECT `language` FROM `gebruikers` WHERE `user_id`='" . $user_id . "' LIMIT 1")->fetch_assoc();
			if (!empty($row['language']) && in_array($row['language'], language_available(), true)) {
				$lang = $row['language'];
			}
		}

		return $cache[$user_id] = $lang;
	}
}

if (!function_exists('language_txt')) {
	/**
	 * Loads one of the language files (general, pages, ajax, box, events, mail)
	 * for the given language and returns its $txt array without touching the
	 * $txt of the caller.
	 *
	 * $vars are the variables the language file interpolates (e.g. 'page',
	 * 'inlognaam'); they are only visible inside the included file.
	 */
	function language_txt($type, $lang, array $vars = array()) {
		static $cache = array();

		if (!in_array($lang, language_available(), true)) $lang = 'pt';

		$cacheable = empty($vars);
		if ($cacheable && isset($cache[$type][$lang])) return $cache[$type][$lang];

		$file = __DIR__ . '/' . $type . '/language-' . $type . '-' . $lang . '.php';
		if (!is_file($file)) return array();

		global $static_url;

		// Defaults for the variables the language files branch on, so that
		// loading them outside of a page context stays warning free.
		$txt    = array();
		$page   = '';
		$workvs = false;

		foreach (array('txt', 'file', 'cache', 'lang', 'type', 'cacheable', 'vars') as $reserved) {
			unset($vars[$reserved]);
		}

		extract($vars, EXTR_OVERWRITE);
		include($file);

		if ($cacheable) $cache[$type][$lang] = $txt;

		return $txt;
	}
}

if (!function_exists('description_column')) {
	/**
	 * Name of the `markt`/`gebruikers_item` description column for a language.
	 * The table also carries the legacy `nl`/`es` columns; everything that has
	 * no column of its own falls back to Portuguese instead of producing a
	 * query against a column that does not exist.
	 */
	function description_column($lang = null) {
		if ($lang === null) $lang = $_COOKIE['pa_language'] ?? 'pt';

		$columns = array('pt', 'de', 'en', 'pl', 'ru', 'zh', 'nl', 'es');

		return 'omschrijving_' . (in_array($lang, $columns, true) ? $lang : 'pt');
	}
}

if (!function_exists('user_txt')) {
	function user_txt($user_id, $type = 'events', array $vars = array()) {
		return language_txt($type, user_language($user_id), $vars);
	}
}
