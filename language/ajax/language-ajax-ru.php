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
	$txt['alert_fail']				= 'Коробка'.$_POST['newbox'].'Это полно!';

	$txt['pagetitle']	= 'Вы хотите передать ящик %s?';
	$txt['information']	= 'Информация';
	$txt['pokemon']		= 'Покемон';
	$txt['level']		= '<b>Уровень</b> %s';
	$txt['button']		= 'Передача';
	$txt['box1']		= 'Текущий ящик';
	$txt['box2']		= 'Новая коробка';
}
?>