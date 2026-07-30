<?php
#Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");

$silver_icon = $static_url.'/images/icons/silver.png';
echo addNPCBox(13, $txt['fishing_title'], sprintf($txt['fishing_npc_text'], $silver_icon, $silver_icon, $silver_icon))
?>
<div class="red"><?=$txt['fishing_reset_notice']?></div>

<?php
// if ($gebruiker['admin'] == 3) $gebruiker['last_fishing'] = 0;

if (($_POST['fish'] ?? '') != "") {
	if ($gebruiker['last_fishing'] + (60 * 10) > time()) {
		$wait = ceil((($gebruiker['last_fishing'] + (60 * 10)) - time()) / 60);
		echo '<div class="red">'.sprintf($txt['fishing_wait'], $wait).'</div>';
		$error = 1;
	}
	if (($_POST['rod'] ?? '') == "1") {
		$item = DB::exQuery("SELECT * FROM `gebruikers_item` WHERE `user_id`='".$_SESSION['id']."' AND `Fishing rod`='1'")->fetch_assoc();
		$type = "Fishing Rod";
	}

	if (($_POST['rod'] ?? '') == "" || $item['Fishing rod'] == 0) {
		echo '<div class="red">'.$txt['fishing_no_rod'].'</div>';
		$error = 1;
	}

	if ($item['Fishing rod'] == 0) {
		echo "<div class='red'>".sprintf($txt['fishing_no_type'], $type)."</div>";
		$error = 1;
	}

	if ($error != 1) {
		$op1 = "Water";
		$op2 = "Ice";

		$swappah = DB::exQuery("SELECT * FROM `pokemon_wild` WHERE (`type1` = '{$op1}' OR `type1` = '{$op2}') OR (`type2`='{$op1}' OR `type2`='{$op2}') ORDER BY RAND() LIMIT 1")->fetch_object();
		$total = $swappah->hp_base + $swappah->attack_base + $swappah->defence_base + $swappah->speed_base;
		$total = $total * 73;
		$points = rand(1, $total);

		$quests->setStatus('fishing', $_SESSION['id']);
		DB::exQuery("UPDATE `gebruikers` SET `fishing` = `fishing` + '{$points}', `last_fishing` = UNIX_TIMESTAMP() WHERE `user_id` = '{$_SESSION['id']}'");

		echo "<table class='general box-content' width='100%' style='margin-bottom: 7px' align='center'><thead><tr><th>".sprintf($txt['fishing_caught'], $type, $swappah->naam)."</th></tr></thead><tr>";
			echo "<td><center><img src='{$static_url}/images/pokemon/".$swappah->wild_id.".gif'></center><br><br><center>".sprintf($txt['fishing_points'], number_format($points, 0, ',', '.'))."</center></td>";
		echo "</tr></table>";

	}
}
?>

<form method="post">
<div class="box-content" style="position: relative; margin-bottom: 7px"><table class="general" width="100%">
	<thead><tr><th><?=$txt['fishing_title2']?></th></tr></thead>
	<tbody><tr>
		<td align="center">
			<?php if ($gebruiker['Fishing rod'] == 1) { ?>
				<div class="greyborder">
				<table style="width:120px; height: 90px">
					<tbody><tr><td align="center">
						<img src="<?= $static_url;?>/images/items/Fishing rod.png">
					</td></tr>
					<tr><td align="center"><span class="smalltext"><?=$txt['fishing_rod']?></span></td></tr>
					<tr><td align="center"><input type="radio" name="rod" value="1" <?php if ($gebruiker['Fishing rod'] == 1) { ?>checked<?php } else { ?> disabled <?php } ?>></td></tr>
				</tbody></table>
			</div>
			<?php } else {  ?>
				<div class="red"><?=$txt['fishing_no_rod2']?></div>
			<?php } ?>
		</td>
	</tr></tbody>
	<?php if ($gebruiker['Fishing rod'] == 1) { 
		if (($gebruiker['last_fishing'] + (60 * 10)) >= time()) { 
		$wait = ceil((($gebruiker['last_fishing'] + (60 * 10)) - time()) / 60); ?>
		<tfoot><tr><td align="center"><b><p style="margin: 6px"><?=sprintf($txt['fishing_wait2'], $wait)?></p></b></td></tr></tfoot>
	<?php } else { ?>
		<tfoot><tr><td align="center"><input type="submit" name="fish" value="<?=$txt['fishing_fish_btn']?>" class="button" style="margin: 6px"></td></tr></tfoot>
	<?php }} ?>
</table></div>
</form>

<div>
	<div class="box-content" style="display: inline-block; width: 50%;"><table class="general" width="100%">
			<thead><tr><th colspan="3"><?=$txt['fishing_best_day']?></th></tr>
			<tr>
				<th width="20"><b>#</b></th>
				<th><b><?=$txt['fishing_trainer']?></b></th>
				<th><b><?=$txt['fishing_points_label']?></b></th>
			</tr></thead>
			<?php
            $profiles1=DB::exQuery("SELECT username,user_id,fishing FROM `gebruikers` WHERE `banned` != 'Y' ORDER BY `fishing` DESC LIMIT 3");
			$i = 0;
			while($profiles=$profiles1->fetch_object()) {

				$i++;
				$r = $i . '.';
				?>
				<tr><td><?= $r?></td><td><a href="./profile&player=<?= $profiles->username?>"><?= GetColorName($profiles->user_id)?></a></td><td><?= number_format($profiles->fishing)?> <?=$txt['fishing_points_label']?></td></tr>
				<?php
			}
			?>

		</table></div>
	<div class="box-content" style="display: inline-block; width: 49.5%;"><table class="general" width="100%">
			<thead><tr><th colspan="2"><?=$txt['fishing_best_yesterday']?></th></tr>
			<tr>
				<th width="20"><b>#</b></th>
				<th><b><?=$txt['fishing_trainer']?></b></th>
			</tr></thead>

			<?php

			$checknumber1 = DB::exQuery("SELECT * FROM `fishs` WHERE `id`='1'");
			$checknumber = $checknumber1->fetch_object();

			$lastwin11 = DB::exQuery("SELECT username,user_id FROM `gebruikers` WHERE `user_id`='$checknumber->fish'");
			$lastwin1 = $lastwin11->fetch_object();
			$lastwin12 = DB::exQuery("SELECT username,user_id FROM `gebruikers` WHERE `user_id`='$checknumber->fish2'");
			$lastwin2 = $lastwin12->fetch_object();
			$lastwin13 = DB::exQuery("SELECT username,user_id FROM `gebruikers` WHERE `user_id`='$checknumber->fish3'");
			$lastwin3 = $lastwin13->fetch_object();

			if ($lastwin1) echo "<tr><td>1.</td><td><a href='./profile&player=".$lastwin1->username."'>".GetColorName($lastwin1->user_id)."</a></td></tr>";

			if ($lastwin2) echo "<tr><td>2.</td><td><a href='./profile&player=".$lastwin2->username."'>".GetColorName($lastwin2->user_id)."</a></td></tr>";

			if ($lastwin3) echo "<tr><td>3.</td><td><a href='./profile&player=".$lastwin3->username."'>".GetColorName($lastwin3->user_id)."</a></td></tr>";

			?>

		</table></div>
</div>
