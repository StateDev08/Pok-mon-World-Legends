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
/* === end externalized strings === */
?>