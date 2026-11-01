<?php
/** Share the selected language between pages, AJAX and embedded dialogs. */
function game_default_language(): string {
    $language = class_exists('Env') ? Env::get('DEFAULT_LANGUAGE', 'pt') : 'pt';
    return in_array($language, ['pt','de','en','pl','ru','zh'], true) ? $language : 'pt';
}
function resolve_game_language(): string {
    $available = ['pt', 'de', 'en', 'pl', 'ru', 'zh'];
    foreach ([$_COOKIE['pa_language'] ?? null, $_SESSION['pa_language'] ?? null] as $language) {
        if (in_array($language, $available, true)) return $language;
    }
    if (!empty($_SESSION['id']) && class_exists('DB')) {
        $row = DB::exQuery("SELECT `language` FROM `gebruikers` WHERE `user_id`=" . (int) $_SESSION['id'] . " LIMIT 1")->fetch_assoc();
        if (in_array($row['language'] ?? null, $available, true)) return $row['language'];
    }
    return game_default_language();
}
