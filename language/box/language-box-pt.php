<?php
if ($page == 'codes') {
	$txt['naam'] = 'Nome';
	$txt['code'] = 'Código';
	$txt['example'] = 'Exemplo';

	$txt['bold'] = 'Negrito';
	$txt['underline'] = 'Sublinhado';
	$txt['italic'] = 'Itálico';
	$txt['marquee'] = 'Marquee';
	$txt['center'] = 'Centralizar';
	$txt['color'] = 'Cor';
	$txt['player'] = 'Treinador';
	$txt['hr'] = 'HR';
	$txt['image'] = 'Imagem';
	$txt['video'] = 'Vídeo';
	$txt['poke_image'] = 'Pokémon';
	$txt['shiny_image'] = 'Shiny';
	$txt['poke_back'] = 'Pokémon costas';
	$txt['shiny_back'] = 'Shiny costas';
	$txt['poke_icon'] = 'Pokémon icone';
	$txt['shiny_icon'] = 'Shiny icone';

	$txt['example_text'] = 'Este é um exemplo.';
	$txt['no_example'] = 'Nenhum exemplo disponível.';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = 'Seu rank é muito baixo.';
	$txt['alert_not_your_pokemon'] = 'Este Pokémon não pertence a você.';
	$txt['alert_beginpokemon'] = 'Você não pode vender seu Pokémon inicial.';
	$txt['alert_no_amount'] = 'Informe um valor.';
	$txt['alert_price_too_less'] = 'O preço é muito baixo. O mínimo é <img src="' . $static_url . '/images/icons/silver.png" title="Prata" />';
	$txt['alert_price_too_much'] = 'O preço é muito alto. O máximo é <img src="' . $static_url . '/images/icons/silver.png" title="Prata" />';
	$txt['alert_pokemon_already_for_sale'] = 'Este Pokémon já está à venda.';
	$txt['alert_user_dont_exist'] = 'O usuário não existe.';
	$txt['alert_success_sell'] = 'Seu Pokémon foi colocado à venda com sucesso.';
	$txt['alert_too_much_on_transfer_1'] = 'Você já tem ';
	$txt['alert_too_much_on_transfer_2'] = ' Pokémon à venda.<br />Retire um deles da lista de transferências primeiro.';

	//Screen
	$txt['pagetitle'] = 'Vender';
	$txt['sell_box_title_text_1'] = 'Tem certeza de que deseja colocar ';
	$txt['sell_box_title_text_2'] = ' à venda?';
	$txt['sell_box_title_text_3'] = ' vale atualmente ';
	$txt['sell_box_title_text_4'] = ' moedas de prata.<br /><br />Por quantas moedas deseja vender ';
	$txt['sell_box_title_text_5'] = '?';
	$txt['keep_empty'] = 'Você pode deixar este campo vazio.';
	$txt['sell_rules'] = '* O preço máximo de venda é 1,5 vez o valor estimado do Pokémon.<br />* O preço mínimo é o valor estimado.';
	$txt['button_sell_box'] = 'Vender';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = 'Premium';
	$txt['colorbox_text'] = 'Ao abrir esta janela novamente, esta mensagem ainda estará aqui.';
	$txt['prembox_title_text_1'] = 'Você deseja comprar um pacote ';
	$txt['prembox_title_text_2'] = ' para a conta ';
	$txt['prembox_title_text_3'] = ' pelo preço de ';
		
	$txt['call_text'] = '<div class="title_premium">Telefone</div>Você pode pagar pelo telefone.<br />Siga as instruções da chamada e digite no telefone os números exibidos na tela. Ao concluir, você receberá seu pacote.';
	$txt['call_button'] = 'Ligar agora';
	$txt['paypal_text'] = '<div class="title_premium">PayPal</div>Você pode pagar com o PayPal.<br />É necessário ter uma conta no PayPal.';
	$txt['paypal_button'] = 'Pagar com PayPal';
	$txt['ideal_text'] = '<div class="title_premium">iDEAL</div>O iDEAL permite pagar pela sua conta bancária.<br />Bancos indicados nesta modalidade:<br />* ING<br />* ABM Amro<br />* Rabobank<br />* SNS<br />* Fortis<br />* Friesland Bank';
	$txt['ideal_button'] = 'Pagar agora';
	$txt['wallie_text'] = '<div class="title_premium">Wallie</div>Você pode pagar com um cartão Wallie.<br />Esses cartões são vendidos em algumas lojas, como a Free Record Shop.';
	$txt['wallie_button'] = 'Pagar com Wallie';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = 'Você deseja comprar um pacote ' . ($_SESSION['packnaam'] ?? '') . ' por &euro;' . $info['kosten'] . ' por transferência bancária. Siga estas instruções:<br /><br />1. Acesse o site do seu banco.<br />2. Selecione a opção de transferência.<br />3. Na descrição, informe:<br /><div style="padding-left:25px">* Site: <strong>Pokemon Browser MMO</strong><br />* Usuário: <strong>' . ($_SESSION['naam'] ?? '') . '</strong><br />* Pacote: <strong>' . ($_SESSION['packnaam'] ?? '') . '</strong></div><br />4. Transfira <strong>&euro; ' . $info['kosten'] . '</strong> para <strong>56.09.35.803</strong>.<br />5. Peça ao administrador <strong>SV2011</strong> que confirme o pagamento.<br />Após a confirmação, o administrador entregará seus benefícios premium.<br /><br />* Transferências feitas no fim de semana serão processadas na segunda-feira.<br />* Transfira o valor integral.';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = 'O pokémon já foi vendido ou removido do mercado de pokémons pelo propietario.';
		$txt['alert_too_low_rank_1'] = 'é level muito alto.<br>Com seu rank atual';
		$txt['alert_too_low_rank_2'] = 'é level máximo que você pode comprar.';
		$txt['alert_house_full'] = 'Sua casa está cheia.';
		$txt['alert_too_less_silver'] = 'Você não tem silver coins suficientes.';
		
		//Screen
		$txt['pagetitle'] = 'Lista de transferências';
		$txt['trbox_title_text_bought_1'] = 'Parabéns, negociação realizada com sucesso!';
		$txt['trbox_title_text_bought_2'] = 'Você adquiriu';
		$txt['trbox_title_text_bought_3'] = 'com sucesso!';
		$txt['trbox_title_text_bought_4'] = 'Está agora na sua casa!';
		
		$txt['trbox_title_text_1'] = 'Deseja comprar';
		$txt['trbox_title_text_2'] = 'de';
		$txt['trbox_title_text_3'] = 'tem agora um preço de';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = 'está sendo vendido pelo preço de';
		$txt['trbox_title_text_6'] = 'Tem certeza que quer';
		$txt['trbox_title_text_7'] = '?';
		$txt['button_transferlist_box'] = 'Comprar';
	}