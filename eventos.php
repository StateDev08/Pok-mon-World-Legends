<?php
require_once __DIR__ . '/app/includes/GameUrl.php';
include('app/includes/resources/security.php');

if (!empty($evento_atual)) {
    if (($_GET['actual'] ?? '') == $evento_atual['link']) {
        include($event_page);
    } else {
        game_redirect_header('location: ./home');
    }
} else {
    game_redirect_header('location: ./home');
}