<?php
/**
 * World Legends installer
 *
 * A self-contained, web-based assistant to set up the game for the first time.
 * It checks the environment, creates a .env file, imports the supplied database
 * dump and writes an install.lock file.
 */

// Avoid throwing mysqli_sql_exceptions on XAMPP/PHP 8 hosts; we handle errors manually.
mysqli_report(MYSQLI_REPORT_OFF);

if (is_file(__DIR__ . '/install.lock')) {
    echo '<p>World Legends is already installed. Remove <code>install.lock</code> to run the installer again.</p>';
    exit;
}

$root = __DIR__;
$errors = [];
$success = [];

$step = $_POST['step'] ?? 'welcome';

// Minimal i18n for the installer.
$lang = $_GET['lang'] ?? 'de';
$installText = [
    'de' => [
        'title' => 'World Legends Installation',
        'welcome' => 'Willkommen beim Installations-Assistenten',
        'requirements' => 'Systemanforderungen',
        'php_version' => 'PHP-Version >= 7.4',
        'ext_mysqli' => 'mysqli-Erweiterung',
        'ext_gd' => 'GD-Erweiterung',
        'ext_mbstring' => 'mbstring-Erweiterung',
        'writable_root' => 'Stammverzeichnis beschreibbar',
        'db_settings' => 'Datenbank-Einstellungen',
        'db_host' => 'Datenbank-Host',
        'db_user' => 'Datenbank-Benutzer',
        'db_pass' => 'Datenbank-Passwort',
        'db_name' => 'Datenbank-Name',
        'test_connection' => 'Verbindung testen',
        'smtp_settings' => 'SMTP-Einstellungen (optional)',
        'smtp_host' => 'SMTP-Host',
        'smtp_port' => 'SMTP-Port',
        'smtp_mail' => 'SMTP-Mail',
        'smtp_pass' => 'SMTP-Passwort',
        'install' => 'Installieren',
        'next' => 'Weiter',
        'back' => 'Zurück',
        'import_db' => 'Datenbank importieren',
        'done' => 'Installation abgeschlossen',
        'delete_installer' => 'Bitte lösche anschließend die Datei <code>install.php</code> aus Sicherheitsgründen.',
        'fail' => 'Fehlgeschlagen',
        'ok' => 'OK',
    ],
    'en' => [
        'title' => 'World Legends Installation',
        'welcome' => 'Welcome to the installation assistant',
        'requirements' => 'System requirements',
        'php_version' => 'PHP version >= 7.4',
        'ext_mysqli' => 'mysqli extension',
        'ext_gd' => 'GD extension',
        'ext_mbstring' => 'mbstring extension',
        'writable_root' => 'Root directory writable',
        'db_settings' => 'Database settings',
        'db_host' => 'Database host',
        'db_user' => 'Database user',
        'db_pass' => 'Database password',
        'db_name' => 'Database name',
        'test_connection' => 'Test connection',
        'smtp_settings' => 'SMTP settings (optional)',
        'smtp_host' => 'SMTP host',
        'smtp_port' => 'SMTP port',
        'smtp_mail' => 'SMTP mail',
        'smtp_pass' => 'SMTP password',
        'install' => 'Install',
        'next' => 'Next',
        'back' => 'Back',
        'import_db' => 'Import database',
        'done' => 'Installation completed',
        'delete_installer' => 'Please delete <code>install.php</code> afterwards for security.',
        'fail' => 'Failed',
        'ok' => 'OK',
    ],
];
$txt = $installText[$lang] ?? $installText['de'];

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function check_requirements($root) {
    $checks = [
        'php_version' => PHP_VERSION_ID >= 70400,
        'ext_mysqli' => extension_loaded('mysqli'),
        'ext_gd' => extension_loaded('gd'),
        'ext_mbstring' => extension_loaded('mbstring'),
        'writable_root' => is_writable($root),
    ];
    return $checks;
}

function render_header($txt) {
    echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>' . h($txt['title']) . '</title>';
    echo '<style>body{font-family:Arial,Helvetica,sans-serif;max-width:700px;margin:40px auto;line-height:1.6;}label{display:block;margin:8px 0 2px;}input[type=text],input[type=password],input[type=number]{width:100%;padding:6px;box-sizing:border-box;}button{padding:8px 16px;margin-top:10px;}.ok{color:green;}.fail{color:red;}.box{border:1px solid #ccc;padding:16px;margin-bottom:16px;}</style>';
    echo '</head><body><h1>' . h($txt['title']) . '</h1>';
}

function render_footer() {
    echo '</body></html>';
}

if ($step === 'welcome') {
    render_header($txt);
    $checks = check_requirements($root);
    echo '<div class="box"><h2>' . h($txt['welcome']) . '</h2><p>' . h($txt['requirements']) . ':</p><ul>';
    foreach ($checks as $key => $ok) {
        $label = $txt[$key] ?? $key;
        echo '<li class="' . ($ok ? 'ok' : 'fail') . '">' . h($label) . ' - ' . ($ok ? $txt['ok'] : $txt['fail']) . '</li>';
    }
    echo '</ul>';
    if (in_array(false, $checks, true)) {
        echo '<p class="fail">Please fix the failed requirements before continuing.</p>';
    } else {
        echo '<form method="post"><input type="hidden" name="step" value="database"><button type="submit">' . h($txt['next']) . '</button></form>';
    }
    echo '<p><a href="?lang=de">Deutsch</a> | <a href="?lang=en">English</a></p></div>';
    render_footer();
    exit;
}

if ($step === 'database') {
    render_header($txt);
    $db = [
        'host' => $_POST['db_host'] ?? 'localhost',
        'user' => $_POST['db_user'] ?? '',
        'pass' => $_POST['db_pass'] ?? '',
        'name' => $_POST['db_name'] ?? 'worldlegends',
        'smtp_host' => $_POST['smtp_host'] ?? 'smtp.example.com',
        'smtp_port' => $_POST['smtp_port'] ?? '587',
        'smtp_mail' => $_POST['smtp_mail'] ?? 'noreply@example.com',
        'smtp_pass' => $_POST['smtp_pass'] ?? '',
    ];

    $test_ok = false;
    $test_msg = '';
    if (isset($_POST['test_connection'])) {
        $conn = @mysqli_connect($db['host'], $db['user'], $db['pass']);
        if (!$conn) {
            $test_msg = 'Connection failed: ' . mysqli_connect_error();
        } else {
            if (!mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS `' . mysqli_real_escape_string($conn, $db['name']) . '`')) {
                $test_msg = 'Could not create/select database: ' . mysqli_error($conn);
            } else {
                $test_ok = true;
                $test_msg = 'Connection successful and database is ready.';
            }
            mysqli_close($conn);
        }
    }

    echo '<div class="box"><h2>' . h($txt['db_settings']) . '</h2>';
    if ($test_msg) {
        echo '<p class="' . ($test_ok ? 'ok' : 'fail') . '">' . h($test_msg) . '</p>';
    }
    echo '<form method="post"><input type="hidden" name="step" value="database">';
    echo '<label>' . h($txt['db_host']) . '</label><input type="text" name="db_host" value="' . h($db['host']) . '">';
    echo '<label>' . h($txt['db_user']) . '</label><input type="text" name="db_user" value="' . h($db['user']) . '">';
    echo '<label>' . h($txt['db_pass']) . '</label><input type="password" name="db_pass" value="' . h($db['pass']) . '">';
    echo '<label>' . h($txt['db_name']) . '</label><input type="text" name="db_name" value="' . h($db['name']) . '">';
    echo '<button type="submit" name="test_connection" value="1">' . h($txt['test_connection']) . '</button>';
    echo '</div>';
    echo '<div class="box"><h2>' . h($txt['smtp_settings']) . '</h2>';
    echo '<label>' . h($txt['smtp_host']) . '</label><input type="text" name="smtp_host" value="' . h($db['smtp_host']) . '">';
    echo '<label>' . h($txt['smtp_port']) . '</label><input type="text" name="smtp_port" value="' . h($db['smtp_port']) . '">';
    echo '<label>' . h($txt['smtp_mail']) . '</label><input type="text" name="smtp_mail" value="' . h($db['smtp_mail']) . '">';
    echo '<label>' . h($txt['smtp_pass']) . '</label><input type="password" name="smtp_pass" value="' . h($db['smtp_pass']) . '">';
    echo '<button type="submit" name="step" value="install">' . h($txt['install']) . '</button>';
    echo '</form></div>';
    render_footer();
    exit;
}

if ($step === 'install') {
    render_header($txt);
    $db = [
        'host' => $_POST['db_host'] ?? 'localhost',
        'user' => $_POST['db_user'] ?? '',
        'pass' => $_POST['db_pass'] ?? '',
        'name' => $_POST['db_name'] ?? 'worldlegends',
        'smtp_host' => $_POST['smtp_host'] ?? 'smtp.example.com',
        'smtp_port' => $_POST['smtp_port'] ?? '587',
        'smtp_mail' => $_POST['smtp_mail'] ?? 'noreply@example.com',
        'smtp_pass' => $_POST['smtp_pass'] ?? '',
    ];

    $conn = @mysqli_connect($db['host'], $db['user'], $db['pass']);
    if (!$conn) {
        echo '<p class="fail">Connection failed: ' . h(mysqli_connect_error()) . '</p>';
        echo '<p><a href="javascript:history.back()">' . h($txt['back']) . '</a></p>';
        render_footer();
        exit;
    }

    if (!mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS `' . mysqli_real_escape_string($conn, $db['name']) . '`')) {
        echo '<p class="fail">Could not create database: ' . h(mysqli_error($conn)) . '</p>';
        render_footer();
        exit;
    }
    mysqli_select_db($conn, $db['name']);

    $sqlFile = __DIR__ . '/app/includes/install/WorldLegends_Database.sql';
    if (!is_file($sqlFile)) {
        echo '<p class="fail">Database dump not found: ' . h($sqlFile) . '</p>';
        render_footer();
        exit;
    }

    $sql = file_get_contents($sqlFile);
    if ($sql === false) {
        echo '<p class="fail">Could not read database dump.</p>';
        render_footer();
        exit;
    }

    // Run the dump statement by statement. This avoids the MySQL
    // max_allowed_packet limit that can kill the connection with
    // mysqli_multi_query on large dumps.
    set_time_limit(300);

    // Strip SQL comment lines so CREATE TABLE statements are not merged
    // into preceding comments and accidentally skipped.
    $lines = preg_split('/\R/', $sql);
    $lines = array_filter($lines, function ($line) {
        $line = ltrim($line);
        return !($line === '' || strpos($line, '--') === 0 || strpos($line, '#') === 0 || strpos($line, '/*') === 0 || strpos($line, '*/') === 0);
    });
    $cleanSql = implode("\n", $lines);

    $queries = array_filter(array_map('trim', preg_split('/;\s*(?:\n|\r\n?|$)/', $cleanSql)));
    foreach ($queries as $query) {
        if ($query === '' || strpos($query, '--') === 0 || strpos($query, '/*') === 0 || strpos($query, '#') === 0) {
            continue;
        }
        if (!mysqli_query($conn, $query . ';')) {
            echo '<p class="fail">SQL error: ' . h(mysqli_error($conn)) . '</p>';
            echo '<pre>' . h(substr($query, 0, 500)) . '</pre>';
            render_footer();
            exit;
        }
    }

    $env = "DB_HOST=" . $db['host'] . "\n";
    $env .= "DB_USER=" . $db['user'] . "\n";
    $env .= "DB_PASSWORD=" . $db['pass'] . "\n";
    $env .= "DB_NAME=" . $db['name'] . "\n";
    $env .= "SMTP_HOST=" . $db['smtp_host'] . "\n";
    $env .= "SMTP_PORT=" . $db['smtp_port'] . "\n";
    $env .= "SMTP_MAIL=" . $db['smtp_mail'] . "\n";
    $env .= "SMTP_PASS=" . $db['smtp_pass'] . "\n";

    if (file_put_contents($root . '/.env', $env) === false) {
        echo '<p class="fail">Could not write .env file. Make sure the root directory is writable.</p>';
        render_footer();
        exit;
    }

    if (file_put_contents($root . '/install.lock', date('Y-m-d H:i:s')) === false) {
        echo '<p class="fail">Could not write install.lock.</p>';
        render_footer();
        exit;
    }

    mysqli_close($conn);

    echo '<div class="box"><h2>' . h($txt['done']) . '</h2>';
    echo '<p class="ok">' . h($txt['done']) . '</p>';
    echo '<p>' . h($txt['delete_installer']) . '</p>';
    echo '<p><a href="./">Go to homepage</a></p></div>';
    render_footer();
    exit;
}
