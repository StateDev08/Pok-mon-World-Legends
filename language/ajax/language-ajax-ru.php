<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= 'Будьте осторожны, этот покемон вам не принадлежит!';
	$txt['alert_beginpokemon']				= 'Вы не можете продать своего стартового покемона!';
	$txt['alert_too_low_rank']				= 'Вы не можете продавать покемонов!';
	$txt['alert_geb_too_low_rank']			= 'Этот тренер не может купить этого покемона!';
	$txt['alert_no_amount']					= 'Вы должны ввести допустимое значение!';
	$txt['alert_price_too_less']			= 'Значение не может быть меньше %s!';
	$txt['alert_price_too_much']			= 'Значение не может быть больше %s!';
	$txt['alert_user_dont_exist']			= 'Тренер не найден!';
	$txt['alert_pokemon_already_for_sale']	= 'Этот покемон уже в продаже!';
	$txt['alert_success_sell']				= 'Покемон успешно объявлен!';

	$txt['pagetitle']	= 'Вы уверены, что хотите выставить %s на продажу?';
	$txt['information']	= 'Информация';
	$txt['sell']		= 'Продавать';
	$txt['pokemon']		= 'Покемон';
	$txt['min_silver']	= 'Минимальная цена';
	$txt['min_gold']	= 'Минимальная цена';
	$txt['level']		= '<b>Уровень</b> %s';
	$txt['gebruiker']	= 'Тренер';
	$txt['price']		= 'Ценить';
	$txt['currency']	= 'Монета';
	$txt['button']		= 'Выставить на продажу';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= 'Будьте осторожны, этот покемон вам не принадлежит!';
	$txt['alert_beginpokemon']				= 'Вы не можете выпустить своего стартового покемона!';
	$txt['alert_too_low_rank']				= 'Вы не можете выпускать покемонов!';
	$txt['alert_success_release']				= 'Покемоны успешно выпущены!';

	$txt['pagetitle']	= 'Вы уверены, что хотите удалить %s?';
	$txt['information']	= 'Информация';
	$txt['pokemon']		= 'Покемон';
	$txt['level']		= '<b>Уровень</b> %s';
	$txt['button']		= 'Выпускать';
	$txt['irreversivel']    = 'Помните, что это действие необратимо.';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= 'Будьте осторожны, этот покемон вам не принадлежит!';
	$txt['alert_pokeequiped']			= 'Вы не можете передать покемона из своей команды!';
	$txt['alert_success']				= 'Покемоны успешно перенесены!';
	$txt['alert_fail']				= 'Коробка'.($_POST['newbox'] ?? '').'Это полно!';

	$txt['pagetitle']	= 'Вы хотите передать ящик %s?';
	$txt['information']	= 'Информация';
	$txt['pokemon']		= 'Покемон';
	$txt['level']		= '<b>Уровень</b> %s';
	$txt['button']		= 'Передача';
	$txt['box1']		= 'Текущий ящик';
	$txt['box2']		= 'Новая коробка';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = 'Поздравляем, вы выиграли %s <b>%s</b>!';
$txt['bonus_already_claimed'] = 'Вы уже получили ежедневную награду сегодня!';
$txt['bonus_won_vip_days'] = 'Поздравляем, вы выиграли %s <b>%s</b> дн.!';
$txt['bonus_won_item'] = 'Поздравляем, вы выиграли %s <b>%s</b>!';
$txt['bonus_won_exp'] = 'Поздравляем, вы получили <b>%s</b> очков опыта!';

# poke-loot
$txt['loot_invalid_access'] = 'Недопустимый доступ!';
$txt['loot_won_silvers'] = 'Поздравляем, вы выиграли %s <b>%s</b> в <b>Poké-Loot</b>!';
$txt['loot_won_item'] = 'Поздравляем, вы выиграли <b>x%s</b> %s в <b>Poké-Loot</b>!';
$txt['loot_no_bag_space'] = 'В вашей сумке недостаточно места!';
$txt['loot_won_vip_day'] = 'Поздравляем, вы выиграли <b>1 день</b> %s в <b>Poké-Loot</b>!';

# sell-box
$txt['sellbox_cannot_trade'] = 'Этого покемона нельзя обменивать!';
$txt['sellbox_method_missing'] = 'Такого способа продажи не существует!';
$txt['sellbox_in_daycare'] = 'Этот покемон находится в питомнике.';
$txt['sellbox_trainer_invalid'] = 'Такого тренера не существует или это вы сами!';
$txt['sellbox_limit'] = 'Вы не можете выставить более %s покемонов на эту продажу!';
$txt['sellbox_confirm_title'] = 'ВЫ УВЕРЕНЫ, ЧТО ХОТИТЕ ПРОДАТЬ ЭТОГО <b>%s</b>?';
$txt['sellbox_select_method'] = 'ВЫБЕРИТЕ СПОСОБ ПРОДАЖИ';
$txt['sellbox_auction'] = 'Аукцион';
$txt['sellbox_auction_upper'] = 'АУКЦИОН';
$txt['sellbox_direct'] = 'Прямая продажа';
$txt['sellbox_direct_upper'] = 'ПРЯМАЯ ПРОДАЖА';
$txt['sellbox_private'] = 'Частная продажа';
$txt['sellbox_private_upper'] = 'ЧАСТНАЯ ПРОДАЖА';
$txt['sellbox_start_price'] = 'Начальная цена:';
$txt['sellbox_between'] = 'от';
$txt['sellbox_until'] = 'до';
$txt['sellbox_auction_info'] = 'Эта сумма может вырасти из-за ставок. <br>Этот покемон будет продан максимум через <b>48</b> часов; если ставок не будет, он вернётся к вам домой!';
$txt['sellbox_negotiable'] = 'Цена договорная:';
$txt['sellbox_negotiable_hint'] = '(Отметьте, чтобы получать предложения о торге)';
$txt['sellbox_direct_info'] = 'Если этот покемон не будет продан в течение <b>2</b> дней, он вернётся к вам домой!';
$txt['sellbox_trainer'] = 'Тренер:';
$txt['sellbox_trainer_hint'] = '(Имя тренера, которому вы хотите продать)';
$txt['sellbox_submit'] = 'ПРОДАТЬ ПОКЕМОНА!';

# league
$txt['league_won_opponent_not_ready'] = 'Вы победили!<br/>Ваш противник не был готов!';
$txt['league_lost_not_ready'] = 'Вы проиграли!<br/>Вы не были готовы к бою!';
$txt['league_creating_battle'] = 'Подождите, бой создаётся ...';
$txt['league_not_created_5min'] = 'Бой не был создан в течение 5 минут';
$txt['league_lost_not_created'] = 'Вы проиграли!<br/>Бой не был создан!';
$txt['league_won_not_created'] = 'Вы победили!<br/>Бой не был создан!';
$txt['league_not_time_yet'] = 'Время вашего боя ещё не наступило!';

# map
$txt['map_search_1'] = 'Здесь ничего нет!';
$txt['map_search_2'] = 'Я почти нашёл легендарного, но он исчез!';
$txt['map_search_3'] = 'Я не сдамся!';
$txt['map_search_4'] = 'Я уверен, где-то здесь был покемон...';
$txt['map_search_5'] = 'Нашёл! О нет, это просто камень!';
$txt['map_search_6'] = 'Ааа... я ничего не могу найти!';
$txt['map_search_7'] = 'Ну же, покажитесь!';
$txt['map_search_8'] = 'Здесь есть хоть какой-то покемон!?';
$txt['map_search_9'] = 'Что там позади?! Фух, это всего лишь моя тень!';
$txt['map_search_10'] = 'В небе покемон?! А, это просто облако.';
$txt['map_search_11'] = 'Кажется, эти покемоны меня боятся.';
$txt['map_search_12'] = 'Я нашёл следы! Эх, они мои...';
$txt['map_safari_closed'] = 'Сафари-зона закрыта!';

# use-items
$txt['use_choose_pokemon'] = 'Нужно выбрать покемона!';
$txt['use_choose_for_item'] = 'Выберите покемона, на котором хотите использовать %s.';
$txt['use_level'] = 'Уровень';
$txt['use_next'] = 'Далее';
$txt['use_cannot_learn'] = 'Ваш покемон не может выучить эту атаку!';
$txt['use_not_your_pokemon'] = 'Этот покемон не ваш!';
$txt['use_already_learned'] = '%1$s уже выучил атаку %2$s!';
$txt['use_learning'] = '%1$s изучает %2$s - %3$s.';
$txt['use_item_missing'] = 'У вас нет этого предмета!';
$txt['use_item_not_equippable'] = 'Этот предмет нельзя надеть на этого покемона!';
$txt['use_item_already_equipped'] = 'У покемона уже надет этот предмет!';
$txt['use_item_egg'] = 'Этот предмет нельзя надеть на яйцо покемона!';
$txt['use_choose_receive_item'] = 'Выберите, какой покемон получит предмет %s.';
$txt['use_old_item_destroyed'] = 'Если у покемона уже есть предмет, старый предмет будет уничтожен!';
$txt['use_not_equipped'] = 'Не надет';
$txt['use_no_items_to_equip'] = 'У вас нет предметов, которые можно надеть на покемонов!';
$txt['use_cannot_equip_egg'] = 'Нельзя надеть этот предмет на яйцо покемона!';
$txt['use_cannot_heal'] = 'Вы не можете вылечить %s.';
$txt['use_only_fainted'] = 'Работает только на покемонах, полностью потерявших сознание.';
$txt['use_not_that_amount'] = 'У вас нет такого количества!';
$txt['use_amount_too_high'] = 'Нельзя использовать такое количество';
$txt['use_choose_receive_candy'] = 'Выберите, какой покемон получит %s.';
$txt['use_spc_limit_25'] = ' Вы уже использовали %1$s 25 раз на %2$s.';
$txt['use_spc_max'] = ' Максимум можно использовать %1$sx %2$s.';
$txt['use_dont_have_amount'] = 'У вас нет %1$s %2$s!';
$txt['use_choose_with_amount'] = 'Выберите покемона, на котором использовать %1$s.<br> (У вас %2$s %1$s)';
$txt['use_choose_stone'] = 'Выберите покемона, на котором использовать %s.';
$txt['use_evolved'] = 'Поздравляем, ваш <strong>%1$s</strong> эволюционировал в <strong>%2$s</strong>!';
$txt['use_choose_for_stone_post'] = 'Выберите покемона для использования %s.';
$txt['use_stone_not_usable'] = 'На покемоне %1$s нельзя использовать %2$s.';
$txt['use_yes'] = 'Да';
$txt['use_no'] = 'Нет';
$txt['use_not_usable'] = 'Нельзя использовать';
$txt['use_usable'] = 'Можно использовать';
$txt['use_pokemon_label'] = 'Покемон';
$txt['use_quantity'] = 'Количество';
$txt['use_equipped_col'] = 'Надет';
$txt['use_equipped_with'] = 'Надет предмет: %s';
$txt['use_check'] = 'Выбор:';
$txt['use_name_col'] = 'Имя:';
$txt['use_evolves_col'] = 'Эволюция:';
$txt['use_confirm_evolve'] = 'Вы уверены, что хотите эволюционировать %s?';
$txt['use_stone_evolved'] = 'Поздравляем, ваш <strong>%1$s</strong> эволюционировал в <strong>%2$s</strong> с помощью %3$s!';
/* === end externalized strings === */

$txt['battle_multi_hit'] = '%s попадает %d раз.';
$txt['battle_parental_hit'] = '%s попадает %d раз благодаря Parental Bond.';
$txt['battle_recoil'] = '%s получает урон от отдачи.';
$txt['battle_copy_move'] = '%s копирует атаку %s!';
$txt['battle_copy_pokemon'] = '%s копирует %s.';
$txt['battle_rocket_exit'] = 'Команда R снова улетает!';
$txt['battle_opponent_must_attack'] = 'Соперник должен атаковать!';
$txt['league_battle_created'] = 'Бой создан!<br />Переход к бою …';
?>
