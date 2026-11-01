<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
header('Content-Type: text/html; charset=utf-8'); 
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
	include_once("language/language-admin.php");
	require_once("language/language-user.php");

//Admin controle
if ($gebruiker['admin'] < 3) {
 game_redirect_header('location: ./home');
 exit;
 }

#####################################################################
	

$userfield = ($_GET['player'] ?? '');
if (isset($_POST['give'])) {
	
	if (empty($_POST['username'])) {
		echo '<div class="red"> '.$txt['adm_enter_trainer'].'</div>';
	}
	else if (DB::exQuery("SELECT user_id FROM gebruikers WHERE username = '".($_POST['username'] ?? '')."'")->num_rows == 0) {
		echo '<div class="red"> '.$txt['adm_trainer_not_exist'].'</div>';
	}
	else{
		$userfield = ($_POST['username'] ?? '');
		$moeda = ($_POST['moeda'] ?? '');
		
	  
	 
	 $pegauserid = DB::exQuery("SELECT `user_id` FROM `gebruikers` WHERE `username`='".($_POST['username'] ?? '')."'")->fetch_assoc();
  
  
  		$event = '<img src="'.$static_url.'/images/icons/blue.png" width="16" height="16" class="imglower" /> '.sprintf(user_txt($pegauserid['user_id'], 'admin')['adm_promo_event'], $moeda);
		
		DB::exQuery("INSERT INTO `log_moeda_promos`(`user_id`, `user`, `qnt`) VALUES ('".$pegauserid['user_id']."', '".($_POST['username'] ?? '')."', '".$moeda."') ");
		
		DB::exQuery("INSERT INTO gebeurtenis (id, datum, ontvanger_id, bericht, gelezen) VALUES (NULL, NOW(), '".$pegauserid['user_id']."', '".$event."', '0')");


	DB::exQuery("UPDATE `gebruikers` SET `moedapromocional`=`moedapromocional`+'".$moeda."' WHERE user_id='".$pegauserid['user_id']."'");

  
	  
	  
	  
		  echo '<div class="green"> '.sprintf($txt['adm_promo_done'], $moeda, ($_POST['username'] ?? '')).'</div>';
		  
		


	}
}
?>

<center>
<form method="post">
<table width="300">
	<tr>
    	<td><?=$txt['adm_trainer_label']?></td>
        <td><input type="text" name="username" class="text_long" value="<?php echo $userfield; ?>" /></td>
    </tr>
    <tr>
    	<td><?=$txt['adm_promo_label']?></td>
        <td><input type="text" name="moeda" class="text_long" value="<?php echo $moeda; ?>" /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" name="give" value="<?=htmlspecialchars($txt['adm_promo_btn'], ENT_QUOTES)?>" class="button" /></td>
    </tr>
</table>
</form>
</center>