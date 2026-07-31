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
/* === end externalized strings === */
?>