<?php
if ($page == 'codes') {
	$txt['naam'] = 'Имя';
	$txt['code'] = 'Код';
	$txt['example'] = 'Пример';

	$txt['bold'] = 'Смелый';
	$txt['underline'] = 'Подчеркнуть';
	$txt['italic'] = 'Курсив';
	$txt['marquee'] = 'шатер';
	$txt['center'] = 'Централизовать';
	$txt['color'] = 'Цвет';
	$txt['player'] = 'Тренер';
	$txt['hr'] = 'HR';
	$txt['image'] = 'Изображение';
	$txt['video'] = 'Видео';
	$txt['poke_image'] = 'Покемон';
	$txt['shiny_image'] = 'блестящий';
	$txt['poke_back'] = 'Покемон назад';
	$txt['shiny_back'] = 'Блестящая спина';
	$txt['poke_icon'] = 'Значок покемона';
	$txt['shiny_icon'] = 'Блестящая иконка';

	$txt['example_text'] = 'Это пример.';
	$txt['no_example'] = 'Нет доступных примеров.';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = 'Ранг слишком низкий.';
	$txt['alert_not_your_pokemon'] = 'Это не твой покемон.';
	$txt['alert_beginpokemon'] = 'Это ваш начинающий покемон, продать его нельзя.';
	$txt['alert_no_amount'] = 'Без указания суммы.';
	$txt['alert_price_too_less'] = 'Покемоны слишком дешевые, минимум <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_price_too_much'] = 'Покемоны слишком дорогие, максимум — <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_pokemon_already_for_sale'] = 'Этот покемон уже продается.';
	$txt['alert_user_dont_exist'] = 'Пользователь не существует';
	$txt['alert_success_sell'] = 'Успешно добавьте своего покемона в список трансферов.';
	$txt['alert_too_much_on_transfer_1'] = 'Вы уже';
	$txt['alert_too_much_on_transfer_2'] = 'покемон в списке переноса.<br>Получите первого из списка переноса.';

	//Screen
	$txt['pagetitle'] = 'Продавать';
	$txt['sell_box_title_text_1'] = 'Вы уверены, что хотите поставить';
	$txt['sell_box_title_text_2'] = 'выставлен на продажу?';
	$txt['sell_box_title_text_3'] = 'на данный момент стоит';
	$txt['sell_box_title_text_4'] = 'серебро.<br /><br />
		Сколько серебра ты хочешь?';
	$txt['sell_box_title_text_5'] = 'в продаже за?';
	$txt['keep_empty'] = 'Вы можете оставить это пустым.';
	$txt['sell_rules'] = '* Вы можете поместить своего покемона в трансферный список за 1,5-кратную максимальную стоимость.<br />
		* Минимальная цена является стоимостной.';
	$txt['button_sell_box'] = 'Продавать';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = 'Премиум';
	$txt['colorbox_text'] = 'Откройте это окно еще раз, и это сообщение все еще будет здесь.';
	$txt['prembox_title_text_1'] = 'Вы хотите купить';
	$txt['prembox_title_text_2'] = 'за счет';
	$txt['prembox_title_text_3'] = 'цена';
		
	$txt['call_text'] = '<div class="title_premium">Позвонить</div>Здесь можно оплатить с помощью телефона.<br />
		Компьютер будет разговаривать с вами и называть цифры. Введите цифры с экрана вашего телефона, и когда это будет сделано, вы получите свой пакет.';
	$txt['call_button'] = 'Позвоните сейчас';
	$txt['paypal_text'] = '<div class="title_premium">Paypal</div>Здесь вы можете оплатить через Paypal.<br />
		Paypal — это способ онлайн-платежей, вам понадобится учетная запись PayPal.';
	$txt['paypal_button'] = 'PayPal сейчас';
	$txt['ideal_text'] = '<div class="title_premium">Идеально</div>
		Идеал – это способ оплаты. Вы можете оплатить со своего банковского счета.<br />
		Вы можете оплатить в следующих банках:<br />
		* ИНГ<br />
		* ПРО Амро<br />
		* Рабобанк<br />
		* Социальные сети<br />
		* Фортис<br />
		* Фрисландский банк';
	$txt['ideal_button'] = 'Плати голым';
	$txt['wallie_text'] = '<div class="title_premium">Вэлли</div>
		Здесь вы можете оплатить картой Wallie.<br />
		Вы можете купить Wallie Card в некоторых магазинах, чаще всего в Free Record Shop.';
	$txt['wallie_button'] = 'Уолли сейчас';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = 'Вы хотите купить'.$_SESSION['packnaam'].'пакет для &euro;'.$info['kosten'].'с банковским платежом. Посмотрите здесь:<br /><br />
		1. Зайдите на сайт вашего банка.<br />
		2. Перейдите в раздел «Денежные переводы».<br />
		3. Вставьте в описание:<br />
			<div style="padding-left:25px; float:left;">* Сайт: (<strong>Браузерная MMO Pokemon</strong>).</div><br />
			<div style="padding-left:25px; float:left;">* Имя пользователя: (<strong>'.$_SESSION['naam'].'</strong>).</div><br />
			<div style="padding-left:25px;">* Имя пакета: (<strong>'.$_SESSION['packnaam'].'</strong>).</div><br />
		4. Передача<strong>&euro;'.$info['kosten'].'</strong> до <strong>56.09.35.803</strong>.<br />
		5. Попросите администратора (<strong>SV2011</strong>) проверить платеж.<br />
		Если оплата пройдет успешно, администратор передаст вам ваши премиум вещи.<br /><br />
		* Важно! Если вы переводите деньги в выходные дни, деньги будут переведены в понедельник.<br />
		*Перевести всю сумму.';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = 'Покемон уже продан или удален владельцем с рынка покемонов.';
		$txt['alert_too_low_rank_1'] = 'Это очень высокий уровень.<br>При вашем нынешнем ранге';
		$txt['alert_too_low_rank_2'] = 'Это максимальный уровень, который вы можете купить.';
		$txt['alert_house_full'] = 'Ваш дом полон.';
		$txt['alert_too_less_silver'] = 'У вас недостаточно серебряных монет.';
		
		//Screen
		$txt['pagetitle'] = 'Трансферлист';
		$txt['trbox_title_text_bought_1'] = 'Поздравляем, успешные переговоры!';
		$txt['trbox_title_text_bought_2'] = 'Вы приобрели';
		$txt['trbox_title_text_bought_3'] = 'успешно!';
		$txt['trbox_title_text_bought_4'] = 'Теперь оно у вас дома!';
		
		$txt['trbox_title_text_1'] = 'Вы хотите купить';
		$txt['trbox_title_text_2'] = 'из';
		$txt['trbox_title_text_3'] = 'теперь имеет цену';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = 'продается по цене';
		$txt['trbox_title_text_6'] = 'Вы уверены, что хотите';
		$txt['trbox_title_text_7'] = '?';
		$txt['button_transferlist_box'] = 'Купить';
	}