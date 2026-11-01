<?php
require_once __DIR__ . '/../GameUrl.php';
if (empty($_SESSION['acc_id']) || empty($_SESSION['acc_naam']))
	exit(game_redirect_header('Location: ./error'));