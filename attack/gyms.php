<?php
include('app/includes/resources/security.php');

#Kijken of je wel pokemon bij je hebt
if ($gebruiker['in_hand'] == 0) header('location: index.php');

if ($gebruiker['item_over'] < 1)
	echo '<div class="blue">'.$txt['alert_itemplace'].'</div>';

$gymsql = DB::exQuery("SELECT * FROM trainer WHERE wereld ='".$gebruiker['wereld']."' ORDER BY id ASC");
$trainer = DB::exQuery("SELECT * FROM gebruikers_badges WHERE `user_id`='".($_SESSION['id'] ?? '')."'")->fetch_assoc();

function possible ($rank, $act, $next) {
    if ($rank >= 3 && $act == $next) {
        return true;
    }
    
    return false;
}

if (isset($_POST['submit']) && isset($_POST['gym_leader'])) {
  if ($gebruiker['in_hand'] == 0) {
    echo '<div class="red">'.$txt['no_pokemon'].'</div>';
  } else {
    $gym_info = DB::exQuery("SELECT `rank`, `wereld`, `badge`, `progress` FROM `trainer` WHERE `naam`='".($_POST['gym_leader'] ?? '')."' AND `badge`!=''")->fetch_assoc();
    if (possible($gebruiker['rank'], $gebruiker[$gebruiker['wereld'].'_gym'], $gym_info['progress'])) {
      $pokesvivos = DB::exQuery("SELECT `id` FROM `pokemon_speler` WHERE `user_id`='".($_SESSION['id'] ?? '')."' AND `opzak`='ja' AND `leven`>'0'")->num_rows;  
      if (empty($gym_info['badge']))
        echo "<div class='red'>".$txt['gym_not_gym']."</div>";
      else if ($gebruiker['rank'] < $gym_info['rank'])
        echo "<div class='blue'>".$txt['alert_rank_too_less']."</div>";
      else if ($gebruiker['wereld'] != $gym_info['wereld'])
        echo "<div class='red'>".$txt['alert_wrong_world']."</div>";
      else if ($trainer[$gym_info['badge']] >= 1)
        echo "<div class='blue'>".$txt['alert_gym_finished']."</div>";
      else if ($pokesvivos == 0)          
        echo "<div class='red'>".$txt['alert_no_pokemon']."</div>";
      else{
        include('attack/trainer/trainer-start.php');
        $pokemon_sql->data_seek(0);
        $opzak = $pokemon_sql->num_rows;
        $level = 0;
        while($pokemon = $pokemon_sql->fetch_assoc()) $level += $pokemon['level'];
        $trainer_ave_level = $level/$opzak;
        #Make Fight
        $info5 = create_new_trainer_attack(($_POST['gym_leader'] ?? ''),$trainer_ave_level,($_POST['gebied'] ?? ''));
        if (empty($info5['bericht'])) header("Location: ./gyms");
        else echo '<div class="red"> '.$txt[$info5['bericht']].'</div>';
      }
    } else {
      echo '<div class="red">'.$txt['gym_err_230'].'</div>';
    }
  }
}
echo addNPCBox(11, $txt['gym_npc_title'], $txt['gym_npc_text']);

if ($gebruiker['rank'] < 3) {
?>

<div class="red"><?=$txt['gym_rank_required']?></div>

<?php } ?>
<center>
<style>
	.carousel-cell {
		margin: 10px 10px;
		transform: scale(0.85);
		overflow: hidden;
	}

  .carousel-cell img {
    filter: grayscale(100%);
  }

	.carousel-cell.is-selected {
		transition: 1s;
		transform: scale(1);
	}

  .carousel-cell.is-selected img {
    filter: grayscale(20%) invert(8%);
  }

  .blocked {
    filter: brightness(0%)!important;
  }

  .complete {
    filter: grayscale(20%) invert(8%)!important;
  }
</style>

<div class="box-content" style="display: inline-block; width: 100%;">
	<table class="general" width="100%">
		<thead>
			<tr><th colspan="6"><?=sprintf($txt['gym_region_title'], $gebruiker['wereld'])?></th></tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 100%; padding: 0;">
					<div class="swiper-border" style="width: 100%;">
            <script>
                var $trainer_array_name = [];
                var $badge_array_name = [];
            </script>
						<div class="main-carousel carousel">
            <?php 
            $descr = [];
            $i = 0;
            $next = $gebruiker[$gebruiker['wereld'].'_gym'];

            while($gym = $gymsql->fetch_assoc()) {
              $blocked = '';
              $complete = '';
              $lock = '';
              $name = $gym['naam'];
              $badge = $gym['badge'].' '.$txt['gym_badge_label'];
              if (strpos($gym['badge'], 'Elite') !== false) { 
                $gym['descr'] = sprintf($txt['gym_elite_member'], $name, $gym['wereld']);
                $badge = $gym['badge'];
              }

              if (!possible($gebruiker['rank'], $next, $i) && $trainer[$gym['badge']] == 0) {
                $blocked = 'class="blocked"';
                if ($i > 0) {
                  $gym['descr'] = $txt['gym_blocked_prev'];
                } else {
                  $gym['descr'] = $txt['gym_blocked_rank'];
                }
                $name = '???';
                $badge = '???';
                $lock = '<div style="position: absolute;z-index: 1000; line-height: 170px; text-align: center"><img src="'.$static_url.'/images/icons/avatar/lock.png" style="width: 50%"></div>';
              }

              if ($trainer[$gym['badge']] == 1) {
                $complete = 'class="complete"';
              }              

              if (empty($gym['descr'])) {
                $gym['descr'] = $txt['gym_no_description'];
              }

              array_push($descr, $gym['descr']);
              
              $badge_img = '';
              if (strpos($gym['badge'], 'Elite') === false) $badge_img = '<img src="'.$static_url.'/images/badges/pixel/'.$gym['badge'].'.png" '.$blocked.$complete.' style="right: 16px; width: 27px; top: 25px; position: absolute; z-index: 10" />';
                echo "<div class='carousel-cell' style=\"width: 150px\">".$badge_img.$lock;
                echo "<img src=\"" . $static_url . "/images/trainers/" . $gym['naam'] . ".png\" id=\"trainer_infos\" width=\"150\" height=\"150\" ".$blocked.$complete."/><br>";
                echo "</div>";
            ?>
              <script id="remove">
                $trainer_array_name.push("<?=$name?>");
                $badge_array_name.push("<?=$badge?>");
                document.querySelector('#remove').outerHTML = '';
              </script>
              <?php
              $i++;
            }
            ?>
						</div>
					</div>
          <div style="width: 100%; background: rgba(0, 0, 0, .3); position: relative; bottom: 0; text-align: center; height: 53px; padding-top: 3px; margin-top: -35px; border-bottom-right-radius: 2px;  border-bottom-left-radius: 2px">
            <div style="width: 100%; text-align: center; font-size: 17px; margin-top: 3px">
              <h4 id="trainer_name" style="margin: 0; color: #eee; font-weight: bold;"></h4>
              <span id="badge_name" style="color: #eee; font-size: 13px"></span>
            </div>
          </div>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td align="right">
          <div style="border-radius: 4px; width: 97%; padding: 12px; margin-top: 10px; text-align: justify; height: 130px; font-size: 13px">
            <h3 style="margin: 0;"><b><?=$txt['gym_description_label']?></b></h3><br>
            <p id="text_descr"></p>
          </div>
				</td>
			</tr>
      <tr style="border-top: 1px solid #577599;">
          <td>
            <form method="post" action="./attack/gyms">
                <input type="hidden" id="gym_leader" name="gym_leader" value="">
                <center><input type="submit" name="submit" value="<?=$txt['gym_challenge']?>" id="battle" style="margin: 6px;"></center>
            </form>
          </td>
      </tr>
		</tfoot>
	</table>
</div>
<?php
$js_challenge_btn = addslashes($txt['gym_challenge']);
$js_challenge_trainer = addslashes(sprintf($txt['gym_challenge_trainer'], '{T}'));
$js_win_prev = addslashes($txt['gym_win_prev']);
$js_already_fought = addslashes(sprintf($txt['gym_already_fought'], '{T}'));
$js_up_rank = addslashes($txt['gym_up_rank']);
?>
<script>
  var $carousel = $('.main-carousel');
  var $trainer = $('#trainer_name');
  var $badge = $('#badge_name');
  var $submit = $('#battle');
  var $gym_leader = $('#gym_leader');
  var $next = <?=$next?>;
  var $rank = <?=$gebruiker['rank']?>;

  var $desc = {
  <?php
    for ($i = 0; $i < sizeof($descr); $i++) {
      echo $i.' : '.'"'.$descr[$i].'", ';
    }
  ?>
  };

  $carousel.flickity({
    pageDots: false,
    initialIndex: $next
  });
  
  var flkty = $carousel.data('flickity');

  $carousel.on('select.flickity', function() {
    let frase = $desc[flkty.selectedIndex];
    let trainer = $trainer_array_name[flkty.selectedIndex];
    $('#text_descr').html(frase);

    $trainer.text(trainer);
    $badge.text($badge_array_name[flkty.selectedIndex]);

    if ($rank >= 3) {
      if (flkty.selectedIndex > $next) {
        $submit.attr('disabled', 'disabled');
        $submit.val('<?=$js_win_prev?>');
      } else if (flkty.selectedIndex == $next) {
        $submit.removeAttr('disabled');
        $submit.val('<?=$js_challenge_trainer?>'.replace('{T}', trainer));
        $gym_leader.val(trainer);
      } else {
        $submit.attr('disabled', 'disabled');
        $submit.val('<?=$js_already_fought?>'.replace('{T}', trainer));
      }
    } else {
      $submit.attr('disabled', 'disabled');
      $submit.val('<?=$js_up_rank?>');
    }
  });

  <?php if($gebruiker['rank'] >= 3) { ?>
  if ($next <= (flkty.slides.length - 1)) {
    $submit.removeAttr('disabled');
    $submit.val('<?=$js_challenge_btn?>'+$trainer_array_name[$next]);
    $gym_leader.val($trainer_array_name[$next]);
  } else {
    let next = $next - 1;
    $carousel.flickity( 'select', next );
    $submit.attr('disabled', 'disabled');
    $submit.val('<?=$js_already_fought?>'.replace('{T}', $trainer_array_name[next]));
  }
  
  <?php } else { ?>
  $submit.attr('disabled', 'disabled');
  $submit.val('<?=$js_up_rank?>');
  <?php } ?>

  $('#text_descr').html($desc[$next]);
  $trainer.text($trainer_array_name[$next]);
  $badge.text($badge_array_name[$next]);
    
  wlSound('gyms', (<?=$gebruiker['volume']?>-3), true);
</script>
</center>