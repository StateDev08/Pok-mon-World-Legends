<?php
#alleen toegankelijk als je bent ingelogd
require_once('app/includes/resources/security.php');

require_once 'app/classes/Sharing_account.php';
require_once 'app/classes/Friends.php';

$share = new Sharing_account();
$friends = new Friends();

$shared = $share->getShared();
$count = sizeof($shared);

$persoonlijkerror 	= '&nbsp;';     
$teamzien     		= ($_POST['teamzien'] ?? '') == ''   ? $gebruiker['teamzien']   : ($_POST['teamzien'] ?? '');
$chat     		= ($_POST['chat'] ?? '') == ''   ? $gebruiker['chat']   : ($_POST['chat'] ?? '');
$badgeszien     	= ($_POST['badgeszien'] ?? '') == ''   ? $gebruiker['badgeszien']   : ($_POST['badgeszien'] ?? '');
$dueluitnodiging 	= ($_POST['dueluitnodiging'] ?? '') == '' ? $gebruiker['dueluitnodiging'] : ($_POST['dueluitnodiging'] ?? '');
$exibepokes 	= ($_POST['exibepokes'] ?? '') == '' ? $gebruiker['exibepokes'] : ($_POST['exibepokes'] ?? '');
$volume	= ($_POST['volume'] ?? '') == '' ? $gebruiker['volume'] : ($_POST['volume'] ?? '');

if (isset($_POST['persoonlijk'])) {  
	if ($teamzien != '1' && $teamzien != '0') {
		$persoonlijkerror = '<div class="red">'.$txt['alert_seeteam_invalid'].'</div>';
	}
	else if ($badgeszien != '1' && $badgeszien != '0') {
		$persoonlijkerror = '<div class="red">'.$txt['alert_seebadges_invalid'].'</div>';
	}
	else if ($dueluitnodiging != '1' && $dueluitnodiging != '0') {
		$persoonlijkerror = '<div class="red">'.$txt['alert_duel_invalid'].'</div>';
	}
	else {
		if ($volume >= 0 && $volume <= 100) {
			if ($volume % 5 == 0) {
				DB::exQuery("UPDATE `gebruikers` SET `exibepokes`='".$exibepokes."', `teamzien`='".$teamzien."', `badgeszien`='".$badgeszien."', `dueluitnodiging`='".$dueluitnodiging."', `volume`='".$volume."', `chat`='".$chat."' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");

				$persoonlijkerror = '<div class="green">'.$txt['acc_success_personal'].'</div>';
			} else {
				$persoonlijkerror = '<div class="red">'.$txt['acc_alert_volume_invalid'].'</div>';
			}
		}
	}

	echo $persoonlijkerror; 
}
	
if (isset($_POST['veranderww'])) {
	if (empty($_POST['wachtwoordwachtwoordaanmeld']) && empty($_POST['huidig']) && empty($_POST['wachtwoordcontrole'])) 
		$wachtwoordtekst = '<div class="red">'.$txt['alert_all_fields_required'].'</div>';

	else if (($_POST['huidig'] ?? '') == ($_POST['wachtwoordwachtwoordaanmeld'] ?? ''))
		$wachtwoordtekst = '<div class="red">'.$txt['alert_old_new_password_thesame'].'</div>';

	else if (password(($_POST['huidig'] ?? '')) <> $rekening['wachtwoord'])
		$wachtwoordtekst = '<div class="red">'.$txt['alert_old_password_wrong'].'</div>';

	else if (strlen(($_POST['wachtwoordwachtwoordaanmeld'] ?? '')) < 5)
		$wachtwoordtekst = '<div class="red">'.$txt['alert_password_too_short'].'</div>';

	else if (($_POST['wachtwoordwachtwoordaanmeld'] ?? '') <> ($_POST['wachtwoordcontrole'] ?? ''))
		$wachtwoordtekst = '<div class="red">'.$txt['alert_new_controle_password_wrong'].'</div>';
	else {
		$wachtwoordmd5 = password(($_POST['wachtwoordcontrole'] ?? ''));
		$senha1 = password(($_POST['huidig'] ?? ''));
		$senha2 = password(($_POST['wachtwoordwachtwoordaanmeld'] ?? ''));

		DB::exQuery("UPDATE `rekeningen` SET `wachtwoord`='".$wachtwoordmd5."' WHERE `acc_id`='".($_SESSION['acc_id'] ?? '')."'");
		DB::exQuery("INSERT INTO `log_troca_senha` (`id_user`,`nick_user`,`senha_antiga`, `senha_nova`) VALUES('".($_SESSION['acc_id'] ?? '')."','".$rekening['username']."','".$senha1."','".$senha2."')");

		$wachtwoordtekst = '<div class="green">'.$txt['success_password'].'</div>';
	}

	echo $wachtwoordtekst;
}    

if (isset($_POST['emailok'])) {

	if (empty($_POST['email']))
		$emailtekst= '<div class="red">'.$txt['acc_alert_email_empty'].'</div>';
	else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", ($_POST['email'] ?? '')))
		$emailtekst= '<div class="red">'.$txt['acc_alert_email_invalid'].'</div>';
	else if (DB::exQuery("SELECT `email` FROM `rekeningen` WHERE `email`='".($_POST['email'] ?? '')."'")->num_rows >= 1)
		$emailtekst= '<div class="red">'.$txt['acc_alert_email_taken'].'</div>';
	else if (($_POST['email'] ?? '') <> ($_POST['email2'] ?? ''))
		$emailtekst= '<div class="red">'.$txt['acc_alert_email_mismatch'].'</div>';	
	else {
		$emailtekst= '<div class="green">'.sprintf($txt['acc_success_email'], ($_POST['email'] ?? '')).'</div>';	

		DB::exQuery("INSERT INTO `log_troca_email` (`id_user`,`nick_user`,`de_email`, `para_email`) VALUES('".($_SESSION['acc_id'] ?? '')."','".$rekening['username']."','".$gebruiker['email']."','".($_POST['email'] ?? '')."')");
	}

	echo $emailtekst;
}

if (isset($_POST['id']) && isset($_POST['remove']) && ctype_digit(($_POST['id'] ?? ''))) {
	$id = ($_POST['id'] ?? '');

	if ($share->remove($id)) {
		$user = $share->username($id);
		$shared2 = $shared;
		$shared2 = array_merge(array_diff($shared2, array($id)));
		$shared2 = implode(',', $shared2);

		DB::exQuery("UPDATE `rekeningen` SET `shared` = '$shared2' WHERE `acc_id` = '$_SESSION[acc_id]'");
		echo '<div class="green">'.sprintf($txt['acc_success_share_removed'], $user).'</div>';
	} else {
		echo '<div class="red">'.$txt['acc_alert_share_remove_invalid'].'</div>';
	}
}

if (isset($_POST['addCompart']) && ctype_digit(($_POST['addCompart'] ?? ''))) {
	$id = ($_POST['addCompart'] ?? '');

	if ($id == ($_SESSION['id'] ?? '')) {
		echo '<div class="red">'.$txt['acc_alert_share_self'].'</div>';
	} else if ($count > 2) {
		echo '<div class="red">'.$txt['acc_alert_share_limit'].'</div>';
	} else {
		if ($friends->isAccept(($_SESSION['id'] ?? ''), $id)) {
			if ($share->add($id)) {
				$user = $share->username($id);
				$shared2 = $shared;
				array_push($shared2, $id);
				$shared2 = ltrim(implode(',', $shared2), ',');

				DB::exQuery("UPDATE `rekeningen` SET `shared` = '$shared2' WHERE `acc_id` = '$_SESSION[acc_id]'");
				echo '<div class="green">'.sprintf($txt['acc_success_share_added'], $user).'</div>';
			} else {
				echo '<div class="red">'.$txt['acc_alert_share_duplicate'].'</div>';
			}
		} else {
			echo '<div class="red">'.$txt['acc_alert_share_not_friends'].'</div>';
		}
	}
}

if ($gebruiker['rank'] >= 16) {
    $check_1;
	$check_2;
	$check_3;
	$check_4;
	//$check_5;
	$lvl_choose = $gebruiker['lvl_choose'];
	
	if((isset($_POST['level_submit'])) && (isset($_POST['lvl']))){
    	$allowedCategorys = array('5-20','20-40','40-60','60-80');
    	if(!in_array(($_POST['lvl'] ?? ''), $allowedCategorys)) exit;
    	
    	
        DB::exQuery("UPDATE `gebruikers` SET `lvl_choose`='".($_POST['lvl'] ?? '')."' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
        echo '<div class="green">'.sprintf($txt['acc_success_levels'], ($_POST['lvl'] ?? '')).'</div>';		
        $lvl_choose = ($_POST['lvl'] ?? '');
	}

	if($lvl_choose === '5-20') $check_1 = "checked";
	elseif($lvl_choose === '20-40') $check_2 = "checked";
	elseif($lvl_choose === '40-60') $check_3 = "checked";
	elseif($lvl_choose === '60-80') $check_4 = "checked";
	//elseif($lvl_choose === '80-100') $check_5 = "checked";
}

echo addNPCBox(14, $txt['acc_npc_title'], $txt['acc_npc_text']);
?>

<div class="blue"><?=$txt['acc_share_info']?></div>

<div class="row" style="margin-bottom: 7px">
	<div class="box-content col" style="width: 50%; margin-right: 3px">
		<form action="./account-options" method="post">
			<table class="general" width="100%"><thead><tr><th colspan="2"><?=$txt['acc_personal_data']?></th></tr></thead><tbody>
		<tr><td><?=$txt['acc_show_team']?></td><td><?php 
		if ($teamzien == 1) {
          echo'	<input type="radio" name="teamzien" value="1" id="ja" checked /><label for="ja" style="padding-right:17px"> '.$txt['common_yes'].'</label>
            	<input type="radio" name="teamzien" value="0" id="nee" /><label for="nee"> '.$txt['common_no'].'</label>';
          }
          else if ($teamzien == 0) {
          echo'	<input type="radio" name="teamzien" value="1" id="ja" /><label for="ja" style="padding-right:17px"> '.$txt['common_yes'].'</label>
               	<input type="radio" name="teamzien" value="0" id="nee" checked /><label for="nee"> '.$txt['common_no'].'</label>';
          }
          #Als er nog geen teamzien is
          else{
          echo'	<input type="radio" name="teamzien" value="1" id="ja" /><label for="ja" style="padding-right:17px"> '.$txt['common_yes'].'</label>
           		<input type="radio" name="teamzien" value="0" id="nee" /><label for="nee"> '.$txt['common_no'].'</label>';
          }?></td></tr>
		<tr><td><?=$txt['acc_show_badges']?></td><td><?php 
		if ($gebruiker['Badge case'] == 0) {
			echo $txt['alert_dont_have_badgebox'];
		}
		else{
		
		if ($badgeszien == 1) {
          echo'	<input type="radio" name="badgeszien" value="1" id="badges1" checked /><label for="badges1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
            	<input type="radio" name="badgeszien" value="0" id="badges2" /><label for="badges2"> '.$txt['common_no'].'</label>';
          }
          else if ($badgeszien == 0) {
          echo'	<input type="radio" name="badgeszien" value="1" id="badges1" /><label for="badges1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
               	<input type="radio" name="badgeszien" value="0" id="badges2" checked /><label for="badges2"> '.$txt['common_no'].'</label>';
          }
          #Als er nog geen teamzien is
          else{
          echo'	<input type="radio" name="badgeszien" value="1" id="badges1" /><label for="badges1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
           		<input type="radio" name="badgeszien" value="0" id="badges2" /><label for="badges2"> '.$txt['common_no'].'</label>';
          }
		}?></td></tr>
		<tr><td><?=$txt['acc_chat']?></td><td><?php 
		if($chat == 1){
          echo'	<input type="radio" name="chat" value="1" id="chat1" checked /><label for="chat1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
            	<input type="radio" name="chat" value="0" id="chat2" /><label for="chat2"> '.$txt['common_no'].'</label>';
          }
          elseif($chat == 0){
          echo'	<input type="radio" name="chat" value="1" id="chat1" /><label for="chat1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
               	<input type="radio" name="chat" value="0" id="chat2" checked /><label for="chat2"> '.$txt['common_no'].'</label>';
          }
          #Als er nog geen chat is
          else{
          echo'	<input type="radio" name="chat" value="1" id="chat1" /><label for="chat1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
           		<input type="radio" name="chat" value="0" id="chat2" /><label for="chat2"> '.$txt['common_no'].'</label>';
          }?></td></tr>	
		<tr><td><?=$txt['acc_accept_duels']?></td>
    <td><?php 		
		if ($dueluitnodiging == 1) {
          echo'	<input type="radio" name="dueluitnodiging" value="1" id="duel1" checked /><label for="duel1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
            	<input type="radio" name="dueluitnodiging" value="0" id="duel2" /><label for="duel2"> '.$txt['common_no'].'</label>';
          }
          else if ($dueluitnodiging == 0) {
          echo'	<input type="radio" name="dueluitnodiging" value="1" id="duel1" /><label for="duel1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
               	<input type="radio" name="dueluitnodiging" value="0" id="duel2" checked /><label for="duel2"> '.$txt['common_no'].'</label>';
          }
          #Als er nog geen dueluitnodiging is
          else{
          echo'	<input type="radio" name="dueluitnodiging" value="1" id="duel1" /><label for="duel1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
           		<input type="radio" name="dueluitnodiging" value="0" id="duel2" /><label for="duel2"> '.$txt['common_no'].'</label>';
          }
		?></td></tr>
		<tr><td><?=$txt['acc_show_pokemon_status']?></td><td><?php 
		
		if ($exibepokes == "sim") {
          echo'	<input type="radio" name="exibepokes" value="sim" id="exibepokes1" checked /><label for="exibepokes1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
            	<input type="radio" name="exibepokes" value="nao" id="exibepokes2" /><label for="exibepokes2"> '.$txt['common_no'].'</label>';
          }
          else if ($exibepokes == "nao") {
          echo'	<input type="radio" name="exibepokes" value="sim" id="exibepokes1" /><label for="exibepokes1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
               	<input type="radio" name="exibepokes" value="nao" id="exibepokes2" checked /><label for="exibepokes2"> '.$txt['common_no'].'</label>';
          }
          #Als er nog geen dueluitnodiging is
          else{
          echo'	<input type="radio" name="exibepokes" value="sim" id="exibepokes1" /><label for="exibepokes1" style="padding-right:17px"> '.$txt['common_yes'].'</label>
           		<input type="radio" name="exibepokes" value="nao" id="exibepokes2" /><label for="exibepokes2"> '.$txt['common_no'].'</label>';
          }
		?></td></tr>
		
		<tr><td><?=$txt['acc_volume']?></td><td>
		    <input type="range" list="tickmarks" name="volume" style="vertical-align: middle" step="5" min="0" max="100">

            <datalist id="tickmarks">
              <option value="0" label="0%">
              <option value="10">
              <option value="20">
              <option value="30">
              <option value="40">
              <option value="50" label="50%">
              <option value="60">
              <option value="70">
              <option value="80">
              <option value="90">
              <option value="100" label="100%">
            </datalist>
            <span id="volume-span">100%</span>
        </td></tr>
        <script>
            var $range = document.querySelector('input[name="volume"]'),
                $value = document.querySelector('#volume-span');
            
            $value.textContent = <?=$gebruiker['volume']?>+'%';
            $range.value = <?=$gebruiker['volume']?>;
            $range.addEventListener('input', function() {
              $value.textContent = this.value+'%';
            });
        </script>
		
		<?php
		echo '</tbody>
				<tfoot><tr><td colspan="2" align="center"><input type="submit" name="persoonlijk" value="'.$txt['common_edit'].'" class="button" style="margin: 6px"/></td></tr></tfoot>
			</table></form>
		</div>';	
 ?>

<div class="box-content col" style="width: 50%; margin-right: 3px">
	<h3 class="title" style="text-transform: uppercase; margin: 0; padding: 10px; font-size: 16px"><?=$txt['acc_sharing_title']?></h3>
	<table class="general" width="100%">
		<tbody>
		<?php
			$comp_arr = array();
			$i = 0;
		  
			foreach ($shared as $p) {
				$user = $share->username($p);
				if (!empty($user)) {
					if ($i == 0) echo '<tr><td colspan="2" style="height: 22px"><div style="text-align: center"><b>'.sprintf($txt['acc_shared_with'], $count).'</b></div></td></tr><tr style="text-align: center">';
					if ($count == 1) {
						echo '<td colspan="2"> - <a href="./profile&player='.$user.'">'.$user.'</a><form method="post" style="display: inline-block; margin-left: 13px" onsubmit="return confirm (\''.sprintf($txt['acc_confirm_remove_share'], $user).'\')"><input type="hidden" name="id" value="'.$p.'"><input type="submit" name="remove" value="'.$txt['common_remove'].'"></form></td>';
					} else {
						$i++;
						
						if ($i == $count) {
							echo '<td style="border-left: 1px solid #577599"> - <a href="./profile&player='.$user.'">'.$user.'</a><form method="post" style="display: inline-block; margin-left: 13px" onsubmit="return confirm (\''.sprintf($txt['acc_confirm_remove_share'], $user).'\')"><input type="hidden" name="id" value="'.$p.'"><input type="submit" name="remove" value="'.$txt['common_remove'].'"></form></td>';
						} else {
							echo '<td> - <a href="./profile&player='.$user.'">'.$user.'</a><form method="post" style="display: inline-block; margin-left: 13px" onsubmit="return confirm (\''.sprintf($txt['acc_confirm_remove_share'], $user).'\')"><input type="hidden" name="id" value="'.$p.'"><input type="submit" name="remove" value="'.$txt['common_remove'].'"></form></td>';
						}
					}

					if ($i == $count) echo '</tr>';
					array_push($comp_arr, $p);
				}
			}
		?>
		<tr><td colspan="2" style="height: 22px"><div style="text-align: center"><b><?=$txt['acc_share_with']?></b></div></td></tr>
		<tr><td align="center" colspan="2" style="padding: 2px;"><form action="./account-options" id="compart" method="post" onsubmit="return confirm ('<?=$txt['acc_confirm_add_share']?>')">
			<select name="addCompart" required>
			
			<?php
				$f = $friends->query(($_SESSION['id'] ?? ''), 'AND `accept`=1');
				$i = 0;
				
				foreach ($f as $fr) {
					$user = '';
					if ($fr['uid'] == ($_SESSION['id'] ?? '')) {
						$user = $fr['uid_2'];
					} else {
						$user = $fr['uid'];
					}
					
					if (!in_array($user, $comp_arr)) {
						echo '<option value="'.$user.'">'.$share->username($user).'</option>';
						$i++;
					}
				}

				if ($i == 0) echo '<option value="none" disabled selected>'.$txt['acc_nobody'].'</option>';
			?>

			</select>
		</form></td></tr>		
		</tbody>
		<tfoot><tr><td colspan="2" align="center"><input type="submit" onclick="$('#compart').submit()" value="<?=$txt['common_add']?>" class="button" <?=($i == 0)? 'disabled' : ''?> style="margin: 6px"/></td></tr></tfoot>
	</table>
</div>

</div>

<div class="row">
	<div class="box-content col" style="width: 50%; margin-right: 3px">
		<form action="./account-options" method="post" onsubmit="return confirm ('<?=$txt['acc_confirm_change_password']?>')"><table class="general" width="100%">
			<thead><tr><th colspan="2"><?=$txt['acc_change_password']?></th></tr></thead>
			<tbody>
			<tr><td align="center"><?=$txt['acc_current_password']?></td><td align="center"><input type="password" name="huidig" class="text_long" /></td></tr>
			<tr><td align="center"><?=$txt['acc_new_password']?></td><td align="center"><input type="password" name="wachtwoordwachtwoordaanmeld" class="text_long" /></td></tr>
			<tr><td align="center"><?=$txt['acc_confirm_new_password']?></td><td align="center"><input type="password" name="wachtwoordcontrole" class="text_long" /></td></tr>
			
			</tbody>
			<tfoot><tr><td colspan="2" align="center"><input type="submit" name="veranderww" value="<?=$txt['acc_change_password']?>" class="button" style="margin: 6px"/></td></tr></tfoot>
		</table></form>
	</div>

	<div class="box-content col" style="width: 50%; margin-right: 3px">
		<form action="./account-options" method="post" onsubmit="return confirm ('<?=$txt['acc_confirm_change_email']?>')"><table class="general" width="100%">
			<thead><tr><th colspan="2"><?=$txt['acc_update_email']?></th></tr></thead>
			<tbody>
			<tr><td style="height: 27px;"><?=$txt['acc_current_email']?></td><td><?php echo $rekening['email']; ?></td></tr>
			<tr><td><?=$txt['acc_new_email']?></td><td><input type="text" name="email" class="text_long" maxlength="100" /></td></tr>
			<tr><td><?=$txt['acc_repeat_new_email']?></td><td><input type="text" name="email2" class="text_long" maxlength="100" /></td></tr>
			</tbody>
			<tfoot><tr><td colspan="2" align="center"><input type="submit" name="emailok" value="<?=$txt['acc_change_email_button']?>" class="button" style="margin: 6px"/></td></tr></tfoot>
		</table></form>
	</div>
</div>

<?php if ($gebruiker['rank'] >= 16) { ?>
<div class="row" style="margin-top: 7px">
	<div class="box-content col" style="width: 49.7%">
		<form action="./account-options" method="post" onsubmit="return confirm ('<?=$txt['acc_confirm_change_level']?>')"><table class="general" width="100%">
			<thead><tr><th><?=$txt['acc_choose_level']?> <span title="<?=$txt['acc_choose_level_hint']?>" style="cursor:pointer">[?]</span></th></tr></thead>
			<tbody>
			<tr><td align="center"><input type="radio" name="lvl" value="5-20" <? echo $check_1; ?>/><b>5-20</b></td></tr>
			<tr><td align="center"><input type="radio" name="lvl" value="20-40" <? echo $check_2; ?>/><b>20-40</b></td></tr>
			<tr><td align="center"><input type="radio" name="lvl" value="40-60" <? echo $check_3; ?>/><b>40-60</b></td></tr>
			<tr><td align="center"><input type="radio" name="lvl" value="60-80" <? echo $check_4; ?>/><b>60-80</b></td></tr>
			</tbody>
			<tfoot><tr><td align="center"><input type="submit" name="level_submit" value="<?=$txt['acc_change_level_button']?>" class="button" style="margin: 6px"/></td></tr></tfoot>
		</table></form>
	</div>
</div>
<?php } ?>