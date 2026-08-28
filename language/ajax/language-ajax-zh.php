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

# league
$txt['league_won_opponent_not_ready'] = '你赢了！<br/>你的对手没有准备好！';
$txt['league_lost_not_ready'] = '你输了！<br/>你没有为对战做好准备！';
$txt['league_creating_battle'] = '请稍候，正在创建对战……';
$txt['league_not_created_5min'] = '对战未在 5 分钟内创建';
$txt['league_lost_not_created'] = '你输了！<br/>对战未被创建！';
$txt['league_won_not_created'] = '你赢了！<br/>对战未被创建！';
$txt['league_not_time_yet'] = '还没到你的对战时间！';

# map
$txt['map_search_1'] = '这里什么都没有！';
$txt['map_search_2'] = '我差点找到了传说宝可梦，但它消失了！';
$txt['map_search_3'] = '我不会放弃！';
$txt['map_search_4'] = '我确定在这附近见过宝可梦……';
$txt['map_search_5'] = '找到了！不对，只是一块石头！';
$txt['map_search_6'] = '啊……我什么都找不到！';
$txt['map_search_7'] = '快出来吧！';
$txt['map_search_8'] = '这里有宝可梦吗！？';
$txt['map_search_9'] = '我背后是什么？！呼，只是我的影子！';
$txt['map_search_10'] = '天上有宝可梦？！哦，只是一朵云。';
$txt['map_search_11'] = '我觉得这些宝可梦怕我。';
$txt['map_search_12'] = '我发现了脚印！唉，是我自己的……';
$txt['map_safari_closed'] = '狩猎地带已关闭！';

# use-items
$txt['use_choose_pokemon'] = '你必须选择一只宝可梦！';
$txt['use_choose_for_item'] = '请选择要使用 %s 的宝可梦。';
$txt['use_level'] = '等级';
$txt['use_next'] = '继续';
$txt['use_cannot_learn'] = '你的宝可梦无法学会这个招式！';
$txt['use_not_your_pokemon'] = '这只宝可梦不是你的！';
$txt['use_already_learned'] = '%1$s 已经学会了招式 %2$s！';
$txt['use_learning'] = '%1$s 正在学习 %2$s - %3$s。';
$txt['use_item_missing'] = '你没有该道具！';
$txt['use_item_not_equippable'] = '该道具无法装备到这只宝可梦身上！';
$txt['use_item_already_equipped'] = '该宝可梦已经装备了这个道具！';
$txt['use_item_egg'] = '该道具无法装备到宝可梦蛋上！';
$txt['use_choose_receive_item'] = '请选择哪只宝可梦获得道具 %s。';
$txt['use_old_item_destroyed'] = '如果这只宝可梦已装备道具，旧道具将被销毁！';
$txt['use_not_equipped'] = '未装备';
$txt['use_no_items_to_equip'] = '你没有可以让宝可梦装备的道具！';
$txt['use_cannot_equip_egg'] = '你无法把该道具装备到宝可梦蛋上！';
$txt['use_cannot_heal'] = '你无法治疗 %s。';
$txt['use_only_fainted'] = '只能对完全失去战斗能力的宝可梦使用。';
$txt['use_not_that_amount'] = '你没有这么多数量！';
$txt['use_amount_too_high'] = '你无法使用这个数量';
$txt['use_choose_receive_candy'] = '请选择哪只宝可梦获得 %s。';
$txt['use_spc_limit_25'] = ' 你已经在 %2$s 身上使用过 25 次 %1$s。';
$txt['use_spc_max'] = ' 最多可使用 %1$s 次 %2$s。';
$txt['use_dont_have_amount'] = '你没有 %1$s 个 %2$s！';
$txt['use_choose_with_amount'] = '请选择要使用 %1$s 的宝可梦。<br>（你拥有 %2$s 个 %1$s）';
$txt['use_choose_stone'] = '请选择要使用 %s 的宝可梦。';
$txt['use_evolved'] = '恭喜，你的 <strong>%1$s</strong> 进化成了 <strong>%2$s</strong>！';
$txt['use_choose_for_stone_post'] = '请选择要使用 %s 的宝可梦。';
$txt['use_stone_not_usable'] = '无法对宝可梦 %1$s 使用 %2$s。';
$txt['use_yes'] = '是';
$txt['use_no'] = '否';
$txt['use_not_usable'] = '不可使用';
$txt['use_usable'] = '可使用';
$txt['use_pokemon_label'] = '宝可梦';
$txt['use_quantity'] = '数量';
$txt['use_equipped_col'] = '已装备';
$txt['use_equipped_with'] = '已装备 %s';
$txt['use_check'] = '选择：';
$txt['use_name_col'] = '名称：';
$txt['use_evolves_col'] = '进化：';
$txt['use_confirm_evolve'] = '确定要让 %s 进化吗？';
$txt['use_stone_evolved'] = '恭喜，你的<strong>%1$s</strong>使用%3$s进化成了<strong>%2$s</strong>！';
/* === end externalized strings === */
?>