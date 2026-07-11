<?php
if ($page == 'codes') {
	$txt['naam'] = 'Nazwa';
	$txt['code'] = 'Kod';
	$txt['example'] = 'Przykład';

	$txt['bold'] = 'Pogrubiony';
	$txt['underline'] = 'Podkreślać';
	$txt['italic'] = 'italski';
	$txt['marquee'] = 'duży namiot';
	$txt['center'] = 'Scentralizować';
	$txt['color'] = 'Kolor';
	$txt['player'] = 'Trener';
	$txt['hr'] = 'HR';
	$txt['image'] = 'Obraz';
	$txt['video'] = 'Wideo';
	$txt['poke_image'] = 'Pokémony';
	$txt['shiny_image'] = 'Błyszczący';
	$txt['poke_back'] = 'Powrót Pokemonów';
	$txt['shiny_back'] = 'Błyszczące plecy';
	$txt['poke_icon'] = 'Ikona Pokémona';
	$txt['shiny_icon'] = 'Błyszcząca ikona';

	$txt['example_text'] = 'To jest przykład.';
	$txt['no_example'] = 'Brak dostępnych przykładów.';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = 'Ranga jest zbyt niska.';
	$txt['alert_not_your_pokemon'] = 'To nie jest twój pokemon.';
	$txt['alert_beginpokemon'] = 'To jest twój początkowy pokemon, nie możesz go sprzedać.';
	$txt['alert_no_amount'] = 'Brak wpisanej kwoty.';
	$txt['alert_price_too_less'] = 'Pokemon za tani, minimum to <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_price_too_much'] = 'Pokemon za drogi, maksimum to <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_pokemon_already_for_sale'] = 'Ten pokemon jest już w sprzedaży.';
	$txt['alert_user_dont_exist'] = 'Użytkownik nie istnieje';
	$txt['alert_success_sell'] = 'Pomyślnie umieść swojego pokemona na liście transferów.';
	$txt['alert_too_much_on_transfer_1'] = 'Już to zrobiłeś';
	$txt['alert_too_much_on_transfer_2'] = 'pokemon na liście transferów.<br>Zdobądź pierwszego z listy transferów.';

	//Screen
	$txt['pagetitle'] = 'Sprzedać';
	$txt['sell_box_title_text_1'] = 'Czy na pewno chcesz umieścić';
	$txt['sell_box_title_text_2'] = 'na sprzedaż?';
	$txt['sell_box_title_text_3'] = 'jest obecnie wart';
	$txt['sell_box_title_text_4'] = 'srebrny.<br /><br />
		Ile chcesz srebra';
	$txt['sell_box_title_text_5'] = 'na sprzedaż za?';
	$txt['keep_empty'] = 'Możesz pozostawić to puste.';
	$txt['sell_rules'] = '* Możesz umieścić swojego pokemona na liście transferów za 1,5-krotność maksymalnej ceny.<br />
		*Cena minimalna jest ceną wartą zakupu.';
	$txt['button_sell_box'] = 'Sprzedać';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = 'Premia';
	$txt['colorbox_text'] = 'Otwórz to okno ponownie, a ten komunikat będzie nadal tutaj.';
	$txt['prembox_title_text_1'] = 'Chcesz kupić np';
	$txt['prembox_title_text_2'] = 'na konto';
	$txt['prembox_title_text_3'] = 'cena';
		
	$txt['call_text'] = '<div class="title_premium">Zadzwoń</div>Tutaj możesz zapłacić telefonem.<br />
		Komputer będzie z Tobą rozmawiać i podawać liczby. Wpisz cyfry z ekranu telefonu, gdy już to zrobisz, masz swój pakiet.';
	$txt['call_button'] = 'Zadzwoń teraz';
	$txt['paypal_text'] = '<div class="title_premium">Paypal</div>Tutaj możesz zapłacić za pomocą Paypal.<br />
		Paypal to metoda płatności online, potrzebujesz konta PayPal.';
	$txt['paypal_button'] = 'Paypal teraz';
	$txt['ideal_text'] = '<div class="title_premium">Idealny</div>
		Idealna jest metoda płatności. Możesz zapłacić swoim kontem bankowym.<br />
		W następujących bankach możesz płacić:<br />
		*ING<br />
		*ABM Amro<br />
		* Rabobank<br />
		*SNS<br />
		*Fortis<br />
		* Bank Fryzji';
	$txt['ideal_button'] = 'Płać nago';
	$txt['wallie_text'] = '<div class="title_premium">Wallie</div>
		Tutaj możesz zapłacić kartą wallie.<br />
		Kartę Wallie można kupić w niektórych sklepach, najprawdopodobniej jest to Free Record Shop.';
	$txt['wallie_button'] = 'Wallie, teraz';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = 'Chcesz kupić np'.$_SESSION['packnaam'].'paczka dla &euro;'.$info['kosten'].'z wpłatą bankową. Zobacz jak:<br /><br />
		1. Przejdź do strony swojego banku.<br />
		2. Przejdź do „przelewu pieniężnego”.<br />
		3. Wpisz przy opisie:<br />
			<div style="padding-left:25px; float:left;">* Strona: (<strong>MMO z przeglądarką Pokemon</strong>).</div><br />
			<div style="padding-left:25px; float:left;">* Nazwa użytkownika: (<strong>'.$_SESSION['naam'].'</strong>).</div><br />
			<div style="padding-left:25px;">* Nazwa pakietu: (<strong>'.$_SESSION['packnaam'].'</strong>).</div><br />
		4. Przelew<strong>&euro;'.$info['kosten'].'</strong> do <strong>56.09.35.803</strong>.<br />
		5. Poproś administratora (<strong>SV2011</strong>), aby sprawdził, czy płatność została zrealizowana.<br />
		Jeśli płatność przebiegnie pomyślnie, administrator przekaże Ci Twoje rzeczy premium.<br /><br />
		* Ważne! Jeśli przelejesz pieniądze w weekend, pieniądze zostaną przelane w poniedziałek.<br />
		* Przelej całą kwotę.';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = 'Pokémon został już sprzedany lub usunięty z rynku Pokémon przez właściciela.';
		$txt['alert_too_low_rank_1'] = 'To bardzo wysoki poziom.<br>Przy Twojej obecnej randze';
		$txt['alert_too_low_rank_2'] = 'To maksymalny poziom, jaki możesz kupić.';
		$txt['alert_house_full'] = 'Twój dom jest pełny.';
		$txt['alert_too_less_silver'] = 'Nie masz wystarczającej liczby srebrnych monet.';
		
		//Screen
		$txt['pagetitle'] = 'Lista transferowa';
		$txt['trbox_title_text_bought_1'] = 'Gratulacje, udane negocjacje!';
		$txt['trbox_title_text_bought_2'] = 'Nabyłeś';
		$txt['trbox_title_text_bought_3'] = 'skutecznie!';
		$txt['trbox_title_text_bought_4'] = 'Jest teraz w Twoim domu!';
		
		$txt['trbox_title_text_1'] = 'Czy chcesz kupić';
		$txt['trbox_title_text_2'] = 'z';
		$txt['trbox_title_text_3'] = 'ma teraz cenę';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = 'jest sprzedawany za cenę';
		$txt['trbox_title_text_6'] = 'Czy na pewno chcesz';
		$txt['trbox_title_text_7'] = '?';
		$txt['button_transferlist_box'] = 'Kupić';
	}