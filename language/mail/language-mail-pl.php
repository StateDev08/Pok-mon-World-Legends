<?php
if ($page == 'register') {
	$txt['mail_title'] = 'Rejestracja zakończona! Aktywuj swoje konto!';
	$txt['mail_body'] = '<h3 style="margines: 5px 0 5px 0; rozmiar czcionki:21px;">Witam' . $inlognaam . '! Twoja rejestracja została zakończona.</h3>
    	<p style="margines: 0 0 5px 0;">
    		Jesteś o krok od rozpoczęcia swojej podróży w <b><u>Pokémon World Legends</u></b>, a teraz musisz tylko <a href="https://www.pokemonworldlegends.com/activate" target="_blank" rel="noopener noreferrer">Aktywować swoje konto</a>.<br /><br />
    		<b>Twoja nazwa użytkownika:</b> <u style="color:#eeeeee;">' . $inlognaam . '</u><br />
    		<b>Kod aktywacyjny:</b> <u style="color:#eeeeee;">' . $activatiecode . '</u><br />
    		<center><u>Proszę zachować tę wiadomość e-mail, ponieważ informacje te mogą być przydatne w przyszłości!</u><br />
    		<b>Z poważaniem, Zespół Pokémon World Legends!<br /></b></center>
    	</p>';
} else if ($page == 'contact') {
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0;">Wiadomość kontaktowa:</h3>
	<p style="margines: 0 0 5px 0;">' . $bericht . '</p>';
} else if ($page == 'forgot') {
	$txt['mail_title'] = 'Zapomniałeś hasła?';
	$txt['mail_body'] = '<h3 style="margines: 5px 0 5px 0; rozmiar czcionki:21px;">Witam <b>' . $gegeven['username'] . '</b>!</h3>
	<p style="margines: 0 0 5px 0;">
		Poprosiłeś o nowe hasło i jest ono teraz: <u style="color:#eeeeee;">' . $nieuwww . '</u><br /><br />
		<center><u>Pamiętaj, aby to zmienić w Ustawieniach konta!</u><br />
    	<b>Z poważaniem, Zespół Pokémon World Legends!<br /></b></center>
	</p>';
} else if ($page == 'activate') {
	$txt['mail_title_activate'] = 'Witamy w Legendach Świata';
	$txt['mail_body_activate'] = '<h3 style="margines: 5px 0 5px 0;">Witam' . $rekening['username'] . '!</h3>
	<p style="margines: 0 0 5px 0;">
		Właśnie zakończyłeś rejestrację! Teraz możesz się dobrze bawić grając ze znajomymi, łapiąc ponad 900 gatunków Pokémonów, walcząc z Trenerami i nie tylko!<br /><br />
		<b>Bonus powitalny:</b>' . $activate_bonus . '<br /><br />
		<b>Z poważaniem</b><br />
		<u>Zespół Legend Świata!</u>
	</p>';

	$txt['mail_title_resend'] = 'Kod aktywacyjny';
	$txt['mail_body_resend'] = '<h3 style="margines: 5px 0 5px 0; rozmiar czcionki:21px;">Witam' . $rekening['username'] . '!</h3>
	<p style="margines: 0 0 5px 0;">
		Zgodnie z prośbą prześlemy Ci ponownie kod aktywacyjny Twojego konta.<br /><br />
		<b>Kod aktywacyjny:</b> <u style="color:#eeeeee;">' . $rekening['account_code'] . '</u><br /><br />
		<center><b>Z poważaniem, Zespół Pokémon World Legends!</b></center>
	</p>';
} else if ($page == 'donate') {
	$txt['mail_title'] = 'Sklep premium w obszarze Pokemon';
	$txt['mail_body'] = 'Najlepszy'.$voornaam.' '.$achternaam.',<br /><br />
		Je hebt een <b>'.$packnaam.'</b> gekocht ter waarde van &euro;'.$packkosten.'<br />
		Uważaj, aby poczta poszła, dit geldt als een betalingsbewijs.<br /><br />
		Veel plezier hiermee!<br /><br />
		Spotkałem vriendelijke groeta,<br />
		Zespół MMO w przeglądarce Pokemon';
}