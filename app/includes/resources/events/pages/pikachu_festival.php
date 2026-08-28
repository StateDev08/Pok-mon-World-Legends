<?php 
echo addNPCBox(37, $txt['pika_npc_title'], sprintf($txt['pika_npc_text'], '<img src="'.$static_url.'/images/poke_icons/pikachu_festival.png" title="Token Pikachu">'));

if ($gebruiker['itembox'] == 'Bag')				$gebruiker['item_over'] = 20   - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Yellow box')	$gebruiker['item_over'] = 50   - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Blue box')	$gebruiker['item_over'] = 100  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Red box')	$gebruiker['item_over'] = 250  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Purple box')	$gebruiker['item_over'] = 500  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Black box')	$gebruiker['item_over'] = 1000 - $gebruiker['items'];

if (isset($_POST['buy-ball'])) {
    if ($gebruiker['1_drop'] >= 150) {
        if ($gebruiker['item_over'] > 0) {
            DB::exQuery("UPDATE `gebruikers_item` SET `Master ball`=`Master ball`+'1' WHERE `user_id`='".($_SESSION['id'] ?? '')."' LIMIT 1");
            DB::exQuery("UPDATE `gebruikers` SET `1_drop`=`1_drop`-'100' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
            echo '<div class="green">'.sprintf($txt['pika_won_item'], '<img src="'.$static_url.'/images/items/Master ball.png" style="vertical-align: middle">', 'Master Ball').'</div>';
        } else {
            echo '<div class="red">'.$txt['pika_no_space'].'</div>';
        }
    } else {
        echo '<div class="red">'.$txt['pika_no_tokens'].'</div>';
    }
}

if (isset($_POST['buy-pikachu'])) {
    if ($gebruiker['1_drop'] >= 250) {
        if ($gebruiker['in_hand'] >= 6) {
            echo '<div class="red">'.$txt['drop_team_full'].'</div>';
        } else {
            $opzak_nummer = $gebruiker['in_hand'] + 1;

            $pkm = DB::exQuery("SELECT `wild_id`,`groei`,`attack_base`,`defence_base`,`speed_base`,`spc.attack_base`,`spc.defence_base`,`hp_base`,`aanval_1`,`aanval_2`,`aanval_3`,`aanval_4`,`ability`,`naam` FROM `pokemon_wild` WHERE `wild_id`='965' LIMIT 1")->fetch_assoc();
            $ability = explode(',', rtrim($pkm['ability'], ','));

            $date = date('Y-m-d H:i:s');

            $ability = $ability[rand(0, (sizeof($ability) - 1))];

            #De willekeurige pokemon in de pokemon_speler tabel zetten
            DB::exQuery("INSERT INTO `pokemon_speler` (`wild_id`,`aanval_1`,`aanval_2`,`aanval_3`,`aanval_4`) SELECT `wild_id`,`aanval_1`,`aanval_2`,`aanval_3`,`aanval_4` FROM `pokemon_wild` WHERE `wild_id`='" . $pkm['wild_id'] . "'");

            #id opvragen van de insert hierboven
            $pokeid	= DB::insertID();

            #Karakter kiezen 
            $karakter  = DB::exQuery("SELECT * FROM `karakters` ORDER BY RAND() LIMIT 1")->fetch_assoc();

            #Expnodig opzoeken en opslaan
            $experience = DB::exQuery("SELECT `punten` FROM `experience` WHERE `soort`='".$pkm['groei']."' AND `level`='6'")->fetch_assoc();

            $attack_iv		= mt_rand(20, 31);
            $defence_iv		= mt_rand(20, 31);
            $speed_iv		= mt_rand(20, 31);
            $spcattack_iv	= mt_rand(20, 31);
            $spcdefence_iv	= mt_rand(20, 31);
            $hp_iv			= mt_rand(20, 31);

            #Stats berekenen
            $attackstat		= round(((($attack_iv + 2 * $pkm['attack_base']) * 5 / 100) + 5) * $karakter['attack_add']);
            $defencestat	= round(((($defence_iv + 2 * $pkm['defence_base']) * 5 / 100) + 5) * $karakter['defence_add']);
            $speedstat		= round(((($speed_iv + 2 * $pkm['speed_base']) * 5 / 100) + 5) * $karakter['speed_add']);
            $spcattackstat	= round(((($spcattack_iv + 2 * $pkm['spc.attack_base']) * 5 / 100) + 5) * $karakter['spc.attack_add']);
            $spcdefencestat	= round(((($spcdefence_iv + 2 * $pkm['spc.defence_base']) * 5 / 100) + 5) * $karakter['spc.defence_add']);
            $hpstat			= round((($hp_iv + 2 * $pkm['hp_base']) * 5 / 100) + 10 + 5);

            #Alle gegevens van de pokemon opslaan
            DB::exQuery("UPDATE `pokemon_speler` SET `level`='5',`karakter`='".$karakter['karakter_naam']."',`expnodig`='".$experience['punten']."',`user_id`='".($_SESSION['id'] ?? '')."',`opzak`='ja',`opzak_nummer`='".$opzak_nummer."',`attack_iv`='".$attack_iv."',`defence_iv`='".$defence_iv."',`speed_iv`='".$speed_iv."',`spc.attack_iv`='".$spcattack_iv."',`spc.defence_iv`='".$spcdefence_iv."',`hp_iv`='".$hp_iv."',`attack`='".$attackstat."',`defence`='".$defencestat."',`speed`='".$speedstat."',`spc.attack`='".$spcattackstat."',`spc.defence`='".$spcdefencestat."',`levenmax`='".$hpstat."',`leven`='".$hpstat."',`ability`='".$ability."',`capture_date`='".$date."',`icon`='7' WHERE `id`='".$pokeid."' LIMIT 1");
            
            echo '<div class="green">'.sprintf($txt['pika_bought'], $pkm['naam']).'</div>';
            DB::exQuery("UPDATE `gebruikers` SET `1_drop`=`1_drop`-'200' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
        }
    } else {

    }
}

if (isset($_POST['buy-zmove'])) {
    if ($gebruiker['1_drop'] >= 400) {
        if ($gebruiker['item_over'] > 0) {
            DB::exQuery("UPDATE `gebruikers_item` SET `Pikanium Z`=`Pikanium Z`+'1' WHERE `user_id`='".($_SESSION['id'] ?? '')."' LIMIT 1");
            DB::exQuery("UPDATE `gebruikers` SET `1_drop`=`1_drop`-'350' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
            echo '<div class="green">'.sprintf($txt['pika_won_item'], '<img src="'.$static_url.'/images/items/Pikanium Z.png" style="vertical-align: middle">', 'Pikanium Z').'</div>';
        } else {
            echo '<div class="red">'.$txt['pika_no_space'].'</div>';
        }
    } else {
        echo '<div class="red">'.$txt['pika_no_tokens'].'</div>';
    }
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">

<div class="blue"><?=sprintf($txt['pika_you_have'], $gebruiker['1_drop'], '<img src="'.$static_url.'/images/poke_icons/pikachu_festival.png" title="Token Pikachu" style="vertical-align:middle">')?></div>

<div class="box-content">
    <h3 class="title"><?=$txt['pika_cosplays']?></h3>
    <p>
        <img src="<?=$static_url?>/images/pokemon/966.gif" alt="Pikachu (RockStar)" title="Pikachu (RockStar)" class="animated delay-1s bounceIn">
        <img src="<?=$static_url?>/images/pokemon/967.gif" alt="Pikachu (PopStar)" title="Pikachu (PopStar)" style="margin: 0 3%;" class="animated delay-2s bounceIn">
        <img src="<?=$static_url?>/images/pokemon/968.gif" alt="Pikachu (Ph.D)" title="Pikachu (Ph.D)" class="animated delay-3s bounceIn">
    </p>
</div>

<div class="box-content" style="margin-top: 7px">
    <h3 class="title"><?=$txt['drop_store_title']?></h3>
    <div class="row">
         <div class="col" style="width: 33%; border-right: 1px solid #577599; padding: 30px 0">
            <div style="background: url(<?=$static_url?>/images/layout/events/store/prizes.png) no-repeat; background-size: 100% 100%; width: 170px; height: 180px; text-align:center"><table width="99%"><tbody><tr><th colspan="2"><h3 class="title" style="text-align: center; margin: 10px 0 0;">Master Ball</h3></th></tr><tr><td colspan="2"><img src="<?=$static_url?>/images/items/Master ball.png" class="elipse" style="margin-top: 13px;margin-right:0;"></td></tr><tr><td style="padding-top: 7px;"><img src="<?=$static_url?>/images/poke_icons/pikachu_festival.png" title="TOKEN PIKACHU" style="width: 16px"/> <span style="color:#9eadcd;font-weight:bold;font-size:12px">150x</span><br></td></tr><tr><td style="padding-top: 21px;"><form method="post"><input type="submit" value="<?=htmlspecialchars($txt['pika_buy'], ENT_QUOTES)?>" name="buy-ball"></form></td></tr></tbody></table></div>
        </div>
        <div class="col" style="width: 33%; border-right: 1px solid #577599; padding-top: 30px">
            <div style="background: url(<?=$static_url?>/images/layout/events/store/prizes.png) no-repeat; background-size: 100% 100%; width: 170px; height: 180px; text-align:center"><table width="99%"><tbody><tr><th colspan="2"><h3 class="title" style="text-align: center; margin: 10px 0 0;">Pikachu (Libre)</h3></th></tr><tr><td colspan="2"><img src="<?=$static_url?>/images/pokemon/icon/965.gif" class="elipse" style="margin-top: 13px;width: 24px; height:24px;margin-right:0;"></td></tr><tr><td style="padding-top: 7px;"><img src="<?=$static_url?>/images/poke_icons/pikachu_festival.png" title="TOKEN PIKACHU" style="width: 16px"/> <span style="color:#9eadcd;font-weight:bold;font-size:12px">250x</span><br></td></tr><tr><td style="padding-top: 21px;"><form method="post"><input type="submit" value="<?=htmlspecialchars($txt['pika_buy'], ENT_QUOTES)?>" name="buy-pikachu"></form></td></tr></tbody></table></div>
        </div>
        <div class="col" style="width: 33%; padding-top: 30px">
            <div style="background: url(<?=$static_url?>/images/layout/events/store/prizes.png) no-repeat; background-size: 100% 100%; width: 170px; height: 180px; text-align:center"><table width="99%"><tbody><tr><th colspan="2"><h3 class="title" style="text-align: center; margin: 10px 0 0;">Pikanium Z</h3></th></tr><tr><td colspan="2"><img src="<?=$static_url?>/images/items/Pikanium Z.png" class="elipse" style="margin-top: 13px;margin-right:0;"></td></tr><tr><td style="padding-top: 7px;"><img src="<?=$static_url?>/images/poke_icons/pikachu_festival.png" title="TOKEN PIKACHU" style="width: 16px"/> <span style="color:#9eadcd;font-weight:bold;font-size:12px">400x</span><br></td></tr><tr><td style="padding-top: 21px;"><form method="post"><input type="submit" value="<?=htmlspecialchars($txt['pika_buy'], ENT_QUOTES)?>" name="buy-zmove"></form></td></tr></tbody></table></div>
        </div>
    </div>
</div>