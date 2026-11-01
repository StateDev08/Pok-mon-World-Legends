<?php
/** Installation-relative URLs, independent of host, port and folder name. */
function game_base_path(): string {
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
    $file = str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'] ?? '');
    $root = str_replace('\\', '/', dirname(__DIR__, 2));
    // Direct AJAX/endpoints may live below the application's root.
    if ($file !== '' && str_starts_with($file, $root . '/')) {
        $relative = substr($file, strlen($root));
        if (str_ends_with($script, $relative)) {
            return rtrim(substr($script, 0, -strlen($relative)), '/') . '/';
        }
    }
    return rtrim(str_replace('\\', '/', dirname($script)), '/.') . '/';
}

function game_url(string $route = ''): string {
    if (preg_match('~^[a-z][a-z0-9+.-]*:|^//~i', $route)) {
        return $route;
    }
    if (str_contains($route, "\r") || str_contains($route, "\n")) {
        throw new InvalidArgumentException('Invalid URL');
    }
    $base = game_base_path();
    if ($base !== '/' && str_starts_with($route, $base)) {
        return $route;
    }
    // Legacy ./home and /home both refer to routes in this game.
    $route = preg_replace('~^(?:(?:\./)|(?:\.\./)|/)+~', '', $route);
    return $base . $route;
}

function game_redirect_header(string $value, bool $replace = true, int $response_code = 0): void {
    if (preg_match('/^location:\s*(.*)$/i', $value, $match)) {
        $value = 'Location: ' . game_url($match[1]);
    }
    header($value, $replace, $response_code);
}
