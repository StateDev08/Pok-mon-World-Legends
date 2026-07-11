<?php
if ($page == 'register') {
	$txt['mail_title'] = '注册完成！激活您的帐户！';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">你好' . $inlognaam . '！您的注册已完成。</h3>
    	<p style="边距: 0 0 5px 0;">
    		您距离开始<b><u>Pokémon World Legends</u></b>之旅仅一步之遥，现在您只需<a href="https://www.pokemonworldlegends.com/activate" target="_blank" rel="noopener noreferrer">激活您的帐户</a>。<br /><br />
    		<b>您的用户名：</b> <u style="color:#eeeeee;">' . $inlognaam . '</u><br/>
    		<b>激活码：</b> <u style="color:#eeeeee;">' . $activatiecode . '</u><br/>
    		<center><u>请保留此电子邮件，因为这些信息将来可能有用！</u><br />
    		<b>此致，神奇宝贝世界传奇团队！<br /></b></center>
    	</p>';
} else if ($page == 'contact') {
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0;">联系信息：</h3>
	<p style="边距: 0 0 5px 0;">' . $bericht . '</p>';
} else if ($page == 'forgot') {
	$txt['mail_title'] = '忘记密码了吗？';
	$txt['mail_body'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">你好<b>' . $gegeven['username'] . '</b>！</h3>
	<p style="边距: 0 0 5px 0;">
		您请求了新密码，现在是：<u style="color:#eeeeee;">' . $nieuwww . '</u><br /><br />
		<center><u>请记住在您的帐户设置中更改它！</u><br />
    	<b>此致，神奇宝贝世界传奇团队！<br /></b></center>
	</p>';
} else if ($page == 'activate') {
	$txt['mail_title_activate'] = '欢迎来到世界传奇';
	$txt['mail_body_activate'] = '<h3 style="margin: 5px 0 5px 0;">你好' . $rekening['username'] . '！</h3>
	<p style="边距: 0 0 5px 0;">
		您刚刚完成注册！现在您可以与朋友一起玩耍、捕捉 900 多种神奇宝贝、与训练家战斗等等！<br /><br />
		<b>欢迎奖金：</b>' . $activate_bonus . '<br/><br/>
		<b>此致，</b><br />
		<u>世界传奇队！</u>
	</p>';

	$txt['mail_title_resend'] = '激活码';
	$txt['mail_body_resend'] = '<h3 style="margin: 5px 0 5px 0; font-size:21px;">你好' . $rekening['username'] . '！</h3>
	<p style="边距: 0 0 5px 0;">
		根据要求，我们将重新向您发送帐户的激活码。<br /><br />
		<b>激活码：</b> <u style="color:#eeeeee;">' . $rekening['account_code'] . '</u><br /><br />
		<center><b>此致，神奇宝贝世界传奇团队！</b></center>
	</p>';
} else if ($page == 'donate') {
	$txt['mail_title'] = '神奇宝贝区高级商店';
	$txt['mail_body'] = '贝斯特'.$voornaam.' '.$achternaam.',<br /><br />
		Je hebteen <b>'.$packnaam.'</b> gekocht ter waarde van &euro;'.$packkosten.'<br/>
		请注意邮件已发送，dit geldt als een betalingsbewijs。<br /><br />
		Veel plezier hiermee！<br /><br />
		遇见了 vriendelijke groet，<br />
		口袋妖怪浏览器 MMO 团队';
}