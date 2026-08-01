<?php
include("app/includes/resources/security.php");

echo addNPCBox(36, $txt['wof_npc_title'], $txt['wof_npc_text']);

$arr = [false, false, false, false, false, false];

if ($gebruiker['item_over'] < 1)
	echo '<center><div class="blue">'.$txt['alert_itemplace'].'</div></center>';

// gemaakt doar Marieke  
if (isset($_POST['draai'])) {
	$getal = rand(0,5);
	//Als geluksrad al gedaan is
	$arr[$getal] = true;
	
	$tent = $gebruiker['geluksrad'];

  if ($gebruiker['geluksrad'] == 0)
    $melding = '<div class="blue">'.$txt['alert_no_more_wof'].'</div>';
  //Is het nog niet gedaan.
  else{
	$quests->setStatus('spin', ($_SESSION['id'] ?? ''));
  	#WIN: 100 silver
  	if ($getal == 0) {
  		$melding = '<div class="green">'.sprintf($txt['wof_won_tickets'], 100).' <img src="'.$static_url.'/images/icons/ticket.png"></div>';
		DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1', tickets=tickets+'100' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		$gebruiker['geluksrad']--;
  	}
  	#WIN: 250 silver
  	else if ($getal == 1) {
  		$melding = '<div class="green">'.sprintf($txt['wof_won_tickets'], 250).' <img src="'.$static_url.'/images/icons/ticket.png"></div>';
		DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1', tickets=tickets+'250' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		$gebruiker['geluksrad']--;
  	}
  	#WIN: Ball
  	else if ($getal == 2) {
      if ($gebruiker['item_over'] > 0) {
        $ball = DB::exQuery("SELECT naam FROM markt WHERE soort = 'balls' AND naam != 'Master ball' AND naam != 'DNA ball' AND naam != 'Santa ball' AND naam != 'Cherish ball' AND naam != 'Antique ball' AND naam != 'Black ball' AND naam != 'Frozen ball' AND naam != 'GS ball' AND naam != 'Trader ball' AND naam != 'Ecology ball' ORDER BY rand() limit 1")->fetch_assoc();
    	$melding = '<div class="green">'.$txt['win_ball'].' '.$ball['naam'].'!</div>';
  		  DB::exQuery("UPDATE gebruikers_item SET `".$ball['naam']."`=`".$ball['naam']."`+'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		  DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		  $gebruiker['geluksrad']--;
		  }
		  else $melding = '<div class="red">'.$txt['alert_itembox_full'].'</div>';
  	}
  	#WIN: Special Item
  	else if ($getal == 3) {
      if ($gebruiker['item_over'] > 0) {
        $specialitem = DB::exQuery("SELECT naam FROM markt WHERE soort = 'special items' and roleta='sim' ORDER BY rand() limit 1")->fetch_assoc();
        $melding = '<div class="green">'.$txt['win_spc_item'].' '.$specialitem['naam'].'!</div>'; 
        DB::exQuery("UPDATE gebruikers_item SET `".$specialitem['naam']."`=`".$specialitem['naam']."`+'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		$gebruiker['geluksrad']--;
      }
      else $melding = '<div class="red">'.$txt['alert_itembox_full'].'</div>';
  	}
    #WIN: Evolutie Stone
  	else if ($getal == 4) {
      if ($gebruiker['item_over'] > 0) {
        $stone = DB::exQuery("SELECT naam FROM markt WHERE soort = 'stones' and roleta='sim' ORDER BY rand() limit 1")->fetch_assoc();
        $melding = '<div class="green">'.$txt['win_stone'].' '.$stone['naam'].'!</div>'; 
        DB::exQuery("UPDATE gebruikers_item SET `".$stone['naam']."`=`".$stone['naam']."`+'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		$gebruiker['geluksrad']--;
      }
      else $melding = '<div class="red">'.$txt['alert_itembox_full'].'</div>';
  	}
	#WIN: 5 gold
  	//  else if ($getal == 7) {
  	//	$melding ='<div class="green">'.$txt['win_5_gold'].'</div>';
	//	DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1', gold=gold+'5' WHERE user_id='".$_SESSION['id']."'");
	//	$gebruiker['geluksrad']--;
  	//}
    #WIN: TM
  	else if ($getal == 5) {
      if ($gebruiker['item_over'] > 0) {
        $tm = DB::exQuery("SELECT naam FROM markt WHERE soort = 'tm' and gold='0' and silver<'60000' and beschikbaar='1' and roleta='sim' ORDER BY rand() limit 1")->fetch_assoc();
        $melding = '<div class="green">'.$txt['win_tm'].' '.$tm['naam'].'!</div>'; 
        DB::exQuery("UPDATE gebruikers_tmhm SET `".$tm['naam']."`=`".$tm['naam']."`+'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		DB::exQuery("UPDATE gebruikers SET geluksrad=geluksrad-'1' WHERE user_id='".($_SESSION['id'] ?? '')."'");
		$gebruiker['geluksrad']--;
      }
      else $melding = '<div class="red">'.$txt['alert_itembox_full'].'</div>';
  	}
	}
}
if (isset($melding) && !empty($melding)) echo $melding;
?>
<link rel="stylesheet" href="<?=$static_url?>/javascripts/easywheel/easywheel.css">
<script src="<?=$static_url?>/javascripts/easywheel/jquery.easywheel.min.js"></script>
<div class="box-content">
  <table class="general" width="100%">
		<thead>
			<tr>
				<th><?=$txt['wof_title']?></th>
			</tr>
		</thead>
		<tbody>    <tr>
			<td>
				<center><?php echo $txt['title_text_1'].' <strong>'.$gebruiker['geluksrad'].'</strong> '.$txt['title_text_2']; ?>
					<?php if ($gebruiker['premiumaccount'] == 0) echo $txt['premiumtext']; ?></center>
			</td>
    </tr>
    <tr> 
		<td>
			<div id="wheel"></div>
			<script>
        $('#wheel').easyWheel({
            items : [
                {
                  name    : '<?=$txt['wof_wheel_100']?>',
                  color   : '#f44336',
				  win	  : '<?=var_export($arr[0])?>'
                },
                {
                  name    : '<?=$txt['wof_wheel_250']?>',
                  color   : '#ffc107',
				  win	  : '<?=var_export($arr[1])?>'
                },
                {
                  name    : '<?=$txt['wof_wheel_ball']?>',
                  color   : '#3498db',
				  win	  : '<?=var_export($arr[2])?>'
                },
                {
                  name    : '<?=$txt['wof_wheel_item']?>',
                  color   : '#f44336',
				  win	    : '<?=var_export($arr[3])?>'
                },
                {
                  name    : '<?=$txt['wof_wheel_stone']?>',
                  color   : '#ffc107',
				  win	  : '<?=var_export($arr[4])?>'
                },
                {
                  name    : '<?=$txt['wof_wheel_tm']?>',
                  color   : '#3498db',
				  win	  : '<?=var_export($arr[5])?>'
                }
            ],
					centerImage: "<?=$static_url?>/images/layout/logo.png",
					selector: 'win',
					selected: 'true',
					easing: "easyWheel",
					rotateCenter: true,
					type: "spin",
					markerAnimation: true,
					centerClass: 0
        });
			<?php
				if (isset($_POST['draai']) && $tent > 0) {
					echo "$('#wheel').easyWheel('start');";
				}
			?>
			</script>
			</td>
    </tr>
		</tbody>
		<tfoot>
      <tr> 
        <td><center><form method="post"><input type="submit" name="draai" value="<?php echo $txt['button']; ?>" class="button" style="margin: 6px"></form></center></td>
      </tr>
		</tfoot>
  </table>        
</div> 