<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= 'Cuidado, este pokémon não pertence à você!';
	$txt['alert_beginpokemon']				= 'Você não pode vender seu pokémon inicial!';
	$txt['alert_too_low_rank']				= 'Você não pode vender pokémons!';
	$txt['alert_geb_too_low_rank']			= 'Este treinador não pode efetuar a compra deste pokémon!';
	$txt['alert_no_amount']					= 'Você deve inserir um valor válido!';
	$txt['alert_price_too_less']			= 'O valor não pode ser menor que %s!';
	$txt['alert_price_too_much']			= 'O valor não pode ser maior que %s!';
	$txt['alert_user_dont_exist']			= 'Treinador não encontrado!';
	$txt['alert_pokemon_already_for_sale']	= 'Este pokémon já está à venda!';
	$txt['alert_success_sell']				= 'Pokémon anunciado com sucesso!';

	$txt['pagetitle']	= 'Você tem certeza que deseja colocar %s à venda?';
	$txt['information']	= 'Informações';
	$txt['sell']		= 'Vender';
	$txt['pokemon']		= 'Pokémon';
	$txt['min_silver']	= 'Preço minímo';
	$txt['min_gold']	= 'Preço minímo';
	$txt['level']		= '<b>Nv.</b> %s';
	$txt['gebruiker']	= 'Treinador';
	$txt['price']		= 'Valor';
	$txt['currency']	= 'Moeda';
	$txt['button']		= 'Colocar à venda';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= 'Cuidado, este pokémon não pertence à você!';
	$txt['alert_beginpokemon']				= 'Você não pode soltar seu pokémon inicial!';
	$txt['alert_too_low_rank']				= 'Você não pode soltar pokémons!';
	$txt['alert_success_release']				= 'Pokémon solto com sucesso!';

	$txt['pagetitle']	= 'Você tem certeza que deseja soltar %s?';
	$txt['information']	= 'Informações';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Nv.</b> %s';
	$txt['button']		= 'Soltar';
	$txt['irreversivel']    = 'Lembre-se que esta ação é irreversível.';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= 'Cuidado, este pokémon não pertence à você!';
	$txt['alert_pokeequiped']			= 'Você não pode transferir um pokémon do seu time!';
	$txt['alert_success']				= 'Pokémon transferido com sucesso!';
	$txt['alert_fail']				= 'A box '.($_POST['newbox'] ?? '').' está cheia!';

	$txt['pagetitle']	= 'Você deseja transferir %s de box?';
	$txt['information']	= 'Informações';
	$txt['pokemon']		= 'Pokémon';
	$txt['level']		= '<b>Nv.</b> %s';
	$txt['button']		= 'Transferir';
	$txt['box1']		= 'Box Atual';
	$txt['box2']		= 'Nova Box';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = 'Parabéns, você ganhou %s <b>%s</b>!';
$txt['bonus_already_claimed'] = 'Você já recebeu seu premio diario hoje!';
$txt['bonus_won_vip_days'] = 'Parabéns, você ganhou %s <b>%s</b> dia!';
$txt['bonus_won_item'] = 'Parabéns, você ganhou %s <b>%s</b>!';
$txt['bonus_won_exp'] = 'Parabéns, você ganhou <b>%s</b> pontos de experiência!';

# poke-loot
$txt['loot_invalid_access'] = 'Acesso inválido!';
$txt['loot_won_silvers'] = 'Parabéns, você ganhou %s <b>%s</b> no <b>Poké-Loot</b>!';
$txt['loot_won_item'] = 'Parabéns, você ganhou <b>x%s</b> %s no <b>Poké-Loot</b>!';
$txt['loot_no_bag_space'] = 'Você não tem espaço suficiente em sua mochila!';
$txt['loot_won_vip_day'] = 'Parabéns, você ganhou <b>1 dia</b> de %s no <b>Poké-Loot</b>!';

# sell-box
$txt['sellbox_cannot_trade'] = 'Este pokémon não pode ser negociado!';
$txt['sellbox_method_missing'] = 'Este método de venda não existe!';
$txt['sellbox_in_daycare'] = 'Este pokémon está no jardim de infância.';
$txt['sellbox_trainer_invalid'] = 'Este treinador não existe ou ele é você!';
$txt['sellbox_limit'] = 'Você não pode colocar mais de %s Pokémons nessa venda!';
$txt['sellbox_confirm_title'] = 'TEM CERTEZA QUE DESEJA VENDER ESTE <b>%s</b>?';
$txt['sellbox_select_method'] = 'SELECIONE O MÉTODO DE VENDA';
$txt['sellbox_auction'] = 'Leilão';
$txt['sellbox_auction_upper'] = 'LEILÃO';
$txt['sellbox_direct'] = 'Venda Direta';
$txt['sellbox_direct_upper'] = 'VENDA DIRETA';
$txt['sellbox_private'] = 'Venda Privada';
$txt['sellbox_private_upper'] = 'VENDA PRIVADA';
$txt['sellbox_start_price'] = 'Preço inicial:';
$txt['sellbox_between'] = 'entre';
$txt['sellbox_until'] = 'até';
$txt['sellbox_auction_info'] = 'Esse valor poderá aumentar devido aos lançes. <br>Este Pokémon será vendido depois de até <b>48</b> horas e caso não haja algum lance, ele retornará para sua casa!';
$txt['sellbox_negotiable'] = 'Preço Negociável:';
$txt['sellbox_negotiable_hint'] = '(Marque para receber ofertas de negociação de preço)';
$txt['sellbox_direct_info'] = 'Se este Pokémon não for vendido em até <b>2</b> dias, ele retornará para sua casa!';
$txt['sellbox_trainer'] = 'Treinador:';
$txt['sellbox_trainer_hint'] = '(O nome do treinador que você quer vender)';
$txt['sellbox_submit'] = 'VENDER POKÉMON!';
/* === end externalized strings === */
?>