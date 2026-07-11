<?php

// Load environment variables from a .env file in the project root.
require_once(__DIR__ . '/../Env.php');
Env::load();

// Session cookie name is built from the client IP and user agent.
$session_ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$session_ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
session_name('__' . sha1(md5('secure' . $session_ip . $session_ua)));
session_start();

ob_start();
error_reporting(E_ALL ^ E_NOTICE);
// date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'UTF-8');

define('PATH', str_replace(PATH_SEPARATOR, '/', dirname(dirname(__FILE__))));

# Database connection settings (read from environment variables)
$dbhost     = Env::get('DB_HOST', 'localhost');
$dblogin    = Env::get('DB_USER', '');
$dbpassword = Env::get('DB_PASSWORD', '');
$dbdatabase = Env::get('DB_NAME', '');

require_once(PATH.'/DB/DB.php');

foreach($_GET as $key=>$value) if (!is_array($value)) $_GET[$key] = DB::real_escape_string($value);
foreach($_POST as $key=> $value) if (!is_array($value)) $_POST[$key] = DB::real_escape_string($value);
foreach($_COOKIE as $key=>$value) if (!is_array($value)) $_COOKIE[$key] = DB::real_escape_string($value);

// Load PHPMailer 7 autoloader and alias for legacy `new PHPMailer()` calls.
require_once(PATH.'/PHPMailer/autoload.php');

require_once(PATH.'/resources/site_names.php');
$static_url = 'public'; # sem "/" no final da pasta/url

$smtp = [
	'host' => Env::get('SMTP_HOST', 'smtp.yourhost.com'),
	'port' => Env::get('SMTP_PORT', '587'),
	'mail' => Env::get('SMTP_MAIL', 'noreply@yourdomain.com'),
	'pass' => Env::get('SMTP_PASS', '')
];

#CONFIGURAÇÕES NEW YEAR SHOP
$shop_newyear = false;
// NORMALMENTE INICIA DIA 31/12 E VAI ATE DIA 05/01 OU 10/01.

#CONFIGURAÇÕES DE TRIPLE EXP NO FDS
# EXP NOS FINAIS DE SEMANA?
# INICIA NA SEXTA 00:00 E FINALIZA NO DOMINGO 00:00
$tripleexpfds = true;
$doublesilverativo = true;
$doublesilverdia = 6; //0=Dom,1=Seg,2=Ter,3=Qua,4=Qui,5=Sex,6=Sab

require(PATH.'/resources/events/Events.php');
include(PATH.'/resources/Quests.php');

$evento = new Events();
$evento_atual = $evento->getActualEvent();

if (!empty($evento_atual)) {
	include($evento->importEvent(PATH.'/resources/events/events', $evento_atual['name_id']));
}

$quests = new Quests();
$quest = $quests->getActualQuests();
$quest_1 = $quests->getQuest($quest[0])->fetch_assoc();
$quest_2 = $quests->getQuest($quest[1])->fetch_assoc();

//Dias do Safari (Terça, Quinta e Sábado) 2, 4, 6

$Saffari = '';

$date = strtotime(date('H:i'));
$aberto_1 = strtotime('14:00');
$fechado_1 = strtotime('16:00');
$aberto_2 = strtotime('21:00');
$fechado_2 = strtotime('23:00');
$aberto_3 = strtotime('03:00');
$fechado_3 = strtotime('05:00');

if (in_array(date('w'), array('2', '4', '6'))) {
    if ($date >= $aberto_1 && $date <= $fechado_1) {
        $Saffari = "Aberto";
    } else {
        if ($date >= $aberto_2 && $date <= $fechado_2) {
            $Saffari = "Aberto";
        } else {
            if ($date >= $aberto_3 && $date <= $fechado_3) $Saffari = "Aberto";
        }
    }
}
