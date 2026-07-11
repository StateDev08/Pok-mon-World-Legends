<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= 'Be careful, this Pokémon doesn\'t belong to you!';
	$txt['alert_beginpokemon']				= 'You can\'t sell your starter Pokémon!';
	$txt['alert_too_low_rank']				= 'You can\'t sell pokemon!';
	$txt['alert_geb_too_low_rank']			= 'This trainer cannot purchase this Pokémon!';
	$txt['alert_no_amount']					= 'You must enter a valid value!';
	$txt['alert_price_too_less']			= 'The value cannot be less than %s!';
	$txt['alert_price_too_much']			= 'The value cannot be greater than %s!';
	$txt['alert_user_dont_exist']			= 'Trainer not found!';
	$txt['alert_pokemon_already_for_sale']	= 'This Pokémon is now for sale!';
	$txt['alert_success_sell']				= 'Pokémon successfully announced!';

	$txt['pagetitle']	= 'Are you sure you want to put %s up for sale?';
	$txt['information']	= 'Information';
	$txt['sell']		= 'Sell';
	$txt['pokemon']		= 'Pokémon';
	$txt['min_silver']	= 'Minimum price';
	$txt['min_gold']	= 'Minimum price';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['gebruiker']	= 'Trainer';
	$txt['price']		= 'Value';
	$txt['currency']	= 'Coin';
	$txt['button']		= 'Put up for sale';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= 'Be careful, this Pokémon doesn\'t belong to you!';
	$txt['alert_beginpokemon']				= 'You can\'t release your starter Pokémon!';
	$txt['alert_too_low_rank']				= 'You can\'t release Pokémon!';
	$txt['alert_success_release']				= 'Pokémon successfully released!';

	$txt['pagetitle']	= 'Are you sure you want to drop %s?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Release';
	$txt['irreversivel']    = 'Remember that this action is irreversible.';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= 'Be careful, this Pokémon doesn\'t belong to you!';
	$txt['alert_pokeequiped']			= 'You cannot transfer a Pokémon from your team!';
	$txt['alert_success']				= 'Pokémon transferred successfully!';
	$txt['alert_fail']				= 'The box'.$_POST['newbox'].'It\'s full!';

	$txt['pagetitle']	= 'Do you want to transfer box %s?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Transfer';
	$txt['box1']		= 'Current Box';
	$txt['box2']		= 'New Box';
}
?>