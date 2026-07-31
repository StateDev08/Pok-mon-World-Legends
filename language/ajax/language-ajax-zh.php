<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= '小心，这只神奇宝贝不属于你！';
	$txt['alert_beginpokemon']				= '您无法出售您的入门神奇宝贝！';
	$txt['alert_too_low_rank']				= '宝可梦不能卖！';
	$txt['alert_geb_too_low_rank']			= '该训练家无法购买该宝可梦！';
	$txt['alert_no_amount']					= '您必须输入有效值！';
	$txt['alert_price_too_less']			= '该值不能小于%s！';
	$txt['alert_price_too_much']			= '该值不能大于%s！';
	$txt['alert_user_dont_exist']			= '找不到教练！';
	$txt['alert_pokemon_already_for_sale']	= '该神奇宝贝现已发售！';
	$txt['alert_success_sell']				= '宝可梦成功公布！';

	$txt['pagetitle']	= '您确定要将 %s 出售吗？';
	$txt['information']	= '信息';
	$txt['sell']		= '卖';
	$txt['pokemon']		= '神奇宝贝';
	$txt['min_silver']	= '最低价格';
	$txt['min_gold']	= '最低价格';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['gebruiker']	= '训练师';
	$txt['price']		= '价值';
	$txt['currency']	= '硬币';
	$txt['button']		= '出售';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= '小心，这只神奇宝贝不属于你！';
	$txt['alert_beginpokemon']				= '您无法释放您的入门神奇宝贝！';
	$txt['alert_too_low_rank']				= '你不能释放神奇宝贝！';
	$txt['alert_success_release']				= '神奇宝贝成功发布！';

	$txt['pagetitle']	= '您确定要删除 %s 吗？';
	$txt['information']	= '信息';
	$txt['pokemon']		= '神奇宝贝';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= '发布';
	$txt['irreversivel']    = '请记住，此操作是不可逆转的。';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= '小心，这只神奇宝贝不属于你！';
	$txt['alert_pokeequiped']			= '你不能从你的队伍中转移神奇宝贝！';
	$txt['alert_success']				= '宝可梦转移成功！';
	$txt['alert_fail']				= '盒子'.($_POST['newbox'] ?? '').'已经满了！';

	$txt['pagetitle']	= '您想要传送箱%s吗？';
	$txt['information']	= '信息';
	$txt['pokemon']		= '神奇宝贝';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= '转移';
	$txt['box1']		= '当前盒子';
	$txt['box2']		= '新盒';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = '恭喜，你获得了 %s <b>%s</b>！';
$txt['bonus_already_claimed'] = '你今天已经领取过每日奖励了！';
$txt['bonus_won_vip_days'] = '恭喜，你获得了 %s <b>%s</b> 天！';
$txt['bonus_won_item'] = '恭喜，你获得了 %s <b>%s</b>！';
$txt['bonus_won_exp'] = '恭喜，你获得了 <b>%s</b> 点经验值！';

# poke-loot
$txt['loot_invalid_access'] = '无效的访问！';
$txt['loot_won_silvers'] = '恭喜，你在 <b>Poké-Loot</b> 中获得了 %s <b>%s</b>！';
$txt['loot_won_item'] = '恭喜，你在 <b>Poké-Loot</b> 中获得了 <b>x%s</b> %s！';
$txt['loot_no_bag_space'] = '你的背包空间不足！';
$txt['loot_won_vip_day'] = '恭喜，你在 <b>Poké-Loot</b> 中获得了 <b>1 天</b> %s！';

# sell-box
$txt['sellbox_cannot_trade'] = '这只宝可梦无法交易！';
$txt['sellbox_method_missing'] = '该出售方式不存在！';
$txt['sellbox_in_daycare'] = '这只宝可梦正在寄养屋中。';
$txt['sellbox_trainer_invalid'] = '该训练师不存在或就是你自己！';
$txt['sellbox_limit'] = '你最多只能出售 %s 只宝可梦！';
$txt['sellbox_confirm_title'] = '确定要出售这只 <b>%s</b> 吗？';
$txt['sellbox_select_method'] = '选择出售方式';
$txt['sellbox_auction'] = '拍卖';
$txt['sellbox_auction_upper'] = '拍卖';
$txt['sellbox_direct'] = '直接出售';
$txt['sellbox_direct_upper'] = '直接出售';
$txt['sellbox_private'] = '私下出售';
$txt['sellbox_private_upper'] = '私下出售';
$txt['sellbox_start_price'] = '起始价格：';
$txt['sellbox_between'] = '介于';
$txt['sellbox_until'] = '到';
$txt['sellbox_auction_info'] = '该金额可能因出价而上涨。<br>这只宝可梦最多在 <b>48</b> 小时后售出；若无人出价，它将返回你的家中！';
$txt['sellbox_negotiable'] = '价格可议：';
$txt['sellbox_negotiable_hint'] = '（勾选以接收议价报价）';
$txt['sellbox_direct_info'] = '如果这只宝可梦在 <b>2</b> 天内没有售出，它将返回你的家中！';
$txt['sellbox_trainer'] = '训练师：';
$txt['sellbox_trainer_hint'] = '（你想出售给的训练师名称）';
$txt['sellbox_submit'] = '出售宝可梦！';
/* === end externalized strings === */
?>