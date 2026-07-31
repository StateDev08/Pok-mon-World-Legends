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
	$txt['alert_fail']				= 'The box'.($_POST['newbox'] ?? '').'It\'s full!';

	$txt['pagetitle']	= 'Do you want to transfer box %s?';
	$txt['information']	= 'Information';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= 'Transfer';
	$txt['box1']		= 'Current Box';
	$txt['box2']		= 'New Box';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = 'Congratulations, you won %s <b>%s</b>!';
$txt['bonus_already_claimed'] = 'You have already claimed your daily bonus today!';
$txt['bonus_won_vip_days'] = 'Congratulations, you won %s <b>%s</b> day(s)!';
$txt['bonus_won_item'] = 'Congratulations, you won %s <b>%s</b>!';
$txt['bonus_won_exp'] = 'Congratulations, you won <b>%s</b> experience points!';

# poke-loot
$txt['loot_invalid_access'] = 'Invalid access!';
$txt['loot_won_silvers'] = 'Congratulations, you won %s <b>%s</b> in the <b>Poké-Loot</b>!';
$txt['loot_won_item'] = 'Congratulations, you won <b>x%s</b> %s in the <b>Poké-Loot</b>!';
$txt['loot_no_bag_space'] = 'You do not have enough space in your bag!';
$txt['loot_won_vip_day'] = 'Congratulations, you won <b>1 day</b> of %s in the <b>Poké-Loot</b>!';

# sell-box
$txt['sellbox_cannot_trade'] = 'This Pokémon cannot be traded!';
$txt['sellbox_method_missing'] = 'This selling method does not exist!';
$txt['sellbox_in_daycare'] = 'This Pokémon is in the day care.';
$txt['sellbox_trainer_invalid'] = 'This trainer does not exist or is yourself!';
$txt['sellbox_limit'] = 'You cannot put more than %s Pokémon up for this sale!';
$txt['sellbox_confirm_title'] = 'ARE YOU SURE YOU WANT TO SELL THIS <b>%s</b>?';
$txt['sellbox_select_method'] = 'SELECT THE SELLING METHOD';
$txt['sellbox_auction'] = 'Auction';
$txt['sellbox_auction_upper'] = 'AUCTION';
$txt['sellbox_direct'] = 'Direct Sale';
$txt['sellbox_direct_upper'] = 'DIRECT SALE';
$txt['sellbox_private'] = 'Private Sale';
$txt['sellbox_private_upper'] = 'PRIVATE SALE';
$txt['sellbox_start_price'] = 'Starting price:';
$txt['sellbox_between'] = 'between';
$txt['sellbox_until'] = 'and';
$txt['sellbox_auction_info'] = 'This amount can increase through bids. <br>This Pokémon will be sold after at most <b>48</b> hours; if there is no bid it will return to your home!';
$txt['sellbox_negotiable'] = 'Negotiable price:';
$txt['sellbox_negotiable_hint'] = '(Check to receive price negotiation offers)';
$txt['sellbox_direct_info'] = 'If this Pokémon is not sold within <b>2</b> days, it will return to your home!';
$txt['sellbox_trainer'] = 'Trainer:';
$txt['sellbox_trainer_hint'] = '(The name of the trainer you want to sell to)';
$txt['sellbox_submit'] = 'SELL POKÉMON!';
/* === end externalized strings === */
?>