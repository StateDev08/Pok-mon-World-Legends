<?php

class Env
{
    private static $loaded = false;
    private static $vars = [];

    /**
     * Load environment variables from a .env file.
     * Falls back to existing $_ENV / getenv values if the .env file is missing.
     *
     * @param string|null $path Path to the .env file. Defaults to a .env file in the project root.
     */
    public static function load($path = null)
    {
        if (self::$loaded) {
            return;
        }

        if ($path === null) {
            $path = dirname(__DIR__, 2) . '/.env';
        }

        if (is_file($path) && is_readable($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if ($lines !== false) {
                foreach ($lines as $line) {
                    $line = trim($line);
                    // Skip comments and empty lines
                    if ($line === '' || $line[0] === '#' || $line[0] === ';') {
                        continue;
                    }
                    // Allow export KEY=value
                    if (strpos($line, 'export ') === 0) {
                        $line = substr($line, 7);
                    }
                    if (strpos($line, '=') === false) {
                        continue;
                    }
                    list($key, $value) = explode('=', $line, 2);
                    $key = trim($key);
                    $value = trim($value);
                    if ($key === '') {
                        continue;
                    }
                    // Remove surrounding quotes
                    if (strlen($value) >= 2) {
                        $first = $value[0];
                        $last = $value[strlen($value) - 1];
                        if (($first === '"' || $first === "'") && $first === $last) {
                            $value = substr($value, 1, -1);
                        }
                    }
                    self::$vars[$key] = $value;
                    if (!isset($_ENV[$key]) || $_ENV[$key] === '') {
                        $_ENV[$key] = $value;
                    }
                    putenv("{$key}={$value}");
                }
            }
        }

        self::$loaded = true;
    }

    /**
     * Get an environment variable with an optional default.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }
        if (isset(self::$vars[$key])) {
            return self::$vars[$key];
        }
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        return $default;
    }
}
