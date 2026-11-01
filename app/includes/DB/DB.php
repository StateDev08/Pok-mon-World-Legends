<?php
// PHP 8 enables mysqli exceptions by default; disable them so the code can
// handle errors with its own exit() messages.
if (extension_loaded('mysqli')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

class DB {
	private static $instance;

	private function __construct() {
		global $dbhost, $dblogin, $dbpassword, $dbdatabase;
		if (!extension_loaded("mysqli"))
			self::fail('initialization', 'mysqli extension unavailable');
		else {
			$mysqli = @new MySQLi($dbhost, $dblogin, $dbpassword, $dbdatabase);
			if ($mysqli->connect_errno)
				self::fail('connection', $mysqli->connect_error);

			$mysqli->set_charset('utf8');
			self::$instance = $mysqli;
		}
	}
	public static function getInstance() {
		if (is_null(self::$instance))
            $connection = new self();

        return self::$instance;
	}
	public static function exQuery($sql) {
		$connection = self::getInstance();
		if (!($result = $connection->query($sql))) {
			self::fail('query', (string) $connection->errno);
		}
		return $result;
	}
	private static function fail($operation, $detail) {
        // Do not log SQL statements, credentials, or user-submitted values.
        error_log('Database ' . $operation . ' failed: ' . $detail);
        http_response_code(500);
        exit('Database operation failed.');
    }
    public static function insertID() {
		return self::$instance->insert_id;
	}
	public static function affectedRows() {
		return self::$instance->affected_rows;
	}
	public static function __callStatic($name, $args) {
		$connection = self::getInstance();
		if (method_exists($connection, $name))
			return call_user_func_array(array($connection, $name), $args);
		else {
			trigger_error('Unknown Method ' . $name . '()', E_USER_WARNING);
			return;
		}
    }
}
