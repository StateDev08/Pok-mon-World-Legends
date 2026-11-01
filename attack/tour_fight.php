<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';

if (isset($_POST['here'])) {
  //Check alive pokemon.
  if (DB::exQuery("SELECT id FROM pokemon_speler WHERE user_id='".($_SESSION['id'] ?? '')."' AND `opzak`='ja' AND leven>'0'")->num_rows == 0)
    echo $txt['tour_no_pokemon'];
  else{
    //Include Duel Functions
    include_once('duel/duel-start.php');
    
    $excist_sql = DB::exQuery("SELECT id FROM duel WHERE uitdager='".($_SESSION['naam'] ?? '')."' OR tegenstander='".($_SESSION['naam'] ?? '')."'");
    if ($excist_sql->num_rows == 0) {
      if ($round_info['user_id_1'] == ($_SESSION['id'] ?? '')) {
        $t = DB::exQuery("SELECT username, `character` FROM gebruikers WHERE user_id='".$round_info['user_id_2']."'")->fetch_assoc();
        $u['username'] = $gebruiker['username'];
        $u['character'] = $gebruiker['character'];
        $wat = 'uitdager';
        $starter = $u['username'];
      }
      else{
        $u = DB::exQuery("SELECT username, `character` FROM gebruikers WHERE user_id='".$round_info['user_id_1']."'")->fetch_assoc();
        $t['username'] = $gebruiker['username'];
        $t['character'] = $gebruiker['character'];
        $wat = 'tegenstander';
        $starter = $u['username'];
      }
      $date = date("Y-m-d H:i:s");
      $time = strtotime($date);
      $duel_id = duel_create($u['username'], $t['username'], $u['character'], $t['character'], 0, 'wait', $time, $starter, $round_info['ronde'] ?? 0);
      $_SESSION['duel']['duel_id'] = $duel_id;
      
      //Start Duel
      //Clear Player
      DB::exQuery("DELETE FROM `pokemon_speler_gevecht` WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
      //Update Player as Duel
      DB::exQuery("UPDATE `gebruikers` SET `pagina`='duel' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
      //Copy Pokemon
      $count = 0;
      //Spelers van de pokemon laden die hij opzak heeft
      $pokemonopzaksql = DB::exQuery("SELECT * FROM pokemon_speler WHERE user_id='".($_SESSION['id'] ?? '')."' AND `opzak`='ja' ORDER BY opzak_nummer ASC");
      //Nieuwe stats berekenen aan de hand van karakter, en opslaan
      while($pokemonopzak = $pokemonopzaksql->fetch_assoc()) {
        //Alle gegevens opslaan, incl nieuwe stats
        pokemon_speler_gevecht_copy($pokemonopzak, -1, $excist['id']);  
      }
      ?>
        <span id="status"><?= $txt['tour_wait'] ?></span>
        <script type="text/javascript">
        var t
        function status_check() {
          $.get("attack/tour_ready.php?duel_id="+<?php echo $duel_id; ?>+"&sid="+Math.random(), function(data) {
            if (data == 0) {
              $("#status").append(".")
              t = setTimeout(function () { status_check(); }, 2000)
            } 
            else if (data == 1) {
              clearTimeout(t) 
              setTimeout(function () { location.href = document.baseURI + 'attack/duel/duel-attack' }, 0)
            }
            else if (data == 2) {
              clearTimeout(t) 
              $("#status").append("<?= addslashes($txt['tour_opponent_no_answer']) ?>")
            }
            else{
              $("#status").append("...")
              t = setTimeout(function () { status_check(); }, 2000)
            }
          });
        }
        $("#status").html("<?= addslashes($txt['tour_loading']) ?>")
        status_check()
        </script>
      <?php
    }
    else{
      $excist = $excist_sql->fetch_assoc();
      if (($_SESSION['id'] ?? '') == $round_info['user_id_1']) $wat = 'u';
      else $wat = 't';
      $_SESSION['duel']['duel_id'] = $excist['id'];
      //Clear Player
      DB::exQuery("DELETE FROM `pokemon_speler_gevecht` WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
      //Update Player as Duel
      DB::exQuery("UPDATE `gebruikers` SET `pagina`='duel' WHERE `user_id`='".($_SESSION['id'] ?? '')."'");
      //Copy Pokemon
      $count = 0;
      //Spelers van de pokemon laden die hij opzak heeft
      $pokemonopzaksql = DB::exQuery("SELECT * FROM pokemon_speler WHERE user_id='".($_SESSION['id'] ?? '')."' AND `opzak`='ja' ORDER BY opzak_nummer ASC");
      //Nieuwe stats berekenen aan de hand van karakter, en opslaan
      while($pokemonopzak = $pokemonopzaksql->fetch_assoc()) {
        //Alle gegevens opslaan, incl nieuwe stats
        pokemon_speler_gevecht_copy($pokemonopzak, -1, $excist['id']);
        if (($count == 0) AND ($pokemonopzak['leven'] > 0) AND ($pokemonopzak['ei'] == 0)) {
          $count++;
          DB::exQuery("UPDATE `duel` SET `".$wat."_pokemonid`='".$pokemonopzak['id']."', `".$wat."_used_id`=',".$pokemonopzak['id'].",' WHERE `id`='".$excist['id']."'");
        }  
      }
      
      $_SESSION['duel']['begin_zien'] = true;
      game_redirect_header("Location: ./attack/duel/duel-attack");
    }
  }
}
else{
  /*
  
  
  Daarna stappen doorlopen zoals dat met duel ook gebeurd
  */
  echo '
    <form method="post"><center>' . $txt['tour_started'] . '</center><br />
    <center>  <input type="submit" name="here" value="' . $txt['tour_battle_btn'] . '"></center>
    </form>';
}
?>