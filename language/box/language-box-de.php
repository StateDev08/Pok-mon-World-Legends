<?php
if ($page == 'codes') {
	$txt['naam'] = 'Name';
	$txt['code'] = 'Code';
	$txt['example'] = 'Beispiel';

	$txt['bold'] = 'Deutlich';
	$txt['underline'] = 'Unterstreichen';
	$txt['italic'] = 'Kursiv';
	$txt['marquee'] = 'Festzelt';
	$txt['center'] = 'Zentralisieren';
	$txt['color'] = 'Farbe';
	$txt['player'] = 'Trainer';
	$txt['hr'] = 'Personalwesen';
	$txt['image'] = 'Bild';
	$txt['video'] = 'Video';
	$txt['poke_image'] = 'Pokémon';
	$txt['shiny_image'] = 'Glänzend';
	$txt['poke_back'] = 'Pokémon zurück';
	$txt['shiny_back'] = 'Glänzender Rücken';
	$txt['poke_icon'] = 'Pokémon-Symbol';
	$txt['shiny_icon'] = 'Glänzendes Symbol';

	$txt['example_text'] = 'Dies ist ein Beispiel.';
	$txt['no_example'] = 'Keine Beispiele verfügbar.';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = 'Der Rang ist zu niedrig.';
	$txt['alert_not_your_pokemon'] = 'Das ist nicht dein Pokémon.';
	$txt['alert_beginpokemon'] = 'Das ist dein Anfangspokemon, du kannst es nicht verkaufen.';
	$txt['alert_no_amount'] = 'Keine Betragseingabe.';
	$txt['alert_price_too_less'] = 'Pokémon zu günstig, mindestens <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_price_too_much'] = 'Pokémon zu teuer, maximal <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_pokemon_already_for_sale'] = 'Dieses Pokémon steht bereits zum Verkauf.';
	$txt['alert_user_dont_exist'] = 'Benutzer existiert nicht';
	$txt['alert_success_sell'] = 'Setzen Sie Ihr Pokémon erfolgreich auf die Transferliste.';
	$txt['alert_too_much_on_transfer_1'] = 'Das hast du bereits getan';
	$txt['alert_too_much_on_transfer_2'] = 'Pokémon auf der Transferliste.<br>Hol dir das erste aus der Transferliste.';

	//Screen
	$txt['pagetitle'] = 'Verkaufen';
	$txt['sell_box_title_text_1'] = 'Sind Sie sicher, dass Sie es platzieren möchten?';
	$txt['sell_box_title_text_2'] = 'steht zum Verkauf?';
	$txt['sell_box_title_text_3'] = 'ist derzeit wert';
	$txt['sell_box_title_text_4'] = 'Silber.<br /><br />
		Wie viel Silber möchten Sie?';
	$txt['sell_box_title_text_5'] = 'zum Verkauf für?';
	$txt['keep_empty'] = 'Sie können dies leer lassen.';
	$txt['sell_rules'] = '* Du kannst dein Pokémon für das 1,5-fache des maximalen Wertpreises auf die Transferliste setzen.<br />
		* Der Mindestpreis ist der Preis.';
	$txt['button_sell_box'] = 'Verkaufen';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = 'Prämie';
	$txt['colorbox_text'] = 'Öffnen Sie dieses Fenster erneut und diese Nachricht wird immer noch hier sein.';
	$txt['prembox_title_text_1'] = 'Sie möchten ein kaufen';
	$txt['prembox_title_text_2'] = 'für Rechnung';
	$txt['prembox_title_text_3'] = 'Preis';
		
	$txt['call_text'] = '<div class="title_premium">Anruf</div>Hier können Sie mit dem Telefon bezahlen.<br />
		Ein Computer wird mit Ihnen sprechen und Ihnen Zahlen sagen. Geben Sie die Nummern auf dem Bildschirm Ihres Telefons ein. Wenn Sie fertig sind, haben Sie Ihren Rucksack.';
	$txt['call_button'] = 'Rufen Sie jetzt an';
	$txt['paypal_text'] = '<div class="title_premium">Paypal</div>Hier können Sie mit Paypal bezahlen.<br />
		Paypal ist eine Online-Zahlungsmethode, Sie benötigen ein Paypal-Konto.';
	$txt['paypal_button'] = 'Jetzt Paypal';
	$txt['ideal_text'] = '<div class="title_premium">Ideal</div>
		Ideal ist eine Bezahlmethode. Sie können mit Ihrem Bankkonto bezahlen.<br />
		Bei folgenden Banken können Sie bezahlen:<br />
		* ING<br />
		* ABM Amro<br />
		* Rabobank<br />
		* SNS<br />
		* Fortis<br />
		* Friesland Bank';
	$txt['ideal_button'] = 'Zahlen Sie nackt';
	$txt['wallie_text'] = '<div class="title_premium">Wallie</div>
		Hier können Sie mit einer Wallie-Karte bezahlen.<br />
		In einigen Geschäften können Sie eine Wallie-Karte kaufen, am wahrscheinlichsten ist Free Record Shop.';
	$txt['wallie_button'] = 'Wallie jetzt';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = 'Sie möchten ein kaufen'.$_SESSION['packnaam'].'Pack für &euro;'.$info['kosten'].'mit einer Banküberweisung. Sehen Sie hier, wie:<br /><br />
		1. Gehen Sie zur Website Ihrer Bank.<br />
		2. Gehen Sie zu „Geldtransfer“.<br />
		3. Fügen Sie bei der Beschreibung Folgendes ein:<br />
			<div style="padding-left:25px; float:left;">* Site: (<strong>Pokemon Browser MMO</strong>).</div><br />
			<div style="padding-left:25px; float:left;">* Benutzername: (<strong>'.$_SESSION['naam'].'</strong>).</div><br />
			<div style="padding-left:25px;">* Paketname: (<strong>'.$_SESSION['packnaam'].'</strong>).</div><br />
		4. Übertragen<strong>&euro;'.$info['kosten'].'</strong> bis <strong>56.09.35.803</strong>.<br />
		5. Bitten Sie einen Administrator (<strong>SV2011</strong>), zu überprüfen, ob die Zahlung erfolgt ist.<br />
		Wenn die Zahlung erfolgreich ist, übergibt Ihnen der Administrator Ihre Premium-Sachen.<br /><br />
		* Wichtig! Wenn Sie am Wochenende Geld überweisen, erfolgt die Überweisung am Montag.<br />
		* Überweisen Sie den gesamten Betrag.';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = 'Das Pokémon wurde vom Besitzer bereits verkauft oder vom Pokémon-Markt entfernt.';
		$txt['alert_too_low_rank_1'] = 'Es ist ein sehr hohes Niveau.<br>Mit Ihrem aktuellen Rang';
		$txt['alert_too_low_rank_2'] = 'Es ist die maximale Stufe, die Sie kaufen können.';
		$txt['alert_house_full'] = 'Dein Haus ist voll.';
		$txt['alert_too_less_silver'] = 'Sie haben nicht genügend Silbermünzen.';
		
		//Screen
		$txt['pagetitle'] = 'Transferliste';
		$txt['trbox_title_text_bought_1'] = 'Herzlichen Glückwunsch, erfolgreiche Verhandlung!';
		$txt['trbox_title_text_bought_2'] = 'Du hast erworben';
		$txt['trbox_title_text_bought_3'] = 'erfolgreich!';
		$txt['trbox_title_text_bought_4'] = 'Es ist jetzt bei Ihnen zu Hause!';
		
		$txt['trbox_title_text_1'] = 'Möchten Sie kaufen?';
		$txt['trbox_title_text_2'] = 'von';
		$txt['trbox_title_text_3'] = 'hat jetzt einen Preis von';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = 'wird zum Preis von verkauft';
		$txt['trbox_title_text_6'] = 'Sind Sie sicher, dass Sie möchten?';
		$txt['trbox_title_text_7'] = '?';
		$txt['button_transferlist_box'] = 'Kaufen';
	}