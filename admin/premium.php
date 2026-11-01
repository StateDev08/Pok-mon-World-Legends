<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
//Admin controle
if ($gebruiker['admin'] < 3) { game_redirect_header('location: ./home'); exit; }
include_once("language/language-admin.php");
require_once("language/language-user.php");
    //Als de knop is aangeklikt
    if (isset($_POST['doneren'])) {
        $bedrag = ($_POST['bedrag'] ?? '');
        $bedragname = ($_POST['bedragname'] ?? ''); 
        //Kijken of er een cijfer is ingevuld
        if (ctype_digit($bedrag)) {
            //Is het bedrag groter dan 0?
            if ($bedrag > 0) {
            if (DB::exQuery("select `user_id` from `gebruikers` where `username`='".$bedragname."'")->num_rows > 0) {
            $timexx = time();
            $endPremium1 = (86400 * $bedrag);
            $endPremium2 = time() + (86400 * $bedrag);
            

                $melding = '<font color="green">'.$bedragname.' recebeu '.$bedrag.' dias de premium!</font>';
                
                DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`=`premiumaccount`+'$endPremium1' WHERE `username`='$bedragname' AND `premiumaccount`>'$timexx' limit 1");
                //COLOCA PRA QUEM TEM PREMIUM ATIVO
                
                DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`='$endPremium2' WHERE `username`='$bedragname' AND `premiumaccount`<'$timexx' limit 1");
                //ATUALIZ QUEM N TEM PREMIUM
               
				$event_txt = user_txt(($_SESSION['id'] ?? 0), 'admin');
				$event = '<img src="'.$static_url.'/images/icons/blue.png" width="16" height="16" class="imglower" /> ' . sprintf($event_txt['adm_premium_event'], '<a href="./profile&player='.$gebruiker['username'].'">'.$gebruiker['username'].'</a>', $bedragname, $bedrag);
				DB::exQuery("INSERT INTO gebeurtenis (id, datum, ontvanger_id, bericht, gelezen)
	VALUES (NULL, NOW(), '".($_SESSION['id'] ?? '')."', '".$event."', '0')");
	} else {
	$melding = '<font color="red">'.$txt['adm_premium_not_exist'].'</font>';
	}
            }else{
                $melding = '<font color="red">'.$txt['adm_number_gt_zero'].'</font>';
            }
        }else{
            $melding = '<font color="red">'.$txt['adm_enter_number'].'</font>';
        }
    }
?>
<?php echo $melding; ?>
<form method="post"><br>
    <label><?=$txt['adm_premium_question']?></label>
   <input type="text" name="bedragname" placeholder="<?=htmlspecialchars($txt['adm_placeholder_trainer'], ENT_QUOTES)?>"/> <input type="number" name="bedrag" placeholder="<?=htmlspecialchars($txt['adm_placeholder_days'], ENT_QUOTES)?>"/><br/><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_premium_btn'], ENT_QUOTES)?>" name="doneren" class="button">
<br><br></form>