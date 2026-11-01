<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';

	//Script laden zodat je nooit pagina buiten de index om kan laden
	include("app/includes/resources/security.php");
	include_once("language/language-admin.php");
	
//Admin controle
if ($gebruiker['admin'] < 3) {
  game_redirect_header('location: ./home');
  exit;
}

	##Geef iemand een starter
	#################################################################
	
	if (isset($_POST['make'])) {
		
		if (empty($_POST['make-admin'])) {
			echo '<div class="red"> '.$txt['adm_admins_enter_trainer'].'</div>';
		}
		else if (DB::exQuery("SELECT user_id FROM gebruikers WHERE username='".($_POST['make-admin'] ?? '')."'")->num_rows == 0) {
			echo '<div class="red"> '.sprintf($txt['adm_admins_not_exist'], ($_POST['make-admin'] ?? '')).'</div>';
		}
		else if (DB::exQuery("SELECT user_id FROM gebruikers WHERE username='".($_POST['make-admin'] ?? '')."' and admin>='1'")->num_rows >= 1) {
			echo '<div class="blue"> '.sprintf($txt['adm_admins_already'], ($_POST['make-admin'] ?? '')).'</div>';
		}
			
		else{
			DB::exQuery("UPDATE gebruikers SET admin = '1' WHERE username = '".($_POST['make-admin'] ?? '')."'");
			
			echo '<div class="green"> '.sprintf($txt['adm_admins_added'], ($_POST['make-admin'] ?? '')).'</div>';
		}
	}
	
	if (isset($_POST['take'])) {
		
		DB::exQuery("UPDATE gebruikers SET admin = '0' WHERE username = '".($_POST['who'] ?? '')."'");
		
		echo '<div class="green">'.sprintf($txt['adm_admins_removed'], ($_POST['who'] ?? '')).'</div>';
	}

?>
<form method="post">
<center>
	<table width="240" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_admins_make_title']?></strong></center></td>
        </tr>
        <tr>
        	<td width="80"><strong><?=$txt['adm_trainer_label']?></strong></td>
            <td width="160"><input type="text" name="make-admin" class="text_long" value="<?php echo ($_GET['player'] ?? ''); ?>" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td><input type="submit" name="make" class="button" value="<?=htmlspecialchars($txt['adm_admins_make_btn'], ENT_QUOTES)?>"/></td>
        </tr>
    </table>
</center>
</form>
<div style="padding-top:30px;"></div>

<center>
	<table width="240" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_admins_level1']?></strong></center></td>
        </tr>
        <?php
        $query = DB::exQuery("SELECT username FROM gebruikers WHERE admin = '1'");
		  for($j=$page+1; $admin = $query->fetch_assoc(); $j++)
		  { 
			  echo '<form method="post"><input type="hidden" name="who" value="'.$admin['username'].'" />
			  		<tr>
						<td width="120"><div style="padding-left:20px;"><img src="'.$static_url.'/images/icons/user_admin.png" width="16" height="16" /> '.$admin['username'].'</div></td>
						<td width="120"><input type="submit" name="take" value="'.htmlspecialchars($txt['adm_remove_btn'], ENT_QUOTES).'" class="button_mini"></td>
					</tr></form>';
		  }
		?>
		<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_admins_level2']?></strong></center></td>
        </tr>
        <?php
        $query = DB::exQuery("SELECT username FROM gebruikers WHERE admin = '2'");
		  for($j=$page+1; $admin = $query->fetch_assoc(); $j++)
		  { 
			  echo '<form method="post"><input type="hidden" name="who" value="'.$admin['username'].'" />
			  		<tr>
						<td width="120"><div style="padding-left:20px;"><img src="'.$static_url.'/images/icons/user_admin.png" width="16" height="16" /> '.$admin['username'].'</div></td>
						<td width="120"><input type="submit" name="take" value="'.htmlspecialchars($txt['adm_remove_btn'], ENT_QUOTES).'" class="button_mini"></td>
					</tr></form>';
		  }
		?>
		<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_admins_level3']?></strong></center></td>
        </tr>
        <?php
        $query = DB::exQuery("SELECT username FROM gebruikers WHERE admin = '3'");
		  for($j=$page+1; $admin = $query->fetch_assoc(); $j++)
		  { 
			  echo '<form method="post"><input type="hidden" name="who" value="'.$admin['username'].'" />
			  		<tr>
						<td width="120"><div style="padding-left:20px;"><img src="'.$static_url.'/images/icons/user_admin.png" width="16" height="16" /> '.$admin['username'].'</div></td>
						<td width="120"><input type="submit" name="take" value="'.htmlspecialchars($txt['adm_remove_btn'], ENT_QUOTES).'" class="button_mini"></td>
					</tr></form>';
		  }
		?>
    </table>
</center>
</form>