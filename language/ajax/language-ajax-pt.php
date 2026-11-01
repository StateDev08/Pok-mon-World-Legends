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

# league
$txt['league_won_opponent_not_ready'] = 'Você ganhou!<br/>Seu oponente não estava pronto!';
$txt['league_lost_not_ready'] = 'Você perdeu!<br/>Você não estava pronto para a batalha!';
$txt['league_creating_battle'] = 'Aguarde enquanto a batalha é criada...';
$txt['league_not_created_5min'] = 'A batalha não foi criada em 5 minutos';
$txt['league_lost_not_created'] = 'Você perdeu!<br/>A batalha não foi criada!';
$txt['league_won_not_created'] = 'Você ganhou!<br/>A batalha não foi criada!';
$txt['league_not_time_yet'] = 'Ainda não é hora para sua batalha!';

# map
$txt['map_search_1'] = 'Não há nada aqui!';
$txt['map_search_2'] = 'Quase achei uma lenda, mas ele sumiu!';
$txt['map_search_3'] = 'Não irei desistir!';
$txt['map_search_4'] = 'Tenho certeza que encontrei um Pokémon por aqui...';
$txt['map_search_5'] = 'Achei! Ah não, é apenas uma pedra!';
$txt['map_search_6'] = 'Aaa... não consigo encontrar nada!';
$txt['map_search_7'] = 'Vamos lá, apareçam!';
$txt['map_search_8'] = 'Tem algum Pokémon aqui!?';
$txt['map_search_9'] = 'O que está atrás de mim?! Ufa, é apenas minha sombra!';
$txt['map_search_10'] = 'Tem um Pokémon no céu?! Ah, é só uma núvem.';
$txt['map_search_11'] = 'Acho que esses Pokémon tem medo de mim.';
$txt['map_search_12'] = 'Encontrei algumas pegadas! Poxa, são minhas...';
$txt['map_safari_closed'] = 'A Zona do Safari está fechada!';

# use-items
$txt['use_choose_pokemon'] = 'Você deve escolher um pokémon!';
$txt['use_choose_for_item'] = 'Escolha o pokémon para qual você vai usar %s.';
$txt['use_level'] = 'Nível';
$txt['use_next'] = 'Avançar';
$txt['use_cannot_learn'] = 'Seu pokémon não pode aprender este ataque!';
$txt['use_not_your_pokemon'] = 'Este pokémon não é seu!';
$txt['use_already_learned'] = '%1$s já aprendeu o ataque %2$s!';
$txt['use_learning'] = '%1$s está aprendendo %2$s - %3$s.';
$txt['use_item_missing'] = 'Você não possui este item!';
$txt['use_item_not_equippable'] = 'Este item não pode ser equipado neste Pokémon!';
$txt['use_item_already_equipped'] = 'O Pokémon já tem este item equipado!';
$txt['use_item_egg'] = 'Este item não pode ser equipado em Ovo Pokémon!';
$txt['use_choose_receive_item'] = 'Escolha qual pokémon irá receber o item %s.';
$txt['use_old_item_destroyed'] = 'Se este Pokémon já tiver um item equipado, o item antigo será destruído!';
$txt['use_not_equipped'] = 'Não equipado';
$txt['use_no_items_to_equip'] = 'Você não tem nenhum item para equipar em seus Pokémon!';
$txt['use_cannot_equip_egg'] = 'Você não pode equipar este item em um Ovo Pokémon!';
$txt['use_cannot_heal'] = 'Você não pode curar %s.';
$txt['use_only_fainted'] = 'Somente funciona em pokémons que estão totalmente sem vida.';
$txt['use_not_that_amount'] = 'Você não possui está quantidade!';
$txt['use_amount_too_high'] = 'Você não pode usar esta quantidade';
$txt['use_choose_receive_candy'] = 'Escolha qual pokémon irá receber a %s.';
$txt['use_spc_limit_25'] = ' Você já usou 25x %1$s em %2$s.';
$txt['use_spc_max'] = ' Máximo a ser usado de %1$sx %2$s.';
$txt['use_dont_have_amount'] = 'Você não possui %1$s %2$s!';
$txt['use_choose_with_amount'] = 'Escolha o pokémon que você vai usar %1$s.<br> (Você tem %2$s %1$s)';
$txt['use_choose_stone'] = 'Escolha o pokémon no qual você vai usar %s.';
$txt['use_evolved'] = 'Parabéns, seu <strong>%1$s</strong> evoluiu para <strong>%2$s</strong>!';
$txt['use_choose_for_stone_post'] = 'Escolha um pokémon para usar %s.';
$txt['use_stone_not_usable'] = 'O pokémon %1$s não pode ter %2$s usada nele.';
$txt['use_yes'] = 'Sim';
$txt['use_no'] = 'Não';
$txt['use_not_usable'] = 'Não usável';
$txt['use_usable'] = 'Usável';
$txt['use_pokemon_label'] = 'Pokémon';
$txt['use_quantity'] = 'Quantidade';
$txt['use_equipped_col'] = 'Equipado';
$txt['use_equipped_with'] = 'Equipado com %s';
$txt['use_check'] = 'Check:';
$txt['use_name_col'] = 'Nome:';
$txt['use_evolves_col'] = 'Evolui:';
$txt['use_confirm_evolve'] = 'Tem certeza que deseja evoluir %s?';
$txt['use_stone_evolved'] = 'Parabéns, seu <strong>%1$s</strong> evoluiu para <strong>%2$s</strong> com %3$s!';
/* === end externalized strings === */

$txt['battle_multi_hit'] = '%s atacou %d vezes.';
$txt['battle_parental_hit'] = '%s atacou %d vezes por causa de Parental Bond.';
$txt['battle_recoil'] = '%s sofre dano de recuo.';
$txt['battle_copy_move'] = '%s copiou o ataque %s!';
$txt['battle_copy_pokemon'] = '%s copiou %s.';
$txt['battle_rocket_exit'] = 'Equipe Rocket decolando de novo!';
$txt['battle_opponent_must_attack'] = 'O oponente deve atacar!';
$txt['league_battle_created'] = 'Batalha criada!<br />Redirecionando para a batalha …';
?>
