<?php
require __DIR__ . '/../app/includes/GameUrl.php';
$root = str_replace('\\', '/', dirname(__DIR__));
$checks = 0;
foreach (['/', '/game/', '/games/my-game/'] as $base) {
    foreach (['index.php', 'ajax.php', 'attack/wild/wild-finish.php'] as $entry) {
        $_SERVER['SCRIPT_FILENAME'] = $root . '/' . $entry;
        $_SERVER['SCRIPT_NAME'] = $base . $entry;
        foreach (['home', './home', '/home', '../home', $base . 'home'] as $route) {
            if (game_url($route) !== $base . 'home') throw new RuntimeException($base . $entry . ': ' . $route);
            $checks++;
        }
        if (game_url('/attack/wild/wild-attack') !== $base . 'attack/wild/wild-attack') throw new RuntimeException('Battle URL');
        if (game_url('https://example.org/path') !== 'https://example.org/path') throw new RuntimeException('External URL');
        $checks += 2;
    }
}
try { game_url("home\r\nX-Test: bad"); throw new RuntimeException('Header injection'); }
catch (InvalidArgumentException $e) { $checks++; }
echo "PASS: $checks installation-relative URL checks\n";
