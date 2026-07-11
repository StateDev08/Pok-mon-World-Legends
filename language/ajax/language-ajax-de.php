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
	$txt['alert_fail']				= 'Die Kiste'.$_POST['newbox'].'Es ist voll!';

	$txt['pagetitle']	= 'Möchten Sie Box %s übertragen?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Überweisen';
	$txt['box1']		= 'Aktuelle Box';
	$txt['box2']		= 'Neue Box';
}
?>