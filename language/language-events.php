<?php
$language_array = array('pt', 'de', 'en', 'pl', 'ru', 'zh');
if (in_array($_COOKIE['pa_language'], $language_array, true))
	$_COOKIE['pa_language'] = $_COOKIE['pa_language'];
else
	$_COOKIE['pa_language'] = 'pt';
require_once('events/language-events-' . $_COOKIE['pa_language'] . '.php');
