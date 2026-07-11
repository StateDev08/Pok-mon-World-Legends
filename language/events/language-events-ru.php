<?php
	######################## Rank up ###################
	$txt['event_rank_up'] = 'Ваш ранг повысился, ваш новый ранг: <b>%s</b>.';
	$txt['event_rank_up_refferal'] = 'Ваш реферал, %s, имеет ранг, и вам нужно получить 15 золотых очков!';
	######################## Evolve ####################
	$txt['event_is_evolved_in'] = '<b>%s</b> превратился в <b>%s</b>!';
	######################## Level up ##################
	$txt['event_is_level_up'] = '<b>%s</b> прошел следующий уровень!';
	
	######################## Work ######################
	if ($page == 'work' OR $workvs) {
		$txt['event_work_1_1'] = 'Вы превысили максимальное проданное количество! Вы выиграли <img src="' . $static_url . '/images/icons/silver.png» width="16" height="16" alt="Silver" class="imglower"> 15!';
		$txt['event_work_1_2_1'] = 'Ты выиграл';
		$txt['event_work_1_2_2'] = 'серебро продает лимонад.';
		$txt['event_work_1_3'] = 'Ты не продавал лимонад.';
		$txt['event_work_1_4'] = 'Твой лимонад был ужасен.';
		
		$txt['event_work_2_1'] = 'Вы работали на рынке 1 минуту, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_2_2'] = 'Вы не нашли рынок.';
		$txt['event_work_2_3'] = 'Ты все время гулял, ты ничего не заслуживаешь.';
		$txt['event_work_2_4'] = 'Вы арестованы, потому что пытались что-то украсть.';
		
		$txt['event_work_3_1'] = 'Вы подали все документы, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_3_2'] = 'Вы подали все документы, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_3_3'] = 'Вы не смогли предоставить все документы.';
		$txt['event_work_3_4'] = 'Идет дождь! Ты любишь холод, да? Вы слишком ленивы, чтобы работать.';
		
		$txt['event_work_4_1'] = 'Вы зачистили центр покемонов, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_4_2'] = 'Ты не почистил как следует центр покемонов.';
		$txt['event_work_4_3'] = 'Ченси недовольна твоей ленью, ты ничего не заслуживаешь!';
		
		$txt['event_work_5_1'] = 'Вы выиграли матч по гольфу у команды R! Вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_5_2'] = 'Вы проиграли матч по гольфу против команды R.';
		$txt['event_work_5_3'] = 'Вы едва не проиграли матч по гольфу команде R.';
		
		$txt['event_work_6_1'] = 'УХ ТЫ! Вы нашли золотые часы и продали их за <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_6_2'] = 'Вам повезло: вы нашли реликвию, которую продали за <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_6_3'] = 'Вы не нашли ничего ценного.';
		$txt['event_work_6_4'] = 'Вы нашли только старую газету.';
		
		$txt['event_work_7_1'] = 'Ваша демонстрация покемонов прошла успешно! Вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_7_2'] = 'Ваша демонстрация никому не понравилась.';
		$txt['event_work_7_3'] = 'Шел дождь, никто не остановился посмотреть на его демонстрацию.';
		
		$txt['event_work_8_1'] = 'Эксперимент удался! Вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_8_2'] = 'Эксперимент не удался.';
		$txt['event_work_8_3'] = 'Ваш покемон не смог участвовать в эксперименте, вы ничего не получили.';
		
		$txt['event_work_9_1'] = 'УХ ТЫ! Ты выиграл много серебра, <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_2'] = 'Было не очень интересно, ты выиграл <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_3'] = 'Ваша бесплатная демо-версия прошла успешно, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_4'] = 'Его покемоны очень устали.';
		$txt['event_work_9_5'] = 'Шел дождь, никто не остановился посмотреть на его демонстрацию.';
		
		$txt['event_work_10_1'] = 'Успех! Вы помогли захватить Команду R, вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_10_2'] = 'Вы не нашли Команду R.';
		$txt['event_work_10_3'] = 'Вам удалось поймать команду R, но им удалось сбежать.';
		
		$txt['event_work_11_1'] = 'Успех! У твоего покемона много серебра, <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_11_2'] = 'Ваш покемон приготовил это для вас <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_11_3'] = 'Ваш покемон стал желтым.';
		$txt['event_work_11_4'] = 'У вас не было возможности заработать серебро.';
		$txt['event_work_11_5'] = 'Вас арестовала офицер Дженни.';
		
		$txt['event_work_12_1'] = 'Вы украли из казино 2 мешка серебра! Вы выиграли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_12_2_1'] = 'Вы украли <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_12_2_2'] = 'казино.';
		$txt['event_work_12_3'] = 'Ваш покемон был слишком напуган, чтобы ограбить казино.';
		$txt['event_work_12_4'] = 'В казино сработала сигнализация, вам пришлось бежать.';
		$txt['event_work_12_5'] = 'Вас арестовала офицер Дженни.';
		
		$txt['event_jail_1'] = 'Вы сейчас';
		$txt['event_jail_2'] = 'минут и';
		$txt['event_jail_3'] = 'секунд в тюрьме.';
	}

	######################## Bank ######################
	if ($page == 'bank') {
		$txt['event_gave_you'] = 'отправлено вам';
	}
	
	####################### Steal ######################
	else if ($page == 'steal') {
		$txt['event_steal_failed'] = 'Он пытался саботировать тебя, но ты был сильнее.';
		$txt['event_steal_jail'] = 'попал в тюрьму, потому что пытался саботировать вас.';
		$txt['event_success_stole_1'] = 'саботировал тебя и получил';
		$txt['event_success_stole_2'] = 'потому что их покемоны были сильнее.';
	}
	
	###################### Jail ########################
	else if ($page == 'jail') {
		$txt['event_bust'] = 'вас арестовали.';
		$txt['event_bought'] = 'купил себе выход';
	}

	######################## Race ######################
	else if ($page == 'race') {
		$txt['event_race_denied'] = 'Запрос на участие в гонке был отклонен.';
		
		$txt['event_race_won_your'] = 'Вы выиграли гонку! Твой';
		$txt['event_finished_in'] = 'закончилось в';
		$txt['event_sec_the'] = 'секунд,';
		$txt['event_from'] = 'из';
		$txt['event_hit_tree_ko'] = 'он ударился о дерево и потерял сознание.';
		$txt['event_sec'] = 'сек.';
		$txt['event_race_lost_your'] = 'Вы проиграли гонку! Твой';
		$txt['event_the'] = 'ТО';
		$txt['event_race_draw_your'] = 'Ничья в гонке! Твой';
		$txt['event_and_the'] = 'и';
		$txt['event_hit_both_tree'] = 'Они оба врезались в дерево и потеряли сознание.';
		$txt['event_finished_both_in'] = 'Оба закончились';
	}
	
	######################## Race invite ########################
	else if ($page == 'race-invite') {
		$txt['event_want_race'] = 'хочет баллотироваться против тебя за';
		$txt['event_accept'] = 'Принять';
		$txt['event_deny'] = 'Мусор';
	}
	
	####################### Transferlist ########################
	else if ($page == 'transferlist-box') {
		$txt['event_bought_your'] = 'он купил';
		$txt['event_for'] = 'помещать';
		$txt['event_silver_from_tf'] = 'серебро на рынке покемонов.';
	}
	else if ($page == 'register') {
		$txt['refferal_register'] = '%s успешно зарегистрировался! По этой причине вы получите 5 золотых!';
	}
?>