<?php
require_once('./app/includes/resources/security.php');

/*if (isset($_POST['buy_vip3'])) {
	if ($rekening['gold'] < 5)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-5 WHERE `acc_id`={$rekening['acc_id']}");
		$new_vip = ($gebruiker['premiumaccount'] > time()) ? ($gebruiker['premiumaccount'] + (86400 * 3)) : (time() + (86400 * 3));
		DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`={$new_vip} WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 3 dias de vip.')");
		exit(header("LOCATION: ./gold-market"));
	}
}*/
if (isset($_POST['buy_vip7'])) {
	if ($rekening['gold'] < 32)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-32 WHERE `acc_id`={$rekening['acc_id']}");
		$new_vip = ($gebruiker['premiumaccount'] > time()) ? ($gebruiker['premiumaccount'] + (86400 * 7)) : (time() + (86400 * 7));
		DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`={$new_vip} WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 7 dias de vip.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
if (isset($_POST['buy_vip15'])) {
	if ($rekening['gold'] < 60)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-60 WHERE `acc_id`={$rekening['acc_id']}");
		$new_vip = ($gebruiker['premiumaccount'] > time()) ? ($gebruiker['premiumaccount'] + (86400 * 15)) : (time() + (86400 * 15));
		DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`={$new_vip} WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 15 dias de vip.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
if (isset($_POST['buy_vip30'])) {
	if ($rekening['gold'] < 100)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-100 WHERE `acc_id`={$rekening['acc_id']}");
		$new_vip = ($gebruiker['premiumaccount'] > time()) ? ($gebruiker['premiumaccount'] + (86400 * 30)) : (time() + (86400 * 30));
		DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`={$new_vip} WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 30 dias de vip.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
/*
if (isset($_POST['buy_silver100'])) {
	if ($rekening['gold'] < 5)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-5 WHERE `acc_id`={$rekening['acc_id']}");
		DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+100000 WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 100k de silvers.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
if (isset($_POST['buy_silver240'])) {
	if ($rekening['gold'] < 12)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-12 WHERE `acc_id`={$rekening['acc_id']}");
		DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+240000 WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 240k de silvers.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
if (isset($_POST['buy_silver500'])) {
	if ($rekening['gold'] < 25)	$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else {
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-25 WHERE `acc_id`={$rekening['acc_id']}");
		DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+500000 WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Comprou 500k de silvers.')");
		exit(header("LOCATION: ./gold-market"));
	}
}
*/
if (isset($_POST['change_name'])) {
	if ($rekening['gold'] < 20)		$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else if (empty($_POST['geb_name']))	$message = '<div class="red">'.$txt['gold_alert_name_empty'].'</div>';
	else if (strlen(trim(($_POST['geb_name'] ?? ''))) < 4)	$message = '<div class="red">'.$txt['gold_alert_name_short'].'</div>';
	else if (strlen(trim(($_POST['geb_name'] ?? ''))) > 12)	$message = '<div class="red">'.$txt['gold_alert_name_long'].'</div>';
	else if (!preg_match('/^([a-zA-Z0-9]+)$/is', ($_POST['geb_name'] ?? '')))	$alert = '<div class="red">'.$txt['gold_alert_name_invalid'].'</div>';
	else if (DB::exQuery("SELECT `user_id` FROM `gebruikers` WHERE `username`='{$_POST['geb_name']}'")->num_rows != 0)	$message = '<div class="red">'.$txt['gold_alert_name_taken'].'</div>';
	else {	   
		DB::exQuery("INSERT INTO `log_troca_nick` (`id_user`,`nick_antigo`,`nick_novo`) VALUES ('".($_SESSION['id'] ?? '')."','".$gebruiker['username']."','".($_POST['geb_name'] ?? '')."')"); 
		DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-20 WHERE `acc_id`={$rekening['acc_id']}");
		DB::exQuery("UPDATE `gebruikers` SET `username`='{$_POST['geb_name']}' WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Trocou de nome.')");	
		exit(header("LOCATION: ./logout"));
	}
}
if (isset($_POST['change_perso'])) {
	if ($gebruiker['troc_pers_free'] == 0 AND $rekening['gold'] < 20)		$message = '<div class="red">'.$txt['common_cannot_afford'].'</div>';
	else if (empty($_POST['perso']))	$message = '<div class="red">'.$txt['gold_alert_choose_char'].'</div>';
	else if (DB::exQuery("SELECT * FROM `characters` WHERE `naam`='{$_POST['perso']}'")->num_rows == 0)	$message = '<div class="red">'.$txt['gold_alert_char_missing'].'</div>';
	else {
		if ($gebruiker['troc_pers_free'] > 0) DB::exQuery("UPDATE `gebruikers` SET `troc_pers_free`=`troc_pers_free`-1 WHERE `user_id`={$_SESSION['id']}");
		else DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`-20 WHERE `acc_id`={$rekening['acc_id']}");
		
		DB::exQuery("UPDATE `gebruikers` SET `character`='{$_POST['perso']}', `character_num`=1 WHERE `user_id`={$_SESSION['id']}");
		DB::exQuery("INSERT INTO `logs_gold_market` (`date`,`user_id`,`text`) VALUES (NOW(),{$gebruiker['user_id']},'Trocou de personagem.')");	
		exit(header("LOCATION: ./gold-market"));
	}
}


echo addNPCBox(20, $txt['gold_npc_title'], $txt['gold_npc_text']);
if (!empty($message))	echo $message;
?>
<div class="blue"><a href="./donate"><?=$txt['gold_buy_golds_link']?></a></div>

<div class="box-content">
	<form action="./gold-market" method="post" onsubmit="return confirm('<?=$txt['common_confirm_purchase_2']?>');"><table class="general" width="100%">
		<thead>
			<tr><th></th></tr>
			<tr>
				<th colspan="2"><?=$txt['gold_col_item']?></th>
				<th width="100"><?=$txt['gold_col_value']?></th>
				<th width="70"><?=$txt['gold_col_action']?></th>
			</tr>
		</thead>
		<tbody>
			<?php /*<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=sprintf($txt['gold_vip_days'], 3)?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_vip_desc']?></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 5</td>
				<td align="center"><input type="submit" name="buy_vip3" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>*/ ?>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=sprintf($txt['gold_vip_days'], 7)?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_vip_desc']?></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 32</td>
				<td align="center"><input type="submit" name="buy_vip7" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=sprintf($txt['gold_vip_days'], 15)?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_vip_desc']?></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 60</td>
				<td align="center"><input type="submit" name="buy_vip15" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=sprintf($txt['gold_vip_days'], 30)?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_vip_desc']?></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 100</td>
				<td align="center"><input type="submit" name="buy_vip30" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>
			
			<?php /*
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; Comprar <img src="<?=$static_url;?>/images/icons/silver.png"/>100k</h3>
					<p style="margin: 3px; font-size: x-small;">Você também pode trocar seus golds por silvers.</p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 5</td>
				<td align="center"><input type="submit" name="buy_silver100" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; Comprar <img src="<?=$static_url;?>/images/icons/silver.png"/>240k</h3>
					<p style="margin: 3px; font-size: x-small;">Você também pode trocar seus golds por silvers.</p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 12</td>
				<td align="center"><input type="submit" name="buy_silver240" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; Comprar <img src="<?=$static_url;?>/images/icons/silver.png"/>500k</h3>
					<p style="margin: 3px; font-size: x-small;">Você também pode trocar seus golds por silvers.</p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 25</td>
				<td align="center"><input type="submit" name="buy_silver500" class="button" value="<?=$txt['common_buy_button']?>" /></td>
			</tr> */ ?>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=$txt['gold_name_change_title']?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_name_change_desc']?></p>
					<p><input type="text" name="geb_name" placeholder="<?=$gebruiker['username'];?>" maxlength="12" minlength="4"/></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> 20</td>
				<td align="center"><input type="submit" name="change_name" class="button" value="<?=$txt['common_change_button']?>" /></td>
			</tr>
			<tr>
				<td class="shadow" width="16" align="center"><img src="<?=$static_url;?>/images/icons/gold-vip1.png" /></td>
				<td>
					<h3 style="margin: 0;">&raquo; <?=$txt['gold_char_change_title']?></h3>
					<p style="margin: 3px; font-size: x-small;"><?=$txt['gold_char_change_desc']?></p>
					<p><select name="perso" id="perso">
			<?php 
			$allpokemonsql = DB::exQuery("SELECT * FROM characters where naam!='{$gebruiker['character']}' ORDER BY naam ASC");
			while($allpokemon = $allpokemonsql->fetch_assoc()) {
				echo '<option value="'.$allpokemon['naam'].'">' . $allpokemon['naam'] . '</option>';
			} 
			?>
		</select></p>
				</td>
				<td align="center"><img src="<?=$static_url;?>/images/icons/gold.png"/> <?php if ($gebruiker['troc_pers_free']>0) { echo "-"; }else{ echo 20; } ?></td>
				<td align="center"><input type="submit" name="change_perso" class="button" value="<?=$txt['common_change_button']?>" /></td>
			</tr>
		</tbody>
	</table></form>
</div>