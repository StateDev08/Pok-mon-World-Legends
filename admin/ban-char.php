<script language="JavaScript" src="javascripts/calendar_db.js"></script>
<link rel="stylesheet" href="stylesheets/calendar.css">

<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';

	//Script laden zodat je nooit pagina buiten de index om kan laden
	include("app/includes/resources/security.php");
	include_once("language/language-admin.php");
	
	if ($gebruiker['admin'] < 2) { game_redirect_header("Location: ./home"); exit; }
	
	#################################################################
	
	if (isset($_POST['ban'])) {
		if (empty($_POST['player']))
			echo '<div class="red"> '.$txt['adm_enter_trainer'].'</div>';
		else if (empty($_POST['reden']))
			echo '<div class="red"> '.$txt['adm_enter_reason'].'</div>';
		else{
		
		if (($_POST['tot'] ?? '') == "") {
		$_POST['tot'] = "0000-00-00";
		}
			
			DB::exQuery("UPDATE gebruikers SET banned='Y', bloqueado='sim', bloqueado_tempo='".($_POST['tot'] ?? '')."', razaobloqueado='".($_POST['reden'] ?? '')."' WHERE username = '".($_POST['player'] ?? '')."'");
			
			echo '<div class="green"> '.sprintf($txt['adm_trainer_blocked_ok'], ($_POST['player'] ?? ''), ($_POST['tot'] ?? '')).'</div>';
		}
	}
	if (isset($_POST['take'])) {
	
		DB::exQuery("UPDATE gebruikers SET banned='N', bloqueado='nao', bloqueado_tempo='0000-00-00', razaobloqueado='' WHERE username = '".($_POST['who'] ?? '')."'");
		echo '<div class="green"> '.$txt['adm_trainer_unblocked'].'</div>';
	}

?>
<form method="post" name="ban">
<center>
	<table width="400px" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_block_trainers']?></strong></center></td>
        </tr>
  
        <tr>
        	<td><?=$txt['adm_trainer_label']?></td>
            <td><input type="text" name="player" class="text_long" value="<?php if (($_POST['player'] ?? '') != '') echo ($_POST['player'] ?? ''); else echo ($_GET['player'] ?? ''); ?>" maxlength="10" /></td>
        </tr>
        <tr>
        	<td><?=$txt['adm_time_label']?></td>
            <td><input type="text" name="tot" class="text_long" value="<?php if (($_POST['tot'] ?? '') != '') echo ($_POST['tot'] ?? ''); else echo $txt['adm_date_placeholder'];?>" maxlength="10"/><br/><?=$txt['adm_permanent_hint']?>
		</td>
        </tr>
        <tr>
        	<td><?=$txt['adm_reason_label']?></td>
            <td><input type="text" name="reden" class="text_long" value="<?php if (($_POST['reden'] ?? '') != '') echo ($_POST['reden'] ?? ''); ?>" maxlength="30" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td><input type="submit" name="ban" class="button" value="<?=htmlspecialchars($txt['adm_block'], ENT_QUOTES)?>" /></td>
        </tr>
    </table>
</center>
</form>

<div style="padding-top:30px;"></div>

<center>
	<table width="650px" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="4" height="40"><center><strong><?=$txt['adm_blocked_trainers_list']?></strong></center></td>
        </tr>
        <tr>
        	<td width="120"><strong><?=$txt['adm_trainer_label']?></strong></td>
            <td width="110"><strong><?=$txt['adm_blocked_until']?></strong></td>
            <td width="200"><strong><?=$txt['adm_reason_label']?></strong></td>
            <td width="50"><strong><?=$txt['adm_remove']?></strong></td>
        </tr>
        <?php
        $query = DB::exQuery("SELECT * FROM gebruikers WHERE banned='Y' or bloqueado='sim' ORDER BY bloqueado_tempo DESC");
		  for($j=$page+1; $ban = $query->fetch_assoc(); $j++)
		  { 
		  if ($ban['bloqueado_tempo'] == "0000-00-00") {
		  $tempoo = $txt['adm_permanent'];
		  }else {
		  $tempoo = implode("/",array_reverse(explode("-",$ban['bloqueado_tempo'])));
		  }
			  echo '
			  		<tr>
						<td><a href="./profile&player='.$ban['username'].'">'.$ban['username'].'</a></td>
			
						<td>'.$tempoo.'</td>
						<td>'.$ban['razaobloqueado'].'</td>
						<td><form method="post"><input type="hidden" name="who" value="'.$ban['username'].'" /><input type="submit" name="take" class="button_mini" value="OK"></form></td>
					</tr>';
		  }
		?>
    </table>
</center>      	