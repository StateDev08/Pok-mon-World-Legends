<?php
include('app/includes/resources/security.php');
     
echo addNPCBox(13, $txt['dquest_title'], $txt['dquest_npc_msg']);

if ($gebruiker['itembox'] == 'Bag')				$gebruiker['item_over'] = 20   - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Yellow box')	$gebruiker['item_over'] = 50   - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Blue box')	$gebruiker['item_over'] = 100  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Red box')	$gebruiker['item_over'] = 250  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Purple box')	$gebruiker['item_over'] = 500  - $gebruiker['items'];
else if ($gebruiker['itembox'] == 'Black box')	$gebruiker['item_over'] = 1000 - $gebruiker['items'];

if ($gebruiker['rank'] >= 4) {
    if ($quest_1['recomp_type'] == 'item') {
        $item_1 = $quests->getItem($quest_1['recomp_id'])->fetch_assoc();
        if ($item_1['soort'] == 'tm') {
            $pegadadox = DB::exQuery("select omschrijving from tmhm where naam='".$item_1['naam']."'")->fetch_assoc();
            $pegadado = DB::exQuery("select soort from aanval where naam='".$pegadadox['omschrijving']."'")->fetch_assoc();
            $type = $pegadado['soort'];

            $reward_1 = $quest_1['recomp_quant'].'x '.$item_1['naam'].'<img src="public/images/items/Attack_'.$type.'.png">';
        } else {
            $item_1 = $item_1['naam'];
            $reward_1 = $quest_1['recomp_quant'].'x '.$item_1.'<img src="public/images/items/'.$item_1.'.png">';
        }
        
    } else if ($quest_1['recomp_type'] == 'gold') {
        $reward_1 = $quest_1['recomp_quant'].'x <img src="public/images/icons/gold.png">';
    } else {
        $reward_1 = $quest_1['recomp_quant'].'x <img src="public/images/icons/silver.png">';
    }

    if ($quest_2['recomp_type'] == 'item') {
        $item_2 = $quests->getItem($quest_2['recomp_id'])->fetch_assoc();
        if ($item_2['soort'] == 'tm') {
            $pegadadox = DB::exQuery("select omschrijving from tmhm where naam='".$item_2['naam']."'")->fetch_assoc();
            $pegadado = DB::exQuery("select soort from aanval where naam='".$pegadadox['omschrijving']."'")->fetch_assoc();
            $type = $pegadado['soort'];

            $reward_2 = $quest_2['recomp_quant'].'x '.$item_2['naam'].'<img src="public/images/items/Attack_'.$type.'.png">';
        } else {
            $item_2 = $item_2['naam'];
            $reward_2 = $quest_2['recomp_quant'].'x '.$item_2.'<img src="public/images/items/'.$item_2.'.png">';
        }
    } else if ($quest_2['recomp_type'] == 'gold') {
        $reward_2 = $quest_2['recomp_quant'].'x <img src="public/images/icons/gold.png">';
    } else {
        $reward_2 = $quest_2['recomp_quant'].'x <img src="public/images/icons/silver.png">';
    }

    if ($quest_1['type'] != 'catch_single') {
        $descr_1 = str_replace('%qnt%', $quest_1['quant_wid'], $quest_1['descr']);
    } else {
        $wild = DB::exQuery("SELECT `naam`,`wild_id` FROM `pokemon_wild` WHERE `wild_id`='$quest_1[quant_wid]'")->fetch_assoc()['naam'];
        $descr_1 = str_replace('%qnt%', $wild, $quest_1['descr']);
    }

    if ($quest_2['type'] != 'catch_single') {
        $descr_2 = str_replace('%qnt%', $quest_2['quant_wid'], $quest_2['descr']);
    } else {
        $wild = DB::exQuery("SELECT `naam`,`wild_id` FROM `pokemon_wild` WHERE `wild_id`='$quest_2[quant_wid]'")->fetch_assoc()['naam'];
        $descr_2 = str_replace('%qnt%', $wild, $quest_2['descr']);
    }

    if ($rekening['quest_r_1'] == '1') $reward_1 = $txt['dquest_reward_taken_other'];
    if ($rekening['quest_r_2'] == '1') $reward_2 = $txt['dquest_reward_taken_other'];

    if ($gebruiker['quest_1'] == 0) {
        if ($gebruiker['quest_1_req'] >= $quest_1['quant_wid']) {
            if ($rekening['quest_r_1'] == '0') {
                $reward_1 = '<form method="post"><input type="submit" name="quest_1" value="'.$txt['dquest_complete_claim'].'"></form>';
            } else {
                $reward_1 = '<form method="post"><input type="submit" name="quest_1" value="'.$txt['dquest_complete'].'"></form>';
            }

            if (isset($_POST['quest_1'])) {
                if ($gebruiker['item_over'] <= $quest_1['recomp_quant'] && $quest_1['recomp_type'] == 'item') {
                    echo '<div class="red">'.$txt['dquest_no_space'].'</div>';
                } else {
                    if ($rekening['quest_r_1'] == '0') {
                        if ($quest_1['recomp_type'] == 'item') {
                            $item = $quests->getItem($quest_1['recomp_id'])->fetch_assoc()['naam'];
                            if (strpos($item, 'TM') !== false) {
                                DB::exQuery("UPDATE `gebruikers_tmhm` SET `".$item."`=`".$item."`+'".$quest_1['recomp_quant']."' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                            } else {
                                DB::exQuery("UPDATE `gebruikers_item` SET `".$item."`=`".$item."`+'".$quest_1['recomp_quant']."' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                            }
                        } else if ($quest_1['recomp_type'] == 'gold') {
                            DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`+'".$quest_1['recomp_quant']."' WHERE `acc_id`='$_SESSION[acc_id]'");
                        } else {
                            DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+'".$quest_1['recomp_quant']."' WHERE `user_id`='$_SESSION[id]'");
                        }                        
                    }

                    DB::exQuery("UPDATE `rekeningen` SET `quest_r_1`='1' WHERE `acc_id`='$_SESSION[acc_id]'");                    
                    DB::exQuery("UPDATE `gebruikers` SET `quest_1`='1', `quest_1_req`='0' WHERE `user_id`='$_SESSION[id]'");
                    DB::exQuery("UPDATE `gebruikers` SET `streak`=`streak`+'1' WHERE `quest_2`='1' AND `user_id`='$_SESSION[id]'");
                    
                    if ($gebruiker['streak'] == 6 && $gebruiker['quest_2'] == '1') {
                        if ($rekening['quest_r_master'] == '0') {
                            if ($gebruiker['item_over'] < 1) {
                                echo '<div class="red">Não há espaço na sua mochila!</div>';
                            } else {
                                $item = 'Master ball';
                                DB::exQuery("UPDATE `rekeningen` SET `quest_r_master`='1' WHERE `acc_id`='$_SESSION[acc_id]'");
                                DB::exQuery("UPDATE `gebruikers_item` SET `".$item."`=`".$item."`+'1' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                                echo '<div class="green">Você completou 7 dias de MISSÕES CONSECULTIVAS e ganhou uma Master Ball <img src="public/images/items/Master ball.png" style="vertical-align: middle">!</div>';
                            }
                        } else {
                            echo '<div class="green">'.$txt['dquest_master_taken'].'</div>';
                        }
                    }

                    echo '<div class="green">'.$txt['dquest_done_1'].'</div>';
                }
            }
        } else {
            $reward_1 = $txt['dquest_rewards'].' '.$reward_1;
        }
    } else {
        $reward_1 = '<b>'.$txt['dquest_complete_1'].'</b>';
    }

    if ($gebruiker['quest_2'] == 0) {
        if ($gebruiker['quest_2_req'] >= $quest_2['quant_wid']) {
            if ($rekening['quest_r_2'] == '0') {
                $reward_2 = '<form method="post"><input type="submit" name="quest_2" value="'.$txt['dquest_complete_claim'].'"></form>';
            } else {
                $reward_2 = '<form method="post"><input type="submit" name="quest_2" value="'.$txt['dquest_complete'].'"></form>';
            }

            if (isset($_POST['quest_2'])) {
                if ($gebruiker['item_over'] <= $quest_2['recomp_quant'] && $quest_2['recomp_type'] == 'item') {
                    echo '<div class="red">'.$txt['dquest_no_space'].'</div>';
                } else {
                    if ($rekening['quest_r_2'] == '0') {
                        if ($quest_2['recomp_type'] == 'item') {
                            $item = $quests->getItem($quest_2['recomp_id'])->fetch_assoc()['naam'];
                            if (strpos($item, 'TM') !== false) {
                                DB::exQuery("UPDATE `gebruikers_tmhm` SET `".$item."`=`".$item."`+'".$quest_2['recomp_quant']."' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                            } else {
                                DB::exQuery("UPDATE `gebruikers_item` SET `".$item."`=`".$item."`+'".$quest_2['recomp_quant']."' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                            }
                        } else if ($quest_2['recomp_type'] == 'gold') {
                            DB::exQuery("UPDATE `rekeningen` SET `gold`=`gold`+'".$quest_2['recomp_quant']."' WHERE `acc_id`='$_SESSION[acc_id]'");
                        } else {
                            DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`+'".$quest_2['recomp_quant']."' WHERE `user_id`='$_SESSION[id]'");
                        }
                    }

                    DB::exQuery("UPDATE `rekeningen` SET `quest_r_2`='1' WHERE `acc_id`='$_SESSION[acc_id]'");
                    DB::exQuery("UPDATE `gebruikers` SET `quest_2`='1', `quest_2_req`='0' WHERE `user_id`='$_SESSION[id]'");
                    DB::exQuery("UPDATE `gebruikers` SET `streak`=`streak`+'1' WHERE `quest_1`='1' AND `user_id`='$_SESSION[id]'");

                    if ($gebruiker['streak'] == 6 && $gebruiker['quest_1'] == '1') {
                        if ($rekening['quest_r_master'] == '0') {
                            if ($gebruiker['item_over'] < 1) {
                                echo '<div class="red">'.$txt['dquest_no_space'].'</div>';
                            } else {
                                $item = 'Master ball';
                                DB::exQuery("UPDATE `rekeningen` SET `quest_r_master`='1' WHERE `acc_id`='$_SESSION[acc_id]'");
                                DB::exQuery("UPDATE `gebruikers_item` SET `".$item."`=`".$item."`+'1' WHERE `user_id`='".$_SESSION['id']."' LIMIT 1");
                                echo '<div class="green">'.$txt['dquest_master_earned'].'</div>';
                            }
                        } else {
                            echo '<div class="green">'.$txt['dquest_master_taken'].'</div>';
                        }
                    }

                    echo '<div class="green">'.$txt['dquest_done_2'].'</div>';
                }
            }
        } else {
            $reward_2 = $txt['dquest_rewards'].' '.$reward_2;
        }
    } else {
        $reward_2 = '<b>'.$txt['dquest_complete_2'].'</b>';
    }

    if ($gebruiker['streak'] == 7) {
        echo '<div class="green">'.$txt['dquest_master_week'].'</div>';
    } else if ($gebruiker['quest_1'] == 1 && $gebruiker['quest_2'] == 1) {
        echo '<div class="green">'.$txt['dquest_wait_tomorrow'].'</div>';
    }

?>
<div class="red"><?=$txt['dquest_account_warning']?></div>
<div class="blue"><?=sprintf($txt['dquest_streak'], $gebruiker['streak'])?></div>
<div class="row">
    <div class="box-content col" style="width: 51%">
        <h3 class="title"><?=$txt['dquest_mission_1']?></h3>
        <p style="border-bottom: 1px solid #577599; padding: 10px 0 15px; font-size:15px">&#8226; <?=$descr_1?></p>
        <p><?=$reward_1?></p>
    </div>
    <div class="box-content col" style="margin-left: 10px;width: 50%;">
        <h3 class="title"><?=$txt['dquest_mission_2']?></h3>
        <p style="border-bottom: 1px solid #577599; padding: 10px 0 15px; font-size:15px">&#8226; <?=$descr_2?></p>
        <p><?=$reward_2?></p>
    </div>
</div>
<?php
} else {
    echo '<div class="red">'.$txt['dquest_min_rank'].'</div>';
}