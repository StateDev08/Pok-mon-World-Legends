<?php
if ($page == 'register') {
	$txt['mail_title'] = 'Registrierung abgeschlossen! Aktivieren Sie Ihr Konto!';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hallo' . $inlognaam . '! Ihre Registrierung ist abgeschlossen.</h3>
    	<p style="margin: 0 0 5px 0;">
    		Sie sind nur noch einen Schritt davon entfernt, Ihre Reise in <b><u>Pokémon World Legends</u></b> zu beginnen, und jetzt müssen Sie nur noch <a href="https://www.pokemonworldlegends.com/activate" target="_blank" rel="noopener noreferrer">Ihr Konto aktivieren</a>.<br /><br />
    		<b>Ihr Benutzername:</b> <u style="color:#eeeeee;">' . $inlognaam . '</u><br />
    		<b>Aktivierungscode:</b> <u style="color:#eeeeee;">' . $activatiecode . '</u><br />
    		<center><u>Bitte bewahren Sie diese E-Mail auf, da diese Informationen in Zukunft nützlich sein könnten!</u><br />
    		<b>Mit freundlichen Grüßen, Pokémon World Legends Team!<br /></b></center>
    	</p>';
} else if ($page == 'contact') {
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0;">Kontaktnachricht:</h3>
	<p style="margin: 0 0 5px 0;">' . $bericht . '</p>';
} else if ($page == 'forgot') {
	$txt['mail_title'] = 'Passwort vergessen?';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hallo <b>' . $gegeven['username'] . '</b>!</h3>
	<p style="margin: 0 0 5px 0;">
		Sie haben ein neues Passwort angefordert und es lautet jetzt: <u style="color:#eeeeee;">' . $nieuwww . '</u><br /><br />
		<center><u>Denken Sie daran, es in Ihren Kontoeinstellungen zu ändern!</u><br />
    	<b>Mit freundlichen Grüßen, Pokémon World Legends Team!<br /></b></center>
	</p>';
} else if ($page == 'activate') {
	$txt['mail_title_activate'] = 'Willkommen bei World Legends';
	$txt['mail_body_activate'] = '<h3 style="margin: 5px 0 5px 0;">Hallo' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		Sie haben gerade Ihre Registrierung abgeschlossen! Jetzt können Sie Spaß daran haben, mit Freunden zu spielen, über 900 Pokémon-Arten zu fangen, gegen Trainer zu kämpfen und vieles mehr!<br /><br />
		<b>Willkommensbonus:</b>' . $activate_bonus . '<br /><br />
		<b>Mit freundlichen Grüßen</b><br />
		<u>World Legends Team!</u>
	</p>';

	$txt['mail_title_resend'] = 'Aktivierungscode';
	$txt['mail_body_resend'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hallo' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		Auf Wunsch senden wir Ihnen den Aktivierungscode für Ihr Konto erneut zu.<br /><br />
		<b>Aktivierungscode:</b> <u style="color:#eeeeee;">' . $rekening['account_code'] . '</u><br /><br />
		<center><b>Mit freundlichen Grüßen, Pokémon World Legends Team!</b></center>
	</p>';
} else if ($page == 'donate') {
	$txt['mail_title'] = 'Pokemon Area Premium Shop';
	$txt['mail_body'] = 'Beste'.$voornaam.' '.$achternaam.',<br /><br />
		Ich habe ein <b>'.$packnaam.'</b> gekocht ter waarde van &euro;'.$packkosten.'<br />
		Beachten Sie, dass diese E-Mail eingegangen ist, und sie hat auch eine Anmeldebestätigung erhalten.<br /><br />
		Viel Spaß hier!<br /><br />
		Mit vriendelijke groet,<br />
		Pokemon Browser MMO Team';
}