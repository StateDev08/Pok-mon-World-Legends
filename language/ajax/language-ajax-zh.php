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
	$txt['alert_fail']				= '盒子'.$_POST['newbox'].'已经满了！';

	$txt['pagetitle']	= '您想要传送箱%s吗？';
	$txt['information']	= '信息';
	$txt['pokemon']		= '神奇宝贝';
	$txt['level']		= '<b>Lv.</b> %s';
	$txt['button']		= '转移';
	$txt['box1']		= '当前盒子';
	$txt['box2']		= '新盒';
}
?>