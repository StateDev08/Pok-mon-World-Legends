<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
//Admin controle
if ($gebruiker['admin'] < 3) { game_redirect_header('location: ./home'); exit; }
include_once("language/language-admin.php");
    //Als de knop is aangeklikt
    if (isset($_POST['doneren'])) {
        $bedrag = ($_POST['bedrag'] ?? '');
        //Kijken of er een cijfer is ingevuld
        if (ctype_digit($bedrag)) {
            //Is het bedrag groter dan 0?
            if ($bedrag > 0) {
                $melding = '<font color="green">'.$txt['adm_done_ok'].'</font>';
                DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+ ".$bedrag." WHERE `user_id` > 0");
            }else{
                $melding = '<font color="red">A quantia deve ser maior do que 0!</font>';
            }
        }else{
            $melding = '<font color="red">'.$txt['adm_must_enter_number'].'</font>';
        }
    }
?>
<?php echo $melding; ?>
<form method="post">
    <label><?=$txt['adm_bank_question']?></label>
    <input type="text" name="bedrag" /><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_bank_btn'], ENT_QUOTES)?>" name="doneren" class="button">
</form><br><br>
<?php
    //Als de knop is aangeklikt
    if (isset($_POST['doneren'])) {
        $bedrag = ($_POST['bedrag'] ?? '');
        //Kijken of er een cijfer is ingevuld
        if (ctype_digit($bedrag)) {
            //Is het bedrag groter dan 0?
            if ($bedrag > 0) {
                $melding = '<font color="green">'.$txt['adm_done_ok'].'</font>';
                DB::exQuery("UPDATE `gebruikers` SET `gold`=`gold`+ ".$bedrag." WHERE `user_id` > 0");
            }else{
                $melding = '<font color="red">A quantia deve ser maior do que 0!</font>';
            }
        }else{
            $melding = '<font color="red">'.$txt['adm_must_enter_number'].'</font>';
        }
    }
?>
<?php echo $melding; ?>
<form method="post">
    <label><?=$txt['adm_gold_question2']?></label>
    <input type="text" name="bedrag" /><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_gold_btn'], ENT_QUOTES)?>" name="Dar gold" class="button">
</form><br><br>
<?php
    //Als de knop is aangeklikt
    if (isset($_POST['doneren'])) {
        $bedrag = ($_POST['bedrag'] ?? '');
        //Kijken of er een cijfer is ingevuld
        if (ctype_digit($bedrag)) {
            //Is het bedrag groter dan 0?
            if ($bedrag > 0) {
            $timexx = time();
            $endPremium1 = (86400 * $bedrag);
            $endPremium2 = time() + (86400 * $bedrag);
            $melding = '<font color="green">'.$txt['adm_done_ok'].'</font>';
            DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`=`premiumaccount`+'$endPremium1' WHERE `premiumaccount`>'$timexx'");
            //COLOCA PRA QUEM TEM PREMIUM ATIVO
            DB::exQuery("UPDATE `gebruikers` SET `premiumaccount`='$endPremium2' WHERE `premiumaccount`<'$timexx'");
            //ATUALIZ QUEM N TEM PREMIUM
                
            }else{
                $melding = '<font color="red">A quantia deve ser maior do que 0!</font>';
            }
        }else{
            $melding = '<font color="red">'.$txt['adm_must_enter_number'].'</font>';
        }
    }
?>
<?php echo $melding; ?>
<form method="post">
    <label><?=$txt['adm_premium_days_question']?></label>
    <input type="text" name="bedrag" /><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_premium_btn'], ENT_QUOTES)?>" name="Dar premium" class="button">
</form>

