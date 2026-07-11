<?php
if ($page == 'register') {
	$txt['mail_title'] = 'Регистрация завершена! Активируйте свой аккаунт!';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Привет!' . $inlognaam . '! Ваша регистрация завершена.</h3>
    	<p style="margin: 0 0 5px 0;">
    		Вы в одном шаге от начала своего путешествия в <b><u>Pokémon World Legends</u></b>, и теперь вам просто нужно <a href="https://www.pokemonworldlegends.com/activate" target="_blank" rel="noopener noreferrer">Активировать свою учетную запись</a>.<br /><br />
    		<b>Ваше имя пользователя:</b> <u style="color:#eeeeee;">' . $inlognaam . '</u><br />
    		<b>Код активации:</b> <u style="color:#eeeeee;">' . $activatiecode . '</u><br />
    		<center><u>Сохраните это письмо, поскольку эта информация может оказаться полезной в будущем!</u><br />
    		<b>С уважением, Команда Pokémon World Legends!<br /></b></center>
    	</p>';
} else if ($page == 'contact') {
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0;">Контактное сообщение:</h3>
	<p style="margin: 0 0 5px 0;">' . $bericht . '</p>';
} else if ($page == 'forgot') {
	$txt['mail_title'] = 'Забыли пароль?';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Привет, <b>' . $gegeven['username'] . '</b>!</h3>
	<p style="margin: 0 0 5px 0;">
		Вы запросили новый пароль, и теперь он: <u style="color:#eeeeee;">' . $nieuwww . '</u><br /><br />
		<center><u>Не забудьте изменить его в настройках учетной записи!</u><br />
    	<b>С уважением, Команда Pokémon World Legends!<br /></b></center>
	</p>';
} else if ($page == 'activate') {
	$txt['mail_title_activate'] = 'Добро пожаловать в мир легенд';
	$txt['mail_body_activate'] = '<h3 style="margin: 5px 0 5px 0;">Привет!' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		Вы только что завершили регистрацию! Теперь вы можете весело провести время, играя с друзьями, ловя более 900 видов покемонов, сражаясь с тренерами и многое другое!<br /><br />
		<b>Приветственный бонус:</b>' . $activate_bonus . '<br /><br />
		<b>С уважением,</b><br />
		<u>Команда мировых легенд!</u>
	</p>';

	$txt['mail_title_resend'] = 'Код активации';
	$txt['mail_body_resend'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">Привет!' . $rekening['username'] . '!</h3>
	<p style="margin: 0 0 5px 0;">
		По запросу мы повторно вышлем вам код активации для вашей учетной записи.<br /><br />
		<b>Код активации:</b> <u style="color:#eeeeee;">' . $rekening['account_code'] . '</u><br /><br />
		<center><b>С уважением, команда Pokémon World Legends!</b></center>
	</p>';
} else if ($page == 'donate') {
	$txt['mail_title'] = 'Премиум-магазин Pokemon Area';
	$txt['mail_body'] = 'Бесте'.$voornaam.' '.$achternaam.',<br /><br />
		Джехебтин <b>'.$packnaam.'</b> не работает &euro;'.$packkosten.'<br />
		Когда письмо было отправлено, оно также было отправлено в виде сообщений.<br /><br />
		Очень приятно!<br /><br />
		Встретил vriendelijke groet,<br />
		Команда Pokemon Browser MMO';
}