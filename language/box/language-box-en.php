<?php
if ($page == 'codes') {
	$txt['naam'] = 'Name';
	$txt['code'] = 'Code';
	$txt['example'] = 'Example';

	$txt['bold'] = 'Bold';
	$txt['underline'] = 'Underline';
	$txt['italic'] = 'Italic';
	$txt['marquee'] = 'marquee';
	$txt['center'] = 'Centralize';
	$txt['color'] = 'Color';
	$txt['player'] = 'Trainer';
	$txt['hr'] = 'HR';
	$txt['image'] = 'Image';
	$txt['video'] = 'Video';
	$txt['poke_image'] = 'Pokémon';
	$txt['shiny_image'] = 'Shiny';
	$txt['poke_back'] = 'Pokemon back';
	$txt['shiny_back'] = 'Shiny back';
	$txt['poke_icon'] = 'Pokémon icon';
	$txt['shiny_icon'] = 'Shiny icon';

	$txt['example_text'] = 'This is an example.';
	$txt['no_example'] = 'No examples available.';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = 'Rank is too low.';
	$txt['alert_not_your_pokemon'] = 'This is not your pokemon.';
	$txt['alert_beginpokemon'] = 'This is your beginning pokemon, you can\'t sell him.';
	$txt['alert_no_amount'] = 'No amount insert.';
	$txt['alert_price_too_less'] = 'Pokemon too cheap, minimum is <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_price_too_much'] = 'Pokemon too expensive, maximum is <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_pokemon_already_for_sale'] = 'This pokemon is already for sale.';
	$txt['alert_user_dont_exist'] = 'User doesn\'t exist';
	$txt['alert_success_sell'] = 'Successfully put your pokemon on the transferlist.';
	$txt['alert_too_much_on_transfer_1'] = 'You\'ve already';
	$txt['alert_too_much_on_transfer_2'] = 'pokemon on the transfer list.<br>Get first one from the transfer list.';

	//Screen
	$txt['pagetitle'] = 'Sell';
	$txt['sell_box_title_text_1'] = 'Are you sure you want to put';
	$txt['sell_box_title_text_2'] = 'up for sale?';
	$txt['sell_box_title_text_3'] = 'is currently worth';
	$txt['sell_box_title_text_4'] = 'silver.<br /><br />
		How much silver do you want';
	$txt['sell_box_title_text_5'] = 'on sale for?';
	$txt['keep_empty'] = 'You can keep this empty.';
	$txt['sell_rules'] = '* You can put your pokemon on the transferlist for 1.5 times the maximum worth price.<br />
		* The minimum price is the worth price.';
	$txt['button_sell_box'] = 'Sell';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = 'Premium';
	$txt['colorbox_text'] = 'Open this window again and this message will still be here.';
	$txt['prembox_title_text_1'] = 'You want to buy a';
	$txt['prembox_title_text_2'] = 'for account';
	$txt['prembox_title_text_3'] = 'price';
		
	$txt['call_text'] = '<div class="title_premium">Call</div>Here you can pay with the phone.<br />
		A computer will talk to you and say numbers to you. Type the numbers from the screen on your phone, when it\'s done, you have your pack.';
	$txt['call_button'] = 'Call now';
	$txt['paypal_text'] = '<div class="title_premium">Paypal</div>Here can you pay with Paypal.<br />
		Paypal is an online payment method, you need a paypal account.';
	$txt['paypal_button'] = 'Paypal now';
	$txt['ideal_text'] = '<div class="title_premium">Ideal</div>
		Ideal is a pay-method. You can pay with your bank account.<br />
		With the following banks you can pay:<br />
		* ING<br />
		* ABM Amro<br />
		* Rabobank<br />
		* SNS<br />
		* Fortis<br />
		* Friesland Bank';
	$txt['ideal_button'] = 'Pay naked';
	$txt['wallie_text'] = '<div class="title_premium">Wallie</div>
		Here can you pay with a wallie card.<br />
		You can buy a wallie card at some shops, the most likely is Free Record Shop.';
	$txt['wallie_button'] = 'Wallie now';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = 'You want to buy a'.$_SESSION['packnaam'].'pack for &euro;'.$info['kosten'].'with a bank payment. See here how:<br /><br />
		1. Go to your bank website.<br />
		2. Go to \'money transfer\'.<br />
		3. Insert at description:<br />
			<div style="padding-left:25px; float:left;">* Site: (<strong>Pokemon Browser MMO</strong>).</div><br />
			<div style="padding-left:25px; float:left;">* Username: (<strong>'.$_SESSION['naam'].'</strong>).</div><br />
			<div style="padding-left:25px;">* Packname: (<strong>'.$_SESSION['packnaam'].'</strong>).</div><br />
		4. Transfer<strong>&euro;'.$info['kosten'].'</strong> to <strong>56.09.35.803</strong>.<br />
		5. Ask an administrator (<strong>SV2011</strong>) to check of the payment is done.<br />
		If the payment is successfully, the administrator will give you your premium things.<br /><br />
		* Important! If you transfer money in the weekend, the money will be transferred on Monday.<br />
		* Transfer the entire amount.';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = 'The Pokémon has already been sold or removed from the Pokémon market by the owner.';
		$txt['alert_too_low_rank_1'] = 'It\'s a very high level.<br>With your current rank';
		$txt['alert_too_low_rank_2'] = 'It\'s the maximum level you can buy.';
		$txt['alert_house_full'] = 'Your house is full.';
		$txt['alert_too_less_silver'] = 'You don\'t have enough silver coins.';
		
		//Screen
		$txt['pagetitle'] = 'Transferlist';
		$txt['trbox_title_text_bought_1'] = 'Congratulations, successful negotiation!';
		$txt['trbox_title_text_bought_2'] = 'You acquired';
		$txt['trbox_title_text_bought_3'] = 'successfully!';
		$txt['trbox_title_text_bought_4'] = 'It\'s now in your home!';
		
		$txt['trbox_title_text_1'] = 'Do you want to buy';
		$txt['trbox_title_text_2'] = 'of';
		$txt['trbox_title_text_3'] = 'now has a price of';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = 'is being sold for the price of';
		$txt['trbox_title_text_6'] = 'Are you sure you want';
		$txt['trbox_title_text_7'] = '?';
		$txt['button_transferlist_box'] = 'Buy';
	}