<?php
if ($page == 'codes') {
	$txt['naam'] = '姓名';
	$txt['code'] = '代码';
	$txt['example'] = '例子';

	$txt['bold'] = '大胆的';
	$txt['underline'] = '强调';
	$txt['italic'] = '斜体';
	$txt['marquee'] = '帐篷';
	$txt['center'] = '集中';
	$txt['color'] = '颜色';
	$txt['player'] = '训练师';
	$txt['hr'] = '人力资源';
	$txt['image'] = '图像';
	$txt['video'] = '视频';
	$txt['poke_image'] = '神奇宝贝';
	$txt['shiny_image'] = '闪亮的';
	$txt['poke_back'] = '神奇宝贝回来了';
	$txt['shiny_back'] = '闪亮的背部';
	$txt['poke_icon'] = '神奇宝贝图标';
	$txt['shiny_icon'] = '闪亮的图标';

	$txt['example_text'] = '这是一个例子。';
	$txt['no_example'] = '没有可用的示例。';
}else if ($page == 'sell-box') {
	$txt['alert_too_low_rank'] = '等级太低了。';
	$txt['alert_not_your_pokemon'] = '这不是你的神奇宝贝。';
	$txt['alert_beginpokemon'] = '这是你的初级神奇宝贝，你不能卖他。';
	$txt['alert_no_amount'] = '无金额插入。';
	$txt['alert_price_too_less'] = '口袋妖怪太便宜了，最低为 <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_price_too_much'] = '口袋妖怪太贵了，最高为 <img src="images/icons/silver.png" title="Silver" />';
	$txt['alert_pokemon_already_for_sale'] = '该神奇宝贝已经出售。';
	$txt['alert_user_dont_exist'] = '用户不存在';
	$txt['alert_success_sell'] = '成功将你的神奇宝贝放入转移列表中。';
	$txt['alert_too_much_on_transfer_1'] = '你已经';
	$txt['alert_too_much_on_transfer_2'] = '神奇宝贝在传输列表中。<br>从传输列表中获取第一个。';

	//Screen
	$txt['pagetitle'] = '卖';
	$txt['sell_box_title_text_1'] = '您确定要放置';
	$txt['sell_box_title_text_2'] = '待售？';
	$txt['sell_box_title_text_3'] = '目前值';
	$txt['sell_box_title_text_4'] = '银。<br /><br />
		你要多少银子';
	$txt['sell_box_title_text_5'] = '出售？';
	$txt['keep_empty'] = '您可以将其保留为空。';
	$txt['sell_rules'] = '* 您可以以最高价值1.5倍的价格将您的神奇宝贝放入转移列表。<br />
		* 最低价格为价值价格。';
	$txt['button_sell_box'] = '卖';
}else if ($page == 'area-box') {
	//Screen
	$txt['pagetitle'] = '优质的';
	$txt['colorbox_text'] = '再次打开此窗口，此消息仍会出现。';
	$txt['prembox_title_text_1'] = '你想买一个';
	$txt['prembox_title_text_2'] = '对于帐户';
	$txt['prembox_title_text_3'] = '价格';
		
	$txt['call_text'] = '<div class="title_premium">通话</div>在这里您可以通过手机付款。<br />
		计算机会和你说话并告诉你数字。输入手机屏幕上的数字，完成后，您就拥有了包。';
	$txt['call_button'] = '立即致电';
	$txt['paypal_text'] = '<div class="title_premium">Paypal</div>您可以在此处使用 Paypal 付款。<br />
		Paypal是一种在线支付方式，您需要一个paypal账户。';
	$txt['paypal_button'] = '立即支付宝';
	$txt['ideal_text'] = '<div class="title_premium">理想</div>
		理想是一种付费方式。您可以使用您的银行账户付款。<br />
		您可以通过以下银行付款：<br />
		* 荷兰国际集团<br />
		* ABM Amro<br />
		* 荷兰合作银行<br />
		* 社交网络<br />
		* 富通<br />
		* 弗里斯兰银行';
	$txt['ideal_button'] = '裸付';
	$txt['wallie_text'] = '<div class="title_premium">沃利</div>
		这里可以用wallie卡支付。<br />
		你可以在一些商店购买 Wallie 卡，最有可能的是 Free Record Shop。';
	$txt['wallie_button'] = '现在的沃利';
}else if ($page == 'area-box-ideal') {
	//Screen
	$txt['title_text'] = '你想买一个'.$_SESSION['packnaam'].'打包 &euro;'.$info['kosten'].'通过银行付款。请参阅此处：<br /><br />
		1. 前往您的银行网站。<br />
		2. 前往“转账”。<br />
		3. 在描述处插入：<br />
			<div style="padding-left:25px; float:left;">* 站点：（<strong>Pokemon Browser MMO</strong>）。</div><br />
			<div style="padding-left:25px; float:left;">* 用户名: (<strong>'.$_SESSION['naam'].'</strong>)。</div><br />
			<div style="padding-left:25px;">* 包名称: (<strong>'.$_SESSION['packnaam'].'</strong>)。</div><br />
		4. 转账<strong>&euro;'.$info['kosten'].'</strong> 至 <strong>56.09.35.803</strong>。<br />
		5. 请管理员（<strong>SV2011</strong>）检查付款是否完成。<br />
		支付成功，管理员将赠送您的超值物品。<br /><br />
		* 重要！如果周末转账，周一就会转账。<br />
		* 转出全部金额。';
}############################## TRANSFERLIST BOX #####################################
	else if ($page == 'transferlist-box') {
		//Alerts
		$txt['alert_sold'] = '该神奇宝贝已被所有者出售或从神奇宝贝市场上移除。';
		$txt['alert_too_low_rank_1'] = '这是一个非常高的水平。<br>以你目前的等级';
		$txt['alert_too_low_rank_2'] = '这是您可以购买的最高级别。';
		$txt['alert_house_full'] = '你的房子已经满了。';
		$txt['alert_too_less_silver'] = '你的银币不够。';
		
		//Screen
		$txt['pagetitle'] = '传输列表';
		$txt['trbox_title_text_bought_1'] = '恭喜您，洽谈成功！';
		$txt['trbox_title_text_bought_2'] = '你获得了';
		$txt['trbox_title_text_bought_3'] = '成功地！';
		$txt['trbox_title_text_bought_4'] = '它现在在你家里！';
		
		$txt['trbox_title_text_1'] = '你想买吗';
		$txt['trbox_title_text_2'] = '的';
		$txt['trbox_title_text_3'] = '现在的价格为';
		$txt['trbox_title_text_4'] = '';
		$txt['trbox_title_text_5'] = '正在以以下价格出售';
		$txt['trbox_title_text_6'] = '你确定要吗';
		$txt['trbox_title_text_7'] = '？';
		$txt['button_transferlist_box'] = '买';
	}