<?php
require_once 'app/includes/resources/config.php';
require_once 'app/includes/resources/ingame.inc.php';

$map = (int) ($_GET['map'] ?? '');
$uid = ($_SESSION['id'] ?? '');

$result = DB::exQuery("SELECT * FROM `gebruikers` WHERE `acc_id`='$_SESSION[acc_id]' AND `user_id`='$uid'");
		$gebruiker = $result->fetch_assoc();
		
$li = 6;
if ($gebruiker['admin'] >= 3) {
    if (isset($_GET['li']) && ctype_digit(($_GET['li'] ?? ''))) {
        $li += ($_GET['li'] ?? '');
    }
}
		
// $server = DB::exQuery("SELECT lendario FROM servers WHERE `id`='" . $gebruiker['server'] . "'")->fetch_assoc();

$x = (int) ($_GET['x'] ?? '');
$x = $x < 0 || $x > 25 ? 3 : $x;

$y = (int) ($_GET['y'] ?? '');
$y = $y < 0 || $y > 35 ? 3 : $y;

$time = time();
		
// break;

DB::exQuery("UPDATE `gebruikers` SET `map_num`='".$map."', `map_x`='".$x."', `map_y`='".$y."', `map_lastseen`='".$time."',`captcha_time`='{$time}' WHERE `user_id`='".$uid."'");

$random = rand(1,10);
// $random = 1;

if($gebruiker['admin'] > 1) $Saffari = "Aberto";
if($random <= 8) {
	if(!empty($Saffari)){

		$zeldzaam = rand(1, (10000+$li));
		if($zeldzaam <= 8500) $zeldzaamheid = 1;
		elseif($zeldzaam <= 9800) $zeldzaamheid = 2;
		elseif($zeldzaam <= 9998) $zeldzaamheid = 3;
		elseif($zeldzaam <= 9999) $zeldzaamheid = 4;
		else $zeldzaamheid = 5;

		if($map == 1) $gebied = 'Gras';
		elseif($map == 2) $gebied = 'Water';
		elseif($map == 3) $gebied = 'Grot';
		elseif($map == 4) $gebied = 'Spookhuis';
		elseif($map == 5) $gebied = 'Lavagrot';
		elseif($map == 6) $gebied = 'Strand';
		elseif($map == 7) $gebied = 'Vechtschool';
		
		// break;
	

		if($trainer == 1){
			$json = array('trainer'=>$trainer);
			echo json_encode($json);
		}else{
			if (($gebruiker['rank'] > 15) && (!empty($gebruiker['lvl_choose']))) {
				$level = explode("-", $gebruiker['lvl_choose']);
				$pokelevel = rand($level[0], $level[1]);
			} else {
				$pokelevel = rankpokemon($gebruiker['rank']);
			}

			$query2 = DB::exQuery("SELECT `naam`, `wild_id` FROM `pokemon_wild` WHERE `gebied`='".$gebied."' AND `zeldzaamheid`='".$zeldzaamheid."' AND `aparece`='sim' ORDER BY RAND() LIMIT 1")->fetch_assoc();

			$wild_id = $query2['wild_id'];
			$randomPokemon = $query2['naam'];
			$randomLevel = $pokelevel;
			
			if($zeldzaamheid == 3){
				$event = 'O jogador '.($_SESSION['naam'] ?? '').' encontrou um(a) '.$query2['naam'].'('.$query2['wild_id'].').';
				DB::exQuery("INSERT INTO `legendary_logs` (`acc_id`,`username`,`msg`) 
					VALUES ('".($_SESSION['acc_id'] ?? '')."','".($_SESSION['naam'] ?? '')."','".$event."')"); 
			}
					
			$levelenquery = DB::exQuery("SELECT * FROM `levelen` WHERE `wild_id`='".$wild_id."' AND `level`<='".$randomLevel."' AND wat='evo' LIMIT 1");
			$groei = $levelenquery->fetch_array();
			if($randomLevel >= $groei['level']){
				if($groei['wat'] == "evo"){
					$evo = DB::exQuery("SELECT * FROM `pokemon_wild` WHERE `wild_id`='".$groei['nieuw_id']."'")->fetch_array();
					$levelenquery2 = DB::exQuery("SELECT * FROM `levelen` WHERE `wild_id`='".$evo['wild_id']."' AND `level`<='".$randomLevel."' AND wat='evo' LIMIT 1");
					$groei2 = $levelenquery2->fetch_array();
					if($groei2['wat'] == "evo"){
						$evo2 = DB::exQuery("SELECT * FROM `pokemon_wild` WHERE `wild_id`='".$groei2['nieuw_id']."'")->fetch_array();
						$new_wild_id = $groei2['nieuw_id'];
						if($zeldzaamheid >= 4)	$new_wild_name = '<font style="text-shadow: 0 0 0.4em #000, 0 0 0.4em #000;color: #560202;">'.$evo2['naam'].'</font>';
						else $new_wild_name = $evo2['naam'];
					}else{
						$new_wild_id = $groei['nieuw_id'];
						if($zeldzaamheid >= 4)	$new_wild_name = '<font style="text-shadow: 0 0 0.4em #000, 0 0 0.4em #000;color: #560202;">'.$evo['naam'].'</font>';
						else $new_wild_name = $evo['naam'];
					}
				}else{
					$new_wild_id = $wild_id;
					if($zeldzaamheid >= 4)	$new_wild_name = '<font style="text-shadow: 0 0 0.4em #000, 0 0 0.4em #000;color: #560202;">'.$randomPokemon.'</font>';
					else $new_wild_name = $randomPokemon;
				}
			}
				
			$query = DB::exQuery("SELECT * FROM `pokemon_wild` WHERE `wild_id`='".$wild_id."' LIMIT 1");
			if ($query->num_rows == 1) {
				$json = array('name'=>$new_wild_name, 'id'=>$new_wild_id, 'level'=>$randomLevel);
				echo json_encode($json);
			} else {
				$where = rand(1,12);
				if ($where == "1"){$whereone = $txt['map_search_1'];}
				if ($where == "2"){$whereone = $txt['map_search_2'];}
				if ($where == "3"){$whereone = $txt['map_search_3'];}
				if ($where == "4"){$whereone = $txt['map_search_4'];}
				if ($where == "5"){$whereone = $txt['map_search_5'];}
				if ($where == "6"){$whereone = $txt['map_search_6'];}
				if ($where == "7"){$whereone = $txt['map_search_7'];}
				if ($where == "8"){$whereone = $txt['map_search_8'];}
				if ($where == "9"){$whereone = $txt['map_search_9'];}
				if ($where == "10"){$whereone = $txt['map_search_10'];}
				if ($where == "11"){$whereone = $txt['map_search_11'];}
				if ($where == "12"){$whereone = $txt['map_search_12'];}
				
				$json = array('msg'=>$whereone);
				echo json_encode($json);
			}
		}

	
	} else{
		$whereone = $txt['map_safari_closed'];
			
		$json = array('msg'=>$whereone);
		echo json_encode($json);
	}
} else { 
	$where = rand(1,12);
	if ($where == "1"){$whereone = $txt['map_search_1'];}
	if ($where == "2"){$whereone = $txt['map_search_2'];}
	if ($where == "3"){$whereone = $txt['map_search_3'];}
	if ($where == "4"){$whereone = $txt['map_search_4'];}
	if ($where == "5"){$whereone = $txt['map_search_5'];}
	if ($where == "6"){$whereone = $txt['map_search_6'];}
	if ($where == "7"){$whereone = $txt['map_search_7'];}
	if ($where == "8"){$whereone = $txt['map_search_8'];}
	if ($where == "9"){$whereone = $txt['map_search_9'];}
	if ($where == "10"){$whereone = $txt['map_search_10'];}
	if ($where == "11"){$whereone = $txt['map_search_11'];}
	if ($where == "12"){$whereone = $txt['map_search_12'];}
	
	$json = array('msg'=>$whereone);
	echo json_encode($json);
}

//SECURITY
if($new_wild_id && $randomLevel > 0){
	DB::exQuery("UPDATE `gebruikers` SET `map_wild`='".$new_wild_id."', `pokemon_level`='".$randomLevel."' WHERE `user_id`='".$uid."'");
} else {
	DB::exQuery("UPDATE `gebruikers` SET `map_wild`='0' WHERE `user_id`='".$uid."'");
}


?>