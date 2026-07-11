<?php
if ($page == 'register') {
	$txt['mail_title'] = 'Registration completed! Activate your Account!';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hello' . $inlognaam . '! Your registration has been completed.</h3>
    	<p style="margin: 0 0 5px 0;">
    		You\'re one step away from starting your Journey in <b><u>Pokémon World Legends</u></b>, and now you just need to <a href="https://www.pokemonworldlegends.com/activate" target="_blank" rel="noopener noreferrer">Activate your Account</a>.<br /><br />
    		<b>Your Username:</b> <u style="color:#eeeeee;">' . $inlognaam . '</u><br />
    		<b>Activation Code:</b> <u style="color:#eeeeee;">' . $activatiecode . '</u><br />
    		<center><u>Please keep this email as this information may be useful in the future!</u><br />
    		<b>Sincerely, Pokémon World Legends Team!<br /></b></center>
    	</p>';
} else if ($page == 'contact') {
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0;">Contact message:</h3>
	<p style="margin: 0 0 5px 0;">' . $bericht . '</p>';
} else if ($page == 'forgot') {
	$txt['mail_title'] = 'Forgot your password?';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hello <b>' . $gegeven['username'] . '</b>!</h3>
	<p style="margin: 0 0 5px 0;">
		You requested a new password, and it is now: <u style="color:#eeeeee;">' . $nieuwww . '</u><br /><br />
		<center><u>Remember to change it in your Account Settings!</u><br />
    	<b>Sincerely, Pokémon World Legends Team!<br /></b></center>
	</p>';
} else if ($page == 'activate') {
	$txt['mail_title_activate'] = 'Welcome to World Legends';
	$txt['mail_body_activate'] = '<h3 style="margin: 5px 0 5px 0;">Hello' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		You have just completed your registration! Now you can have fun playing with friends, catching 900+ Pokémon species, battling Trainers, and more!<br /><br />
		<b>Welcome bonus:</b>' . $activate_bonus . '<br /><br />
		<b>Sincerely,</b><br />
		<u>World Legends Team!</u>
	</p>';

	$txt['mail_title_resend'] = 'Activation Code';
	$txt['mail_body_resend'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Hello' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		As requested, we will re-send you the Activation Code for your account.<br /><br />
		<b>Activation code:</b> <u style="color:#eeeeee;">' . $rekening['account_code'] . '</u><br /><br />
		<center><b>Sincerely, Pokémon World Legends Team!</b></center>
	</p>';
} else if ($page == 'donate') {
	$txt['mail_title'] = 'Pokemon Area Premium Shop';
	$txt['mail_body'] = 'Beste'.$voornaam.' '.$achternaam.',<br /><br />
		Je hebt een <b>'.$packnaam.'</b> gekocht ter waarde van &euro;'.$packkosten.'<br />
		Bewaar deze mail goed, dit geldt als een betalingsbewijs.<br /><br />
		Veel plezier hiermee!<br /><br />
		Met vriendelijke groet,<br />
		Pokemon Browser MMO Team';
}