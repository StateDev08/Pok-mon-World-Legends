<?php
require_once('../includes/resources/config.php');
require_once(__DIR__ . '/../../language/language-user.php');

// DB::exQuery("UPDATE markt SET beschikbaar = '0' WHERE soort = 'pokemon'");

 $sql = DB::exQuery("SELECT markt.id, pokemon_wild.wereld
					FROM markt
					INNER JOIN pokemon_wild
					ON markt.pokemonid = pokemon_wild.wild_id
					WHERE markt.soort = 'pokemon' 
					AND markt.beschikbaar = '0'");
 while($select = $sql->fetch_assoc()) {
  $newinfo = DB::exQuery("SELECT wild_id, naam, type1, zeldzaamheid FROM pokemon_wild WHERE wereld = '".$select['wereld']."' AND evolutie = '1' AND aparece='sim' AND `egg`='1' AND zeldzaamheid <= 5 ORDER BY rand() LIMIT 1")->fetch_assoc();

	if ($newinfo['zeldzaamheid'] == 1) {
		$silver_price = rand(1250, 3500);
		$gold_price = 0;
		$omschrijving_key = 'event_egg_desc_common';
	}
	else if ($newinfo['zeldzaamheid'] == 2) {
		$silver_price = rand(4000, 7300);
		$gold_price = 0;
		$omschrijving_key = 'event_egg_desc_uncommon';
	}
	else if ($newinfo['zeldzaamheid'] == 3) {
		$silver_price = rand(7500, 11000);
		$gold_price = 0;
		$omschrijving_key = 'event_egg_desc_rare';
	}
	else{
		$silver_price = 0;
		$gold_price = rand(200, 423);
		$omschrijving_key = 'event_egg_desc_legendary';
	}

	#De omschrijving in elke taal opslaan, de speler ziet de kolom van zijn eigen taal
	$omschrijving = array();
	foreach (array('pt', 'de', 'en', 'pl', 'ru', 'zh') as $egg_lang) {
		$egg_txt = language_txt('events', $egg_lang);
		$omschrijving[$egg_lang] = DB::real_escape_string(sprintf($egg_txt[$omschrijving_key], $newinfo['type1']));
	}
	$omschrijving['nl'] = $omschrijving['en'];
	$omschrijving['es'] = $omschrijving['pt'];

	#Product opslaan in database
	DB::exQuery("UPDATE markt SET beschikbaar = '1', pokemonid = '".$newinfo['wild_id']."', naam = '".$newinfo['naam']."', silver = '".$silver_price."', gold = '".$gold_price."', omschrijving_nl = '".$omschrijving['nl']."', omschrijving_en = '".$omschrijving['en']."', omschrijving_es = '".$omschrijving['es']."', omschrijving_de = '".$omschrijving['de']."', omschrijving_pl = '".$omschrijving['pl']."', omschrijving_pt = '".$omschrijving['pt']."', omschrijving_ru = '".$omschrijving['ru']."', omschrijving_zh = '".$omschrijving['zh']."' WHERE id = '".$select['id']."'");
 }
  
  #Tijd opslaan van wanneer deze file is uitgevoerd
  $tijd = date("Y-m-d H:i:s");
  DB::exQuery("UPDATE `cron` SET `tijd`='".$tijd."' WHERE `soort`='markt'");
  echo "Cron executado com sucesso.";
?>