<?php
require_once __DIR__ . '/../../GameUrl.php';
include("app/includes/resources/security.php");

$senha = (string) Env::get('TEAM_PASSWORD', '');

$captcha = ($_POST['captcha'] ?? '');
if ($captcha != "")
{

if (($captcha) != $senha) {
		echo '<div class="red">'.$txt['team_pass_wrong'].'</div>';
	
	} else {		
	$_SESSION['equipe'] = 1;
	game_redirect_header("Location: ./home");
		echo '<div class="green">'.$txt['team_pass_ok'].'</div>';
   }
   
 }   else {
 
 		echo '<div class="red">'.$txt['team_pass_empty'].'</div>';
 		}
?>
<form method="post">
<center><p><?=$txt['team_pass_header']?></p></center>
<center><table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" style="background: url('<?=$static_url?>/images/<?php echo rand(1,15); ?>.png') no-repeat left top; width: 100%; height: 250px;"></td>
    <td width="320" align="left" valign="top"><br /><br />
      <table width="300" border="0" cellspacing="0" cellpadding="0">
 
    <BR><BR><BR><BR>
        <tr>
          <td height="37"><?=$txt['team_pass_label']?></td>
          <td><input type="password" name="captcha" class="text_long"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" value="OK!" class="button"></td>
        </tr>
      </table></td>
      <br><br>
  </tr>
</table>
</center>
</form>