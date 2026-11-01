<?php
require_once __DIR__ . '/resolve.php';

/** Translate display text only. Battle/database identifiers remain unchanged. */
function move_label(string $name): string {
    if (resolve_game_language() !== 'de') return $name;
    static $names;
    if ($names === null) {
        $data = json_decode(ltrim(file_get_contents(__DIR__ . '/move-names-de.json'), "\xEF\xBB\xBF"), true, 512, JSON_THROW_ON_ERROR);
        $names = [];
        foreach ($data as $english => $german) {
            $names[strtolower(preg_replace('/[^a-z0-9]/i', '', $english))] = $german;
        }
    }
    return $names[strtolower(preg_replace('/[^a-z0-9]/i', '', $name))] ?? $name;
}
