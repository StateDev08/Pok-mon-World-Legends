<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= 'Seien Sie vorsichtig, dieses Pokémon gehört nicht Ihnen!';
	$txt['alert_beginpokemon']				= 'Du kannst dein Starter-Pokémon nicht verkaufen!';
	$txt['alert_too_low_rank']				= 'Du kannst Pokémon nicht verkaufen!';
	$txt['alert_geb_too_low_rank']			= 'Dieser Trainer kann dieses Pokémon nicht kaufen!';
	$txt['alert_no_amount']					= 'Sie müssen einen gültigen Wert eingeben!';
	$txt['alert_price_too_less']			= 'Der Wert darf nicht kleiner als %s sein!';
	$txt['alert_price_too_much']			= 'Der Wert darf nicht größer als %s sein!';
	$txt['alert_user_dont_exist']			= 'Trainer nicht gefunden!';
	$txt['alert_pokemon_already_for_sale']	= 'Dieses Pokémon steht jetzt zum Verkauf!';
	$txt['alert_success_sell']				= 'Pokémon erfolgreich angekündigt!';

	$txt['pagetitle']	= 'Sind Sie sicher, dass Sie %s zum Verkauf anbieten möchten?';
	$txt['information']	= 'Information';
	$txt['sell']		= 'Verkaufen';
	$txt['pokemon']		= 'Pokémon';
	$txt['min_silver']	= 'Mindestpreis';
	$txt['min_gold']	= 'Mindestpreis';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['gebruiker']	= 'Trainer';
	$txt['price']		= 'Wert';
	$txt['currency']	= 'Münze';
	$txt['button']		= 'Zum Verkauf angeboten';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= 'Seien Sie vorsichtig, dieses Pokémon gehört nicht Ihnen!';
	$txt['alert_beginpokemon']				= 'Du kannst dein Starter-Pokémon nicht freigeben!';
	$txt['alert_too_low_rank']				= 'Du kannst kein Pokémon freigeben!';
	$txt['alert_success_release']				= 'Pokémon erfolgreich veröffentlicht!';

	$txt['pagetitle']	= 'Sind Sie sicher, dass Sie %s löschen möchten?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Freigeben';
	$txt['irreversivel']    = 'Denken Sie daran, dass diese Aktion irreversibel ist.';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= 'Seien Sie vorsichtig, dieses Pokémon gehört nicht Ihnen!';
	$txt['alert_pokeequiped']			= 'Du kannst kein Pokémon aus deinem Team übertragen!';
	$txt['alert_success']				= 'Pokémon erfolgreich übertragen!';
	$txt['alert_fail']				= 'Die Kiste'.($_POST['newbox'] ?? '').'Es ist voll!';

	$txt['pagetitle']	= 'Möchten Sie Box %s übertragen?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Überweisen';
	$txt['box1']		= 'Aktuelle Box';
	$txt['box2']		= 'Neue Box';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = 'Glückwunsch, du hast %s <b>%s</b> gewonnen!';
$txt['bonus_already_claimed'] = 'Du hast deinen Tagesbonus heute bereits erhalten!';
$txt['bonus_won_vip_days'] = 'Glückwunsch, du hast %s <b>%s</b> Tag(e) gewonnen!';
$txt['bonus_won_item'] = 'Glückwunsch, du hast %s <b>%s</b> gewonnen!';
$txt['bonus_won_exp'] = 'Glückwunsch, du hast <b>%s</b> Erfahrungspunkte gewonnen!';

# poke-loot
$txt['loot_invalid_access'] = 'Ungültiger Zugriff!';
$txt['loot_won_silvers'] = 'Glückwunsch, du hast %s <b>%s</b> im <b>Poké-Loot</b> gewonnen!';
$txt['loot_won_item'] = 'Glückwunsch, du hast <b>x%s</b> %s im <b>Poké-Loot</b> gewonnen!';
$txt['loot_no_bag_space'] = 'Du hast nicht genug Platz in deinem Rucksack!';
$txt['loot_won_vip_day'] = 'Glückwunsch, du hast <b>1 Tag</b> %s im <b>Poké-Loot</b> gewonnen!';

# sell-box
$txt['sellbox_cannot_trade'] = 'Dieses Pokémon kann nicht gehandelt werden!';
$txt['sellbox_method_missing'] = 'Diese Verkaufsmethode existiert nicht!';
$txt['sellbox_in_daycare'] = 'Dieses Pokémon ist in der Pokémon-Pension.';
$txt['sellbox_trainer_invalid'] = 'Dieser Trainer existiert nicht oder bist du selbst!';
$txt['sellbox_limit'] = 'Du kannst nicht mehr als %s Pokémon in diesen Verkauf stellen!';
$txt['sellbox_confirm_title'] = 'MÖCHTEST DU DIESES <b>%s</b> WIRKLICH VERKAUFEN?';
$txt['sellbox_select_method'] = 'WÄHLE DIE VERKAUFSMETHODE';
$txt['sellbox_auction'] = 'Auktion';
$txt['sellbox_auction_upper'] = 'AUKTION';
$txt['sellbox_direct'] = 'Direktverkauf';
$txt['sellbox_direct_upper'] = 'DIREKTVERKAUF';
$txt['sellbox_private'] = 'Privatverkauf';
$txt['sellbox_private_upper'] = 'PRIVATVERKAUF';
$txt['sellbox_start_price'] = 'Startpreis:';
$txt['sellbox_between'] = 'zwischen';
$txt['sellbox_until'] = 'und';
$txt['sellbox_auction_info'] = 'Dieser Betrag kann durch Gebote steigen. <br>Dieses Pokémon wird nach höchstens <b>48</b> Stunden verkauft; ohne Gebot kehrt es zu dir nach Hause zurück!';
$txt['sellbox_negotiable'] = 'Verhandelbarer Preis:';
$txt['sellbox_negotiable_hint'] = '(Ankreuzen, um Preisverhandlungsangebote zu erhalten)';
$txt['sellbox_direct_info'] = 'Wird dieses Pokémon nicht innerhalb von <b>2</b> Tagen verkauft, kehrt es zu dir nach Hause zurück!';
$txt['sellbox_trainer'] = 'Trainer:';
$txt['sellbox_trainer_hint'] = '(Der Name des Trainers, an den du verkaufen möchtest)';
$txt['sellbox_submit'] = 'POKÉMON VERKAUFEN!';

# league
$txt['league_won_opponent_not_ready'] = 'Du hast gewonnen!<br/>Dein Gegner war nicht bereit!';
$txt['league_lost_not_ready'] = 'Du hast verloren!<br/>Du warst nicht bereit für den Kampf!';
$txt['league_creating_battle'] = 'Bitte warte, der Kampf wird erstellt ...';
$txt['league_not_created_5min'] = 'Der Kampf wurde nicht innerhalb von 5 Minuten erstellt';
$txt['league_lost_not_created'] = 'Du hast verloren!<br/>Der Kampf wurde nicht erstellt!';
$txt['league_won_not_created'] = 'Du hast gewonnen!<br/>Der Kampf wurde nicht erstellt!';
$txt['league_not_time_yet'] = 'Es ist noch nicht Zeit für deinen Kampf!';

# map
$txt['map_search_1'] = 'Hier ist nichts!';
$txt['map_search_2'] = 'Fast hätte ich ein legendäres Pokémon gefunden, aber es ist verschwunden!';
$txt['map_search_3'] = 'Ich gebe nicht auf!';
$txt['map_search_4'] = 'Ich bin sicher, hier war irgendwo ein Pokémon...';
$txt['map_search_5'] = 'Gefunden! Oh nein, das ist nur ein Stein!';
$txt['map_search_6'] = 'Aaah... ich finde einfach nichts!';
$txt['map_search_7'] = 'Los, zeigt euch!';
$txt['map_search_8'] = 'Ist hier irgendein Pokémon!?';
$txt['map_search_9'] = 'Was ist hinter mir?! Puh, nur mein Schatten!';
$txt['map_search_10'] = 'Ist da ein Pokémon am Himmel?! Ach, nur eine Wolke.';
$txt['map_search_11'] = 'Ich glaube, diese Pokémon haben Angst vor mir.';
$txt['map_search_12'] = 'Ich habe Fußspuren gefunden! Mist, das sind meine...';
$txt['map_safari_closed'] = 'Die Safari-Zone ist geschlossen!';

# use-items
$txt['use_choose_pokemon'] = 'Du musst ein Pokémon auswählen!';
$txt['use_choose_for_item'] = 'Wähle das Pokémon, bei dem du %s einsetzen willst.';
$txt['use_level'] = 'Level';
$txt['use_next'] = 'Weiter';
$txt['use_cannot_learn'] = 'Dein Pokémon kann diese Attacke nicht erlernen!';
$txt['use_not_your_pokemon'] = 'Dieses Pokémon gehört dir nicht!';
$txt['use_already_learned'] = '%1$s hat die Attacke %2$s bereits gelernt!';
$txt['use_learning'] = '%1$s erlernt gerade %2$s - %3$s.';
$txt['use_item_missing'] = 'Du besitzt dieses Item nicht!';
$txt['use_item_not_equippable'] = 'Dieses Item kann diesem Pokémon nicht angelegt werden!';
$txt['use_item_already_equipped'] = 'Das Pokémon trägt dieses Item bereits!';
$txt['use_item_egg'] = 'Dieses Item kann keinem Pokémon-Ei angelegt werden!';
$txt['use_choose_receive_item'] = 'Wähle, welches Pokémon das Item %s erhalten soll.';
$txt['use_old_item_destroyed'] = 'Trägt dieses Pokémon bereits ein Item, wird das alte Item zerstört!';
$txt['use_not_equipped'] = 'Nicht ausgerüstet';
$txt['use_no_items_to_equip'] = 'Du hast keine Items, die du deinen Pokémon anlegen kannst!';
$txt['use_cannot_equip_egg'] = 'Du kannst dieses Item keinem Pokémon-Ei anlegen!';
$txt['use_cannot_heal'] = 'Du kannst %s nicht heilen.';
$txt['use_only_fainted'] = 'Funktioniert nur bei Pokémon, die vollständig kampfunfähig sind.';
$txt['use_not_that_amount'] = 'Du besitzt diese Menge nicht!';
$txt['use_amount_too_high'] = 'Du kannst diese Menge nicht verwenden';
$txt['use_choose_receive_candy'] = 'Wähle, welches Pokémon %s erhalten soll.';
$txt['use_spc_limit_25'] = ' Du hast %1$s bereits 25x bei %2$s eingesetzt.';
$txt['use_spc_max'] = ' Maximal %1$sx %2$s einsetzbar.';
$txt['use_dont_have_amount'] = 'Du besitzt keine %1$s %2$s!';
$txt['use_choose_with_amount'] = 'Wähle das Pokémon, bei dem du %1$s einsetzen willst.<br> (Du hast %2$s %1$s)';
$txt['use_choose_stone'] = 'Wähle das Pokémon, bei dem du %s einsetzen willst.';
$txt['use_evolved'] = 'Glückwunsch, dein <strong>%1$s</strong> hat sich zu <strong>%2$s</strong> entwickelt!';
$txt['use_choose_for_stone_post'] = 'Wähle ein Pokémon, um %s einzusetzen.';
$txt['use_stone_not_usable'] = 'Bei dem Pokémon %1$s kann %2$s nicht eingesetzt werden.';
$txt['use_yes'] = 'Ja';
$txt['use_no'] = 'Nein';
$txt['use_not_usable'] = 'Nicht verwendbar';
$txt['use_usable'] = 'Verwendbar';
$txt['use_pokemon_label'] = 'Pokémon';
$txt['use_quantity'] = 'Menge';
$txt['use_equipped_col'] = 'Ausgerüstet';
$txt['use_equipped_with'] = 'Ausgerüstet mit %s';
$txt['use_check'] = 'Auswahl:';
$txt['use_name_col'] = 'Name:';
$txt['use_evolves_col'] = 'Entwickelt sich:';
$txt['use_confirm_evolve'] = 'Willst du %s wirklich entwickeln?';
$txt['use_stone_evolved'] = 'Glückwunsch, dein <strong>%1$s</strong> hat sich mit %3$s zu <strong>%2$s</strong> entwickelt!';
/* === end externalized strings === */

$txt['battle_multi_hit'] = '%s trifft %d-mal.';
$txt['battle_parental_hit'] = '%s trifft durch Familienbande %d-mal.';
$txt['battle_recoil'] = '%s erleidet Rückstoßschaden.';
$txt['battle_copy_move'] = '%s kopiert die Attacke %s!';
$txt['battle_copy_pokemon'] = '%s kopiert %s.';
$txt['battle_rocket_exit'] = 'Team Rocket hebt wieder ab!';
$txt['battle_opponent_must_attack'] = 'Dein Gegner ist am Zug!';
$txt['league_battle_created'] = 'Der Kampf wurde erstellt!<br />Du wirst zum Kampf weitergeleitet …';
?>
