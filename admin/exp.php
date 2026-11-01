<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
header('Content-Type: text/html; charset=utf-8'); 
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
	include_once("language/language-admin.php");

//Admin controle
if ($gebruiker['admin'] < 2) {
 game_redirect_header('location: ./home');
 exit;
 }


if (isset($_POST['give'])) {
	
	if (empty($_POST['exp'])) {
		echo '<div class="red"> '.$txt['adm_exp_choose'].'</div>';
	}
	else if (($_POST['exp'] ?? '') != 1 AND ($_POST['exp'] ?? '') != 2 AND ($_POST['exp'] ?? '') != 3) {
		echo '<div class="red"> '.$txt['adm_exp_choose'].'</div>';
	}
	else{
		
  		  DB::exQuery("UPDATE `configs` SET `valor`='".($_POST['exp'] ?? '')."' WHERE `config`='exp'");
		  #Error tonen
		  echo '<div class="green"> '.$txt['adm_exp_changed'].'</div>';


	}
}


 $ver1 = DB::exQuery("SELECT * FROM configs WHERE config='exp'")->fetch_assoc();

if ($ver1['valor'] == 1) {
$t1 = "checked";
}if ($ver1['valor'] == 2) {
$t2 = "checked";
}
if ($ver1['valor'] == 3) {
$t3 = "checked";
}
?>

<center>
<form method="post">
<table width="500">
	<tr>
    	<td>Exp:</td>
        <td>
<input type="radio" name="exp" value="1" <?php echo $t1; ?>> 1x (Normal)
<input type="radio" name="exp" value="2" <?php echo $t2; ?>> 2x (Double)
<input type="radio" name="exp" value="3" <?php echo $t3; ?>> 3x (Triple)




      </td>
    </tr>

    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" name="give" value="<?=htmlspecialchars($txt['adm_change_btn'], ENT_QUOTES)?>" class="button" /></td>
    </tr>
</table>
</form>
</center>