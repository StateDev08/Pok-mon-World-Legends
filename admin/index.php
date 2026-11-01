<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
include_once("language/language-admin.php");

//Admin controle
if ($gebruiker['admin'] < 1)
{
  game_redirect_header('location: ./home');
  exit;
}
$contarecordo4 = DB::exQuery("SELECT `valor` FROM `configs` WHERE `config`='recorde_online'")->fetch_assoc();
echo "<font size='3'><center>" . sprintf($txt['adm_menu_record'], $contarecordo4['valor']) . "</center></font><br>";
$contarecordo5 = DB::exQuery("SELECT `acc_id` FROM `rekeningen` WHERE `account_code`='1' AND `aanmeld_datum` LIKE '%".date("Y-m-d")."%'")->num_rows;
echo "<font size='3'><center>" . sprintf($txt['adm_menu_new_accounts'], $contarecordo5) . "</center></font><br>";
?>
		<center>
                 <table width="500" border="0">
                   <tr>
                     <td width="50"><center><img src="<?=$static_url?>/images/icons/user_admin.png" /></center></td>
                     <td width="130"><a href="./admin/admins"><?=$txt['adm_menu_admins']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                                      <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/user_ban.png" /></center></td>
                     <td><a href="./admin/pass"><?=$txt['adm_menu_pass']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/user_ban.png" /></center></td>
                     <td><a href="./admin/ban-conta"><?=$txt['adm_menu_ban_conta']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/user_ban.png" /></center></td>
                     <td><a href="./admin/ban-char"><?=$txt['adm_menu_ban_char']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/user_view.png" /></center></td>
                     <td><a href="./admin/search-on-ip"><?=$txt['adm_menu_search_ip']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/user_ban.png" /></center></td>
                     <td><a href="./admin/ban-ip"><?=$txt['adm_menu_ban_ip']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/groep_magnify.png" /></center></td>
                     <td><a href="./admin/more-accounts"><?=$txt['adm_menu_more_accounts']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/key_delete.png" /></center></td>
                     <td><a href="./admin/wrong-login"><?=$txt['adm_menu_wrong_login']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
     		          <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/bank.png" /></center></td>
                     <td><a href="./admin/bank"><?=$txt['adm_menu_bank']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                      <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                     <td><a href="./admin/release"><?=$txt['adm_menu_release']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>    
                     <td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                     <td><a href="./admin/battles"><?=$txt['adm_menu_battles']?> (<?=sprintf($txt['adm_level'], 1)?>) <?=$txt['adm_menu_disabled']?></a></td>
                   </tr>    
                    <td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                     <td><a href="./admin/transfer"><?=$txt['adm_menu_transfer']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>                                      
                   <tr>
                     <td colspan="2"><div style="padding-top:20px;"></div></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/gebeurtenis.png" alt="" /></center></td>
                     <td><a href="./admin/change-headline"><?=$txt['adm_menu_headline']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/gebeurtenis.png" alt="" /></center></td>
                     <td><a href="./admin/change-homepage"><?=$txt['adm_menu_homepage']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/comments.png" /></center></td>
                     <td><a href="./admin/messages"><?=$txt['adm_menu_messages']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/email.png" /></center></td>
                     <td><a href="./admin/mass-mail"><?=$txt['adm_menu_mass_mail']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/email.png" /></center></td>
                     <td><a href="./admin/official-message"><?=$txt['adm_menu_official_message']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                   <tr>
                     <td colspan="2"><div style="padding-top:20px;"></div></td>
                   </tr>
                   <!--<tr>
                     <td><center><img src="<?=$static_url?>/images/icons/doneer.png" /></center></td>
                     <td><a href="./admin/pay-list">Doações realizadas (Level 1)</a></td>
                   </tr>-->
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                     <td><a href="./admin/addpoke"><?=$txt['adm_menu_addpoke']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                   <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/egg2.gif" /></center></td>
                     <td><a href="./admin/give-egg"><?=$txt['adm_menu_give_egg']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                    <tr>
                     <td><center><img src="<?=$static_url?>/images/icons/gold.png" /></center></td>
                     <td><a href="./admin/promo"><?=$txt['adm_menu_promo']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                   
                   <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                    <td><a href="./admin/give-pokemon"><?=$txt['adm_menu_give_pokemon']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>        
                    <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/pokeball.gif" /></center></td>
                    <td><a href="./admin/transfer-pokemon"><?=$txt['adm_menu_transfer_pokemon']?> (<?=sprintf($txt['adm_level'], 1)?>)</a></td>
                   </tr>
				          <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/silver-gold.png" /></center></td>
                    <td><a href="./admin/massa-donatie"><?=$txt['adm_menu_massa_donatie']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>
                   <tr>
                      <td><center><img src="<?=$static_url?>/images/icons/gold.png" /></center></td>
                      <td><a href="./admin/massa-gold"><?=$txt['adm_menu_massa_gold']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                      </tr>
                      <tr>
                      <td><center><img src="<?=$static_url?>/images/icons/boy.gif" /></center></td>
                      <td><a href="./admin/massa-premium"><?=$txt['adm_menu_massa_premium']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                      </tr>  
                      <tr>
                      <td><center><img src="<?=$static_url?>/images/icons/boy.gif" /></center></td>
                      <td><a href="./admin/premium"><?=$txt['adm_menu_premium']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>      
    
                   <tr>
                     <td colspan="2"><div style="padding-top:20px;"></div></td>
                   </tr>
                                <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/lottery"><?=$txt['adm_menu_lottery']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/tournament"><?=$txt['adm_menu_tournament']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/league"><?=$txt['adm_menu_league']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>
                   <!--<tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/reset-accounts"><?=$txt['adm_menu_reset_accounts']?> (<?=sprintf($txt['adm_level'], 3)?>)</a></td>
                   </tr>-->
             		 <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/exp"><?=$txt['adm_menu_exp']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>    
                    <tr>
                   	<td><center><img src="<?=$static_url?>/images/icons/on-transferlist.gif" /></center></td>
                    <td><a href="./admin/silver"><?=$txt['adm_menu_silver']?> (<?=sprintf($txt['adm_level'], 2)?>)</a></td>
                   </tr>                   
                 </table>
		</center>