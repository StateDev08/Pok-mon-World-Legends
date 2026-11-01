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

# league
$txt['league_won_opponent_not_ready'] = 'You won!<br/>Your opponent was not ready!';
$txt['league_lost_not_ready'] = 'You lost!<br/>You were not ready for the battle!';
$txt['league_creating_battle'] = 'Please wait while the battle is created ...';
$txt['league_not_created_5min'] = 'The battle was not created within 5 minutes';
$txt['league_lost_not_created'] = 'You lost!<br/>The battle was not created!';
$txt['league_won_not_created'] = 'You won!<br/>The battle was not created!';
$txt['league_not_time_yet'] = 'It is not time for your battle yet!';

# map
$txt['map_search_1'] = 'There is nothing here!';
$txt['map_search_2'] = 'I almost found a legendary, but it vanished!';
$txt['map_search_3'] = 'I will not give up!';
$txt['map_search_4'] = 'I\'m sure I found a Pokémon around here...';
$txt['map_search_5'] = 'Found it! Oh no, it\'s just a rock!';
$txt['map_search_6'] = 'Aaah... I can\'t find anything!';
$txt['map_search_7'] = 'Come on, show yourselves!';
$txt['map_search_8'] = 'Is there any Pokémon here!?';
$txt['map_search_9'] = 'What\'s behind me?! Phew, it\'s just my shadow!';
$txt['map_search_10'] = 'Is there a Pokémon in the sky?! Oh, it\'s just a cloud.';
$txt['map_search_11'] = 'I think these Pokémon are afraid of me.';
$txt['map_search_12'] = 'I found some footprints! Aw, they\'re mine...';
$txt['map_safari_closed'] = 'The Safari Zone is closed!';

# use-items
$txt['use_choose_pokemon'] = 'You must choose a Pokémon!';
$txt['use_choose_for_item'] = 'Choose the Pokémon you want to use %s on.';
$txt['use_level'] = 'Level';
$txt['use_next'] = 'Next';
$txt['use_cannot_learn'] = 'Your Pokémon cannot learn this move!';
$txt['use_not_your_pokemon'] = 'This Pokémon is not yours!';
$txt['use_already_learned'] = '%1$s has already learned the move %2$s!';
$txt['use_learning'] = '%1$s is learning %2$s - %3$s.';
$txt['use_item_missing'] = 'You do not own this item!';
$txt['use_item_not_equippable'] = 'This item cannot be equipped on this Pokémon!';
$txt['use_item_already_equipped'] = 'The Pokémon already has this item equipped!';
$txt['use_item_egg'] = 'This item cannot be equipped on a Pokémon egg!';
$txt['use_choose_receive_item'] = 'Choose which Pokémon will receive the item %s.';
$txt['use_old_item_destroyed'] = 'If this Pokémon already has an item equipped, the old item will be destroyed!';
$txt['use_not_equipped'] = 'Not equipped';
$txt['use_no_items_to_equip'] = 'You have no items to equip on your Pokémon!';
$txt['use_cannot_equip_egg'] = 'You cannot equip this item on a Pokémon egg!';
$txt['use_cannot_heal'] = 'You cannot heal %s.';
$txt['use_only_fainted'] = 'Only works on Pokémon that have fainted completely.';
$txt['use_not_that_amount'] = 'You do not have that amount!';
$txt['use_amount_too_high'] = 'You cannot use this amount';
$txt['use_choose_receive_candy'] = 'Choose which Pokémon will receive the %s.';
$txt['use_spc_limit_25'] = ' You have already used %1$s 25x on %2$s.';
$txt['use_spc_max'] = ' A maximum of %1$sx %2$s can be used.';
$txt['use_dont_have_amount'] = 'You do not have %1$s %2$s!';
$txt['use_choose_with_amount'] = 'Choose the Pokémon you want to use %1$s on.<br> (You have %2$s %1$s)';
$txt['use_choose_stone'] = 'Choose the Pokémon you want to use %s on.';
$txt['use_evolved'] = 'Congratulations, your <strong>%1$s</strong> evolved into <strong>%2$s</strong>!';
$txt['use_choose_for_stone_post'] = 'Choose a Pokémon to use %s on.';
$txt['use_stone_not_usable'] = '%2$s cannot be used on the Pokémon %1$s.';
$txt['use_yes'] = 'Yes';
$txt['use_no'] = 'No';
$txt['use_not_usable'] = 'Not usable';
$txt['use_usable'] = 'Usable';
$txt['use_pokemon_label'] = 'Pokémon';
$txt['use_quantity'] = 'Amount';
$txt['use_equipped_col'] = 'Equipped';
$txt['use_equipped_with'] = 'Equipped with %s';
$txt['use_check'] = 'Check:';
$txt['use_name_col'] = 'Name:';
$txt['use_evolves_col'] = 'Evolves:';
$txt['use_confirm_evolve'] = 'Are you sure you want to evolve %s?';
$txt['use_stone_evolved'] = 'Congratulations, your <strong>%1$s</strong> evolved into <strong>%2$s</strong> with %3$s!';
/* === end externalized strings === */

$txt['battle_multi_hit'] = '%s hit %d times.';
$txt['battle_parental_hit'] = '%s hit %d times thanks to Parental Bond.';
$txt['battle_recoil'] = '%s is hurt by recoil.';
$txt['battle_copy_move'] = '%s copied the move %s!';
$txt['battle_copy_pokemon'] = '%s copied %s.';
$txt['battle_rocket_exit'] = 'Team Rocket is blasting off again!';
$txt['battle_opponent_must_attack'] = 'Your opponent must attack!';
$txt['league_battle_created'] = 'Battle created!<br />Redirecting to the battle …';
?>
