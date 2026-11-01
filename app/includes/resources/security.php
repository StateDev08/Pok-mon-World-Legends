<?php
require_once __DIR__ . '/../GameUrl.php';
if (empty($_SESSION['naam']) || empty($_SESSION['id']))
	exit(game_redirect_header('Location: ././error'));