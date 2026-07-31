<?php

include("app/includes/resources/security.php");
include("app/classes/Friends.php");

$friends = new Friends();

$value = '';
if (isset($_GET['name']))  $value = 'value="'.($_GET['name'] ?? '').'"';

$aprox = false;
$success = false;
if (isset($_GET['name'])) {
    if (isset($_GET['like']) && ($_GET['like'] ?? '') == 'true') $aprox = true;
    if (!is_numeric($_GET['subpage'] ?? '')) $subpage = 1;
    else $subpage = (int)($_GET['subpage'] ?? ''); 

    if (!$aprox) {
        $number = DB::exQuery ("SELECT * FROM `gebruikers` WHERE username='".($_GET['name'] ?? '')."'")->num_rows;
    } else {
        $number = DB::exQuery ("SELECT * FROM `gebruikers` WHERE username LIKE '".($_GET['name'] ?? '')."%'")->num_rows;
    }

    $max = 20;
    $aantal_paginas = ceil($number / $max); 

    if ($aantal_paginas == 0) $aantal_paginas = 1;   
    $pagina = $subpage * $max - $max; 

    if (!$aprox) {
        $query = DB::exQuery ("SELECT * FROM `gebruikers` WHERE username='".($_GET['name'] ?? '')."' LIMIT ".$pagina.",".$max);
    } else {
        $query = DB::exQuery ("SELECT * FROM `gebruikers` WHERE username LIKE '".($_GET['name'] ?? '')."%' LIMIT ".$pagina.",".$max);
    }

    $success = true;
    $value = 'value="'.($_GET['name'] ?? '').'"';
}

if (isset($_POST['player']) && ctype_digit(($_POST['player'] ?? ''))) {
    $player = ($_POST['player'] ?? '');
    $exists = DB::exQuery ("SELECT `user_id` FROM `gebruikers` WHERE `user_id`='$player'")->num_rows;
    $is_friend = $friends->isFriend(($_SESSION['id'] ?? ''), $player);
    $blocklist_1 = explode(',', $gebruiker['blocklist']);
    $blocklist_2 = explode(',', $friends->getInfos($player)['blocklist']);

    if ($exists == 0) {
        echo '<div class="red">'.$txt['friends_add_err_not_exists'].'</div>';
    } else if ($player == ($_SESSION['id'] ?? '')) {
        echo '<div class="red">'.$txt['friends_add_err_yourself'].'</div>';
    } else if ($is_friend) {
        echo '<div class="red">'.$txt['friends_add_err_already'].'</div>';
    } else if (in_array($player, $blocklist_1)) { 
        echo '<div class="red">'.$txt['friends_add_err_blocked_by_you'].'</div>';
    } else if (in_array(($_SESSION['id'] ?? ''), $blocklist_2)) { 
        echo '<div class="red">'.$txt['friends_add_err_blocked_you'].'</div>';
    } else {
        $friends->sendSolicitation(($_SESSION['id'] ?? ''), $player);
        $quests->setStatus('friend', ($_SESSION['id'] ?? ''));
        echo '<div class="green">'.$txt['friends_add_success'].'</div>';
    }
}

echo addNPCBox (15, $txt['friends_add_title'], $txt['friends_add_npc_msg']);
?>

<div style="min-height: 18px;" class="box-content">
    <div style="padding: 10px">
        <label>
            <span style="font-size: 14px; color: #fff"><?=$txt['friends_add_label']?></span> <input type="text" class="text_long" placeholder="<?=$txt['friends_add_placeholder']?>" <?=$value?> name="name" style="width: 78.5%; height:30px; padding: 5px 0 5px 10px; margin-bottom: 5px" maxlength="10" required="">
        </label>
    </div>
    <div style="border-top: 1px solid #577599; padding: 10px">
        <label>
            <input type="checkbox" style="vertical-align: middle" name="like" <?=($aprox)? 'checked' : '';?>> <span style="font-size: 12.5px; color: #fff"><?=$txt['friends_add_approximate']?></span>
        </label>
        <br>
        <button id="search" onclick="search()"><?=$txt['friends_add_search']?></button>
        <br>
    </div>
</div>

<?php if ($success) { ?>

<style>
    #example td {
        text-align: center;
    }    
</style>

<div class="box-content" style="margin-top: 5px;">
    <table class="general blue" id="example">
        <thead>
            <tr>
                <td><strong><?=$txt['friends_add_th_trainer']?></strong></td>
                <td><strong><?=$txt['friends_add_th_member_since']?></strong></td>
                <td><strong><?=$txt['friends_add_th_last_visit']?></strong></td>
                <td><strong><?=$txt['friends_add_th_rank']?></strong></td>
                <td class="no-sort"><strong><?=$txt['friends_add_th_status']?></strong></td>
                <td class="no-sort"><strong><?=$txt['friends_add_th_action']?></strong></td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($q = $query->fetch_assoc()) {
                    $voortgang = $q['rang'];

                    if ($voortgang == 0) {
                        $number = "-";   
                    } else {
                        $number = $voortgang."º";
                    }
                        
                    if ($voortgang == '1') {
                        $medaille = "<img src='".$static_url."/images/icons/plaatsnummereen.png'>";
                    } else if ($voortgang == '2') {
                        $medaille = "<img src='".$static_url."/images/icons/plaatsnummertwee.png'>";
                    } else if ($voortgang == '3') {
                        $medaille = "<img src='".$static_url."/images/icons/plaatsnummerdrie.png'>";
                    } else if ($voortgang > '3' && $voortgang <= '10') {
                        $medaille = "<img src='".$static_url."/images/icons/gold_medaille.png'>"; 
                    } else if ($voortgang > '10' && $voortgang <= '30') {
                        $medaille = "<img src='".$static_url."/images/icons/silver_medaille.png'>";
                    } else if ($voortgang > '30' && $voortgang <= '50') {
                        $medaille = "<img src='".$static_url."/images/icons/bronze_medaille.png'>";
                    } else if ($q['admin'] >= 1) {
                        $number = '';
                        $medaille = "<b><font color='red'>".$txt['friends_add_admin']."</font></b>";
                    }
                            
                    if (($q['online'] + 900) > time()) {
                        $plaatje = '<img src="'.$static_url.'/images/icons/status_online.png" title="'.$txt['online'].'">';
                    } else {
                        $plaatje = '<img src="'.$static_url.'/images/icons/status_offline.png" title="'.$txt['offline'].'">';
                    }  

                    $is_friend = $friends->isFriend(($_SESSION['id'] ?? ''), $q['user_id']);

                    if ($is_friend) {
                        $is_accept = $friends->isAccept(($_SESSION['id'] ?? ''), $q['user_id']);
                        if ($is_accept) {
                            $btn = $txt['friends_add_already_friends'];
                        } else {
                            $btn = $txt['friends_add_waiting'];
                        }
                    } else {
                        $btn = '<form method="post"><input type="hidden" name="player" value="'.$q['user_id'].'"><button class="btn">'.$txt['friends_add_add_btn'].'</button></form>';
                    }

                    echo '<tr><td><a href="./profile&player='.$q['username'].'">'.$q['username'].'</a></td><td>'.sprintf($txt['friends_add_days'], $q['antiguidade']).'</td><td>'.$q['ultimo_login'].'</td><td style="font-size: 14px">'.$number.' '.$medaille.'</td><td>'.$plaatje.'</td><td>'.$btn.'</td></tr>';
                }
            ?>
        </tbody>
        <?php
		    $base_url = getUrl('/&subpage=[0-9]/');
            if ($aantal_paginas > 1) {
                $links = false;
                $rechts = false;
                echo '<tfoot>';
                echo '<td align="center" colspan="6"><div class="sabrosus">';
                if ($subpage == 1)	echo '<span class="disabled">&laquo;</span>';
                else {
                    $back = $subpage-1;
                    echo '<a href="'.$base_url.'&subpage='.$back.'">&laquo;</a>';
                }
                for($i=1;$i<=$aantal_paginas;++$i) {
                    if (3 >= $i && $subpage == $i)	echo '<span class="current">'.$i.'</span>';
                    else if (3 >= $i && $subpage != $i)	echo '<a href="'.$base_url.'&subpage='.$i.'">'.$i.'</a>';
                    else if ($aantal_paginas-2 < $i && $subpage == $i)	echo '<span class="current">'.$i.'</span>';
                    else if ($aantal_paginas-2 < $i && $subpage != $i)	echo '<a href="'.$base_url.'&subpage='.$i.'">'.$i.'</a>';
                    else {
                        $max = $subpage + 3;
                        $min = $subpage -3;  
                        if ($page == $i)	echo '<span class="current">'.$i.'</span>';
                        else if ($min < $i && $max > $i)	echo '<a href="'.$base_url.'&subpage='.$i.'">'.$i.'</a>';
                        else {
                            if ($i < $subpage) {
                                if (!$links) {
                                    echo '...';
                                    $links = true;
                                }
                            } else {
                                if (!$rechts) {
                                    echo '...';
                                    $rechts = true;
                                }
                            }
                        }
                    }
                } 
                if ($aantal_paginas == $subpage) echo '<span class="disabled">&raquo;</span>';
                else {
                    $next = $subpage+1;
                    echo '<a href="'.$base_url.'&subpage='.$next.'">&raquo;</a>';
                }
                echo '</div></td></tfoot>';
            }
    ?>
    </table>
</div>

<?php } ?>

<script>
    function search () {
        let name = $('input[name="name"]').val();

        if (name != '') {
            let url = '<?=getUrl('/(&like=[true-false]+)/', '/(&name=[A-z]+)/', '/&subpage=[0-9]/')?>';

            if ($('input[name="like"]').is(':checked')) {
                window.location = url+'&name='+name+'&like=true';
            } else {
                window.location = url+'&name='+name;
            }
        }
    }
</script>