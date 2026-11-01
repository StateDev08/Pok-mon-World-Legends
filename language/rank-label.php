<?php
require_once __DIR__ . '/resolve.php';
function rank_label(string $name): string {
    static $labels;
    if ($labels === null) $labels = json_decode(file_get_contents(__DIR__.'/rank-names.json'), true, 512, JSON_THROW_ON_ERROR);
    return $labels[resolve_game_language()][$name] ?? $name;
}
