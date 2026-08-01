<?php 
include("app/includes/resources/security.php");

$query = DB::exQuery("SELECT * FROM `casino`"); 
$casino = $query->fetch_assoc();

echo addNPCBox(36, $txt['kluis_npc_title'], $txt['kluis_npc_text']);

if (($_POST["post"] ?? '')) { 
    if ($gebruiker['tickets'] <= 200) { echo "<div class='red'>".$txt['kluis_no_tickets']."</div>"; } else { 
        if (($_POST["code1"] ?? '') == $casino['kluis_1'] && ($_POST["code2"] ?? '') == $casino['kluis_2'] && ($_POST["code3"] ?? '') == $casino['kluis_3']) { 
            echo "<div class='green'>".sprintf($txt['kluis_won'], highamount($casino['kluis_4']))."</div>"; 
            $r1 = rand(0,6); 
            $r2 = rand(0,6); 
            $r3 = rand(0,6); 
            DB::exQuery("UPDATE `gebruikers` SET `tickets`=`tickets`+'" . $casino['kluis_4'] . "' WHERE user_id='".($_SESSION['id'] ?? '')."'");  
            DB::exQuery("UPDATE `casino` SET `kluis_1`=$r1, `kluis_2`=$r2, `kluis_3`=$r3, `kluis_4`=1000"); 
            DB::exQuery("TRUNCATE TABLE kluis_kraken"); 
        } else { 
            echo "<div class='red'>".$txt['kluis_lost']."</div>"; 
                
            DB::exQuery("UPDATE `gebruikers` SET `tickets`=`tickets`-'200' WHERE user_id='".($_SESSION['id'] ?? '')."'"); 
            DB::exQuery("UPDATE `casino` SET `kluis_4`=`kluis_4`+'200'"); 
            DB::exQuery("INSERT INTO `kluis_kraken` (`1`, `2`, `3`) VALUES ('" . ($_POST['code1'] ?? '') . "','" . ($_POST['code2'] ?? '') . "', '" . ($_POST['code3'] ?? '') . "')"); 
        } 
    } 
} 
?>
<div class="box-content" style="width: 50%; margin-bottom: 7px; display: inline-block"><h3 class="title" style="background: none"> <?=$txt['tickets_inventory']?> <img src="<?=$static_url?>/images/icons/ticket.png" title="Tickets" />  <?= highamount($gebruiker['tickets']); ?></h3> </div>
<div class="box-content" style="width: 49%; margin-bottom: 7px; display: inline-block"><h3 class="title" style="background: none"> <?=$txt['kluis_current_prize']?> <img src="<?=$static_url?>/images/icons/ticket.png" title="Tickets" />  <?= number_format($casino['kluis_4'], 0, ',', '.'); ?></h3> </div>

<style>
    [name=code1], [name=code2], [name=code3] {
        width: 70px
    }
</style>

<div class="box-content">
<table class="general" width="100%" style="text-align: center"> 
<thead>
    <tr><th><strong><?=sprintf($txt['kluis_code_label'], 1)?></th> 
    <th><strong><?=sprintf($txt['kluis_code_label'], 2)?></th>
    <th><strong><?=sprintf($txt['kluis_code_label'], 3)?></th></tr> 
</thead>
<tr><td><form method="post">  
<select name="code1" class="text_select"> 
<option value="0">0</option> 
<option value="1">1</option> 
<option value="2">2</option> 
<option value="3">3</option> 
<option value="4">4</option> 
<option value="5">5</option> 
<option value="6">6</option> 
</select> 
</td><td> 
<select name="code2" class="text_select"> 
<option value="0">0</option> 
<option value="1">1</option> 
<option value="2">2</option> 
<option value="3">3</option> 
<option value="4">4</option> 
<option value="5">5</option> 
<option value="6">6</option> 
</select> 
</td><td> 
<select name="code3" class="text_select"<div class="green">
<option value="0">0</option> 
<option value="1">1</option> 
<option value="2">2</option> 
<option value="3">3</option> 
<option value="4">4</option> 
<option value="5">5</option> 
<option value="6">6</option> 
</select> 
</td></tr><tr>
<td colspan="3"><input type="submit" name="post" value="<?=$txt['kluis_try']?>" class="button" /></td>
</form>
</tr> 
</table>  
</div>