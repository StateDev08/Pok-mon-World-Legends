<?php
require_once('app/includes/resources/config.php');

$langs = array('pt', 'de', 'en', 'pl', 'ru', 'zh');
$lang = $_GET['lang'] ?? 'de';
if (!in_array($lang, $langs, true)) $lang = 'de';
setcookie('pa_language', $lang, time() + (86400 * 365), '/');

$acc_id = 2;
$acc_naam = 'shadow';
$user_id = 2;
$naam = 'Badland';

$row = DB::exQuery("SELECT `keylog` FROM `rekeningen` WHERE `acc_id`='$acc_id' LIMIT 1")->fetch_assoc();

DB::exQuery("UPDATE `gebruikers` SET `session`='" . (session_id() ?? '') . "', `captcha_time`=UNIX_TIMESTAMP() WHERE `user_id`='$user_id' LIMIT 1");

$_SESSION['acc_id'] = $acc_id;
$_SESSION['acc_naam'] = $acc_naam;
$_SESSION['acc_hash'] = md5($acc_id . ',' . $acc_naam);
$_SESSION['keylog'] = $row['keylog'];
$_SESSION['id'] = $user_id;
$_SESSION['naam'] = $naam;
$_SESSION['hash'] = md5($user_id . ',' . $naam);
$_SESSION['sec_key'] = 123456;

header('Location: ./index.php?page=town');
