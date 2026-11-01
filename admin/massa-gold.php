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
                $melding = '<font color="green">'.$txt['adm_gold_all_ok'].'</font>';
               DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`+ ".$bedrag." WHERE `user_id` > 0");
            }else{
                $melding = '<font color="red">'.$txt['adm_amount_gt_zero'].'</font>';
            }
        }else{
            $melding = '<font color="red">'.$txt['adm_enter_amount'].'</font>';
        }
    }
	//Als de knop is aangeklikt
    if (isset($_POST['doneren2'])) {
        $bedrag = ($_POST['bedrag'] ?? '');
        //Kijken of er een cijfer is ingevuld
        if (ctype_digit($bedrag)) {
            //Is het bedrag groter dan 0?
            if ($bedrag > 0) {
                $melding2 = '<font color="green">'.$txt['adm_silver_all_ok'].'</font>';
                DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+ ".$bedrag." WHERE `user_id` > 0");
            }else{
                $melding2 = '<font color="red">'.$txt['adm_amount_gt_zero'].'</font>';
            }
        }else{
            $melding2 = '<font color="red">'.$txt['adm_enter_amount'].'</font>';
        }
    }
?>
<?php echo $melding; ?>
<form method="post">
    <label><?=$txt['adm_gold_question']?></label>
    <input type="text" name="bedrag" /><br/><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_give_btn'], ENT_QUOTES)?>" name="doneren" class="button">
</form>
<hr>
<?php echo $melding2; ?>
<form method="post">
    <label><?=$txt['adm_silver_question']?></label>
    <input type="text" name="bedrag" /><br/><br/>
    <input type="submit" value="<?=htmlspecialchars($txt['adm_give_btn'], ENT_QUOTES)?>" name="doneren2" class="button">
</form>