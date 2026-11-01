<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
exit;
//Admin controle
if ($gebruiker['admin'] < 3) { game_redirect_header('location: ./home'); exit; }

?>
<center>
  <table width="500" border="0">
    <tr><td><center><?=$txt['adm_reset_intro']?></center></td>
    </tr>
  </table>        
</center> 
<form method="post">
<table width="150" border="0">
	<tr>
	<td><?=$txt['adm_reset_label']?></td>
        <td><input type="radio" name="ontvanger" value="allemaal" onChange=this.form.submit();></td>
    </tr>
</table>	
</form>
<?php

//Als er op de verstuur knop gedrukt word
if (isset($_POST['verstuur'])) {
  //Kijken aan wie het gericht is.
  if (($_POST['ontvanger'] ?? '') == "persoon") {
    //Makkelijk naam toewijzen
    $bericht   = ($_POST['tekst'] ?? '');
    $ontvanger = ($_POST['speler'] ?? '');
    $onderwerp = ($_POST['onderwerp'] ?? '');
    //Als er geen bericht is ingetypt
    if (empty($bericht)) {
      echo '<div class="red"> '.$txt['adm_mail_enter_text'].'</div>';
    }
    //Als er geen ontvanger is ingevuld
    else if (empty($ontvanger)) {
      echo '<div class="red"> '.$txt['adm_choose_someone'].'</div>';
    }
    else if (!preg_match('/[A-Za-z0-9_]+$/',$onderwerp)) {
      echo '<div class="red"> '.$txt['adm_subject_invalid'].'</div>';
    }
    //Als alles is ingevuld het bericht versturen
    else{
      //Als er geen onderwerp is ingevuld een onderwerp toewijzen
      if (empty($onderwerp)) {
        $onderwerp =  "(Geen)";
      } 
      //In de database zetten
      //Tijd opvragen.
      $datum      = date('Y-m-d H:i:s');
      $verstuurd  = date('d-m-y H:i');
      //Spaties weghalen
      DB::exQuery("INSERT INTO `berichten` (`datum`, `ontvanger_id`, `afzender_id`, `bericht`, `onderwerp`, `gelezen`) 
        VALUES ('".$datum."', '".$ontvanger."', '1', '".$bericht."', '".$onderwerp."', '".$verstuurd."', 'nee')");
	  DB::exQuery("Update gebruikers SET geluksrad = 3");
	  DB::exQuery("Update gebruikers SET storten = 10");
	  DB::exQuery("Update gebruikers SET stelen = 1");
      echo '<div class="green"> '.$txt['adm_reset_done'].'</div>';
    }      
  }
  else{
    //Makkelijk naam toewijzen
    $bericht   = ($_POST['tekst'] ?? '');
    $onderwerp = ($_POST['onderwerp'] ?? '');
    //Als er geen bericht is ingetypt
    if (empty($bericht)) {
      echo '<div class="red"> '.$txt['adm_mail_enter_text'].'</div>';
    }
    else if (!preg_match('/[A-Za-z0-9_]+$/',$onderwerp)) {
      echo '<div class="red"> '.$txt['adm_subject_invalid'].'</div>';
    }
    //Als alles is ingevuld het bericht versturen
    else{
      $speler = DB::exQuery("SELECT `user_id` FROM `gebruikers`");
      while($spelers = ($speler)->fetch_assoc()) {
        //Als er geen onderwerp is ingevuld een onderwerp toewijzen
        if (empty($onderwerp)) {
          $onderwerp =  "(Geen)";
        } 
        //In de database zetten
        //Tijd opvragen.
        $datum      = date('Y-m-d H:i:s');
        DB::exQuery("INSERT INTO `berichten` (`datum`, `ontvanger_id`, `afzender_id`, `bericht`, `onderwerp`, `gelezen`) 
          VALUES ('".$datum."', '".$spelers['user_id']."', '1', '".$bericht."', '".$onderwerp."', 'nee')");
		DB::exQuery("Update gebruikers SET geluksrad = 3");
	    DB::exQuery("Update gebruikers SET storten = 10");
	    DB::exQuery("Update gebruikers SET stelen = 1");
      }
    echo '<div class="green">'.$txt['adm_reset_done'].'</div>';
    }
  }

}

//Als er iets gekozen is
if (isset($_POST['ontvanger'])) {
  echo '<form method="post">
  			<table width="600" border="0">';
    if (($_POST['ontvanger'] ?? '') == "persoon") {
      echo '<tr>
				<td>'.$txt['adm_trainer_name'].'</td>
				<td><input type="text" name="speler" class="text_long" value="'.($_POST['speler'] ?? '').'"></td>
			</tr>';
    }
      echo '<tr>
				<td width="110">'.$txt['adm_msg_subject'].'</td>
				<td width="490"><input type="text" name="onderwerp" class="text_long" value="'.$txt['adm_reset_label'].'"></td>
			</tr>
    		<tr>
				<td colspan="2"><textarea style="width:580px;" class="text_area" rows="15"  name="tekst">'.($_POST['tekst'] ?? '').'</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="hidden" value="'.($_POST['ontvanger'] ?? '').'" name="ontvanger">
					<input type="submit" value="'.$txt['adm_reset_btn'].'" name="verstuur" class="button"></td>
			</tr>
		</table>
  		</form>';
}
?>