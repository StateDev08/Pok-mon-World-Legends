<?php
	######################## Rank up ###################
	$txt['event_rank_up'] = 'Sie sind im Rang aufgestiegen, Ihr neuer Rang ist: <b>%s</b>.';
	$txt['event_rank_up_refferal'] = 'Deine Empfehlung, %s, ist ein Rang, den du hier erhalten hast, um 15 Gold zu gewinnen!';
	######################## Evolve ####################
	$txt['event_is_evolved_in'] = '<b>%s</b> hat sich zu <b>%s</b> entwickelt!';
	######################## Level up ##################
	$txt['event_is_level_up'] = '<b>%s</b> hat das nächste Level erreicht!';
	
	######################## Work ######################
	if ($page == 'work' OR $workvs) {
		$txt['event_work_1_1'] = 'Sie haben die maximale verkaufte Anzahl überschritten! Du hast <img src=" gewonnen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower"> 15!';
		$txt['event_work_1_2_1'] = 'Du hast gewonnen';
		$txt['event_work_1_2_2'] = 'Silber verkauft Limonade.';
		$txt['event_work_1_3'] = 'Du hast keine Limonade verkauft.';
		$txt['event_work_1_4'] = 'Deine Limonade war schrecklich.';
		
		$txt['event_work_2_1'] = 'Sie haben 1 Minute lang auf dem Markt gearbeitet und gewonnen. <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_2_2'] = 'Sie haben den Markt nicht gefunden.';
		$txt['event_work_2_3'] = 'Du bist die ganze Zeit herumgelaufen, du hast nichts verdient.';
		$txt['event_work_2_4'] = 'Sie sind verhaftet, weil Sie versucht haben, etwas zu stehlen.';
		
		$txt['event_work_3_1'] = 'Sie haben alle Dokumente eingereicht, Sie haben gewonnen <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_3_2'] = 'Sie haben alle Dokumente eingereicht, Sie haben gewonnen <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_3_3'] = 'Sie konnten nicht alle Dokumente zustellen.';
		$txt['event_work_3_4'] = 'Es regnet! Du liebst die Kälte, oder? Du bist zu faul zum Arbeiten.';
		
		$txt['event_work_4_1'] = 'Du hast das Pokémon-Center geräumt und <img src=" gewonnen.' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_4_2'] = 'Du hast das Pokémon-Center nicht richtig gereinigt.';
		$txt['event_work_4_3'] = 'Chansey ist mit deiner Faulheit nicht zufrieden, du verdienst nichts!';
		
		$txt['event_work_5_1'] = 'Du hast das Golfspiel gegen Team Rocket gewonnen! Du hast <img src=" gewonnen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_5_2'] = 'Du hast das Golfspiel gegen Team Rocket verloren.';
		$txt['event_work_5_3'] = 'Du hast das Golfspiel gegen Team Rocket knapp verloren.';
		
		$txt['event_work_6_1'] = 'WOW! Du hast eine goldene Uhr gefunden und sie für <img src=" verkauft' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_6_2'] = 'Du hattest Glück und hast ein Relikt gefunden, das du für <img src=" verkauft hast' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_6_3'] = 'Du hast nichts Wertvolles gefunden.';
		$txt['event_work_6_4'] = 'Du hast nur eine alte Zeitung gefunden.';
		
		$txt['event_work_7_1'] = 'Deine Pokémon-Demonstration war ein Erfolg! Du hast <img src=" gewonnen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_7_2'] = 'Niemandem hat Ihre Demonstration gefallen.';
		$txt['event_work_7_3'] = 'Es regnete, niemand blieb stehen, um seiner Demonstration zuzusehen.';
		
		$txt['event_work_8_1'] = 'Das Experiment war ein Erfolg! Du hast <img src=" gewonnen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_8_2'] = 'Das Experiment hat nicht funktioniert.';
		$txt['event_work_8_3'] = 'Dein Pokémon konnte nicht am Experiment teilnehmen, du hast nichts gewonnen.';
		
		$txt['event_work_9_1'] = 'WOW! Du hast viele Silbermedaillen gewonnen, <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_2'] = 'Es war nicht sehr interessant, du hast gewonnen <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_3'] = 'Ihre kostenlose Demo war ein Erfolg, Sie haben gewonnen <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_9_4'] = 'Sein Pokémon war sehr müde.';
		$txt['event_work_9_5'] = 'Es regnete, niemand blieb stehen, um seiner Demonstration zuzusehen.';
		
		$txt['event_work_10_1'] = 'Erfolg! Du hast geholfen, Team Rocket zu erobern, du hast gewonnen <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_10_2'] = 'Du hast Team Rocket nicht gefunden.';
		$txt['event_work_10_3'] = 'Du hast es geschafft, Team Rocket zu fangen, aber ihnen ist die Flucht gelungen.';
		
		$txt['event_work_11_1'] = 'Erfolg! Dein Pokémon hat jede Menge Silber, <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_11_2'] = 'Dein Pokémon hat es für dich besorgt <img src="' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_11_3'] = 'Dein Pokémon ist gelb geworden.';
		$txt['event_work_11_4'] = 'Sie hatten keine Möglichkeit, Silber zu verdienen.';
		$txt['event_work_11_5'] = 'Sie wurden von Officer Jenny verhaftet.';
		
		$txt['event_work_12_1'] = 'Du hast 2 Tüten Silber aus dem Casino gestohlen! Du hast <img src=" gewonnen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_12_2_1'] = 'Du hast <img src=" gestohlen' . $static_url . '/images/icons/silver.png" width="16" height="16" alt="Silver" class="imglower">';
		$txt['event_work_12_2_2'] = 'des Casinos.';
		$txt['event_work_12_3'] = 'Dein Pokémon hatte zu viel Angst, um das Casino auszurauben.';
		$txt['event_work_12_4'] = 'Der Casino-Alarm wurde ausgelöst, Sie mussten rennen.';
		$txt['event_work_12_5'] = 'Sie wurden von Officer Jenny verhaftet.';
		
		$txt['event_jail_1'] = 'Du bist jetzt';
		$txt['event_jail_2'] = 'Minuten und';
		$txt['event_jail_3'] = 'Sekunden im Gefängnis.';
	}

	######################## Bank ######################
	if ($page == 'bank') {
		$txt['event_gave_you'] = 'an Sie gesendet';
	}
	
	####################### Steal ######################
	else if ($page == 'steal') {
		$txt['event_steal_failed'] = 'Er hat versucht, dich zu sabotieren, aber du warst stärker.';
		$txt['event_steal_jail'] = 'ging ins Gefängnis, weil er versucht hat, dich zu sabotieren.';
		$txt['event_success_stole_1'] = 'hat dich sabotiert und bekommen';
		$txt['event_success_stole_2'] = 'weil ihre Pokémon stärker waren.';
	}
	
	###################### Jail ########################
	else if ($page == 'jail') {
		$txt['event_bust'] = 'Du wurdest verhaftet.';
		$txt['event_bought'] = 'Du hast dir den Ausweg erkauft';
	}

	######################## Race ######################
	else if ($page == 'race') {
		$txt['event_race_denied'] = 'Der Antrag auf ein Rennen wurde abgelehnt.';
		
		$txt['event_race_won_your'] = 'Du hast das Rennen gewonnen! Dein';
		$txt['event_finished_in'] = 'endete in';
		$txt['event_sec_the'] = 'Sek., die';
		$txt['event_from'] = 'von';
		$txt['event_hit_tree_ko'] = 'Er prallte gegen einen Baum und wurde ohnmächtig.';
		$txt['event_sec'] = 'Sek.';
		$txt['event_race_lost_your'] = 'Du hast das Rennen verloren! Dein';
		$txt['event_the'] = 'DER';
		$txt['event_race_draw_your'] = 'Nehmen Sie am Rennen teil! Dein';
		$txt['event_and_the'] = 'und die';
		$txt['event_hit_both_tree'] = 'Beide prallten gegen einen Baum und wurden ohnmächtig.';
		$txt['event_finished_both_in'] = 'Beide endeten mit';
	}
	
	######################## Race invite ########################
	else if ($page == 'race-invite') {
		$txt['event_want_race'] = 'will gegen dich antreten';
		$txt['event_accept'] = 'Akzeptieren';
		$txt['event_deny'] = 'Verweigern';
	}
	
	####################### Transferlist ########################
	else if ($page == 'transferlist-box') {
		$txt['event_bought_your'] = 'er kaufte';
		$txt['event_for'] = 'setzen';
		$txt['event_silver_from_tf'] = 'Silbermünzen auf dem Pokémon-Markt.';
	}
	else if ($page == 'register') {
		$txt['refferal_register'] = '%s hat sich erfolgreich registriert! Aus diesem Grund erhalten Sie 5 Goldmedaillen!';
	}
?>