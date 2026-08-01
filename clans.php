<?php

include('app/includes/resources/security.php');

$action = '';
$valid = false;
$actions = array('central', 'profile', 'create');

if (isset($_GET['action']) && in_array(($_GET['action'] ?? ''), $actions)) {
	$action = ($_GET['action'] ?? '');
	if ($gebruiker['rank'] >= 5) $valid = true;
	else if ($action == 'profile') $valid = true;

	if ($valid) include('app/includes/resources/pages/clans/'.$action.'.php');	
	else echo '<div class="red">'.$txt['clans_rank_min'].'</div>';	
} else {
	header('location: ./clans&action=central');
}