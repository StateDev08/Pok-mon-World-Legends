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
		if (empty($_POST['ip']))
			echo '<div class="red"> '.$txt['adm_ip_enter'].'</div>';
		else if (empty($_POST['tot']))
			echo '<div class="red"> '.$txt['adm_time_enter'].'</div>';
		else if (empty($_POST['reden']))
			echo '<div class="red"> '.$txt['adm_enter_reason'].'</div>';
		else{
			DB::ExQuery("INSERT INTO ban (ip, user_id, tot, reden)
						VALUES ('".($_POST['ip'] ?? '')."', '".($_POST['player'] ?? '')."', '".($_POST['tot'] ?? '')."', '".($_POST['reden'] ?? '')."')");
			
			echo '<div class="green"> '.sprintf($txt['adm_ip_banned_ok'], ($_POST['ip'] ?? ''), ($_POST['tot'] ?? '')).'</div>';
		}
	}
	if (isset($_POST['take'])) {
		DB::ExQuery("DELETE FROM ban WHERE ip = '".($_POST['who'] ?? '')."'");
		echo '<div class="green"> '.$txt['adm_ip_unbanned'].'</div>';
	}

?>
<form method="post" name="ban">
<center>
	<table width="300" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="2" height="40"><center><strong><?=$txt['adm_ban_ip_title']?></strong></center></td>
        </tr>
        <tr>
        	<td>IP:</td>
            <td><input type="text" name="ip" class="text_long" value="<?php if (($_POST['ip'] ?? '') != '') echo ($_POST['ip'] ?? ''); else echo ($_GET['ip'] ?? ''); ?>" maxlength="15" /></td>
        </tr>


        <tr>
        	<td><?=$txt['adm_time_label']?></td>
            <td><input type="text" name="tot" class="text_long" value="<?php if (($_POST['tot'] ?? '') != '') echo ($_POST['tot'] ?? ''); ?>" maxlength="10"/>
			<script language="JavaScript">
				new tcal ({
					// form name
					'formname': 'ban',
					// input name
					'controlname': 'tot'
				});
			</script></td>
        </tr>
        <tr>
        	<td><?=$txt['adm_reason_label']?></td>
            <td><input type="text" name="reden" class="text_long" value="<?php if (($_POST['reden'] ?? '') != '') echo ($_POST['reden'] ?? ''); ?>" maxlength="30" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td><input type="submit" name="ban" class="button" value="<?=htmlspecialchars($txt['adm_ban_ip_title'], ENT_QUOTES)?>" /><br><?=$txt['adm_ban_ip_hint']?></td>
        </tr>
    </table>
</center>
</form>

<div style="padding-top:30px;"></div>

<center>
	<table width="600" style="border: 1px solid #000;">
    	<tr>
        	<td colspan="4" height="40"><center><strong><?=$txt['adm_ban_ip_list']?></strong></center></td>
        </tr>
        <tr>
            <td width="120"><strong>IP:</strong></td>
            <td width="110"><strong><?=$txt['adm_blocked_until']?></strong></td>
            <td width="200"><strong><?=$txt['adm_reason_label']?></strong></td>
            <td width="50"><strong><?=$txt['adm_remove']?></strong></td>
        </tr>
        <?php
        $query = DB::ExQuery("SELECT * FROM ban ORDER BY tot DESC");
		  for($j=$page+1; $ban = $query->fetch_assoc(); $j++)
		  { 
			  echo '
			  		<tr>
						<td>'.$ban['ip'].'</td>
						<td>'.$ban['tot'].'</td>
						<td>'.$ban['reden'].'</td>
						<td><form method="post"><input type="hidden" name="who" value="'.$ban['ip'].'" /><input type="submit" name="take" class="button_mini" value="OK"></form></td>
					</tr>';
		  }
		?>
    </table>
</center>      	