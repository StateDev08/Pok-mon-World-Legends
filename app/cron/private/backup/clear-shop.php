<?php
require_once __DIR__ . '/../../../includes/GameUrl.php';
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
chdir(dirname(__DIR__, 2));

require_once('../includes/resources/security.php');
if ($gebruiker['admin'] < 3)	game_redirect_header('Location: ./');

$result = DB::exQuery("SELECT `id`,`pokemon_id` FROM `transferlijst`");
while ($row = $result->fetch_assoc()) {
	DB::exQuery("UPDATE `pokemon_speler` SET `opzak`='nee' WHERE `id`='{$row['pokemon_id']}'");
	DB::exQuery("DELETE FROM `transferlijst` WHERE `id`='{$row['id']}'");
}
echo 'Limpei';