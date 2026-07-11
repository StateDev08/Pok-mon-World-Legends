<?php

// Minimal autoloader for PHPMailer 7.
// Registers the PHPMailer\PHPMailer namespace and creates a legacy global alias
// so that existing code using `new PHPMailer()` continues to work.

spl_autoload_register(function ($class) {
    $prefix = 'PHPMailer\\PHPMailer\\';
    if (strpos($class, $prefix) !== 0) {
        return;
    }

    $file = __DIR__ . '/' . substr($class, strlen($prefix)) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

class_alias('PHPMailer\\PHPMailer\\PHPMailer', 'PHPMailer', true);
