<?php
    #include dit script als je de pagina alleen kunt zien als je ingelogd bent.
    include('app/includes/resources/security.php');
     
    #Als je geen pokemon bij je hebt, terug naar index.
    if ($gebruiker['in_hand'] == 0) header('Location: index.php');

    $custo2 = 10000;
    
    //$gebruiker['premiumaccount'] > time() || $gebruiker['admin'] >= 3
if ($gebruiker['rank'] >= 4) {
    if (isset($_POST['juiz']) && isset($_POST['pokemonid'])) {
     
            $pokemoninfo = DB::exQuery("SELECT pokemon_wild.wild_id,pokemon_wild.naam,pokemon_speler.*, pokemon_wild.zeldzaamheid FROM pokemon_speler INNER JOIN pokemon_wild ON pokemon_speler.wild_id = pokemon_wild.wild_id WHERE pokemon_speler.id = '".$_POST['pokemonid']."'")->fetch_assoc();
            $img = pokemonei($pokemoninfo, $txt);
            #Is er geen pokemon gekozen?
            if (empty($_POST['pokemonid'])) echo '<div class="red">'.$txt['juiz_error_no_pokemon'].'</div>';
            else if ($pokemoninfo['ei'] == 1) echo '<div class="red">'.$txt['juiz_error_egg'].'</div>';
            else if ($pokemoninfo['user_id'] != $_SESSION['id']) echo '<div class="red">'.$txt['juiz_error_not_yours'].'</div>';
            else if ($pokemoninfo['opzak'] != 'ja') echo '<div class="red">'.$txt['juiz_error_not_in_team'].'</div>';
            else if ($gebruiker['silver']  < $custo2) echo '<div class="red">'.$txt['juiz_error_no_silver'].'</div>';
            else{
            $analise = "";
     	    $sucesso = true;
    	      DB::exQuery("UPDATE `gebruikers` SET `silver`=`silver`-{$custo2} WHERE `user_id`={$_SESSION['id']} LIMIT 1");
     
     $somatoria = $pokemoninfo['attack_iv'] + $pokemoninfo['defence_iv'] + $pokemoninfo['speed_iv'] + $pokemoninfo['spc.attack_iv'] + $pokemoninfo['spc.defence_iv'] + $pokemoninfo['hp_iv'];

     if ($somatoria >= 0 and $somatoria <= 90) { $potencial = "<font color='red'>".$txt['juiz_potential_decent']."</font>"; }
     else if ($somatoria >= 91 and $somatoria <= 120) { $potencial = "<font color='black'>".$txt['juiz_potential_above_avg']."</font>"; }
     else if ($somatoria >= 121 and $somatoria <= 150) { $potencial = "<font color='green'>".$txt['juiz_potential_superior']."</font>"; }
     else if ($somatoria >= 151 and $somatoria <= 186) { $potencial = "<font color='green'>".$txt['juiz_potential_excellent']."</font>"; }
     
     $analise .= $txt['juiz_i_see']."<br>";
     $analise .= sprintf($txt['juiz_analysis_line'], $pokemoninfo['naam'], ucfirst($pokemoninfo['karakter']), $potencial);
     
   
           
           
             if ($pokemoninfo['attack_iv'] >= $pokemoninfo['defence_iv'] AND $pokemoninfo['attack_iv'] >= $pokemoninfo['speed_iv'] AND $pokemoninfo['attack_iv'] >= $pokemoninfo['spc.attack_iv'] AND $pokemoninfo['attack_iv'] >= $pokemoninfo['spc.defence_iv'] AND $pokemoninfo['attack_iv'] >= $pokemoninfo['hp_iv']) {
              $maiorstats = $txt['juiz_stat_attack'];
              $mr = $pokemoninfo['attack_iv'];
              $aa = 1;
              }
             else if ($pokemoninfo['defence_iv'] >= $pokemoninfo['attack_iv'] AND $pokemoninfo['defence_iv'] >= $pokemoninfo['speed_iv'] AND $pokemoninfo['defence_iv'] >= $pokemoninfo['spc.attack_iv'] AND $pokemoninfo['defence_iv'] >= $pokemoninfo['spc.defence_iv'] AND $pokemoninfo['defence_iv'] >= $pokemoninfo['hp_iv']) {
              $maiorstats = $txt['juiz_stat_defense'];
              $mr = $pokemoninfo['defence_iv'];
              $bb = 1;
              }
               else if ($pokemoninfo['speed_iv'] >= $pokemoninfo['defence_iv'] AND $pokemoninfo['speed_iv'] >= $pokemoninfo['attack_iv'] AND $pokemoninfo['speed_iv'] >= $pokemoninfo['spc.attack_iv'] AND $pokemoninfo['speed_iv'] >= $pokemoninfo['spc.defence_iv'] AND $pokemoninfo['speed_iv'] >= $pokemoninfo['hp_iv']) {
                $maiorstats = $txt['juiz_stat_speed'];
                $mr = $pokemoninfo['speed_iv'];
                $cc = 1;
                }
                else if ($pokemoninfo['spc.attack_iv'] >= $pokemoninfo['defence_iv'] AND $pokemoninfo['spc.attack_iv'] >= $pokemoninfo['speed_iv'] AND $pokemoninfo['spc.attack_iv'] >= $pokemoninfo['attack_iv'] AND $pokemoninfo['spc.attack_iv'] >= $pokemoninfo['spc.defence_iv'] AND $pokemoninfo['spc.attack_iv'] >= $pokemoninfo['hp_iv']) {
                 $maiorstats = $txt['juiz_stat_sp_atk'];
                 $mr = $pokemoninfo['spc.attack_iv'];
                 $dd = 1;
                 }
                 else if ($pokemoninfo['spc.defence_iv'] >= $pokemoninfo['defence_iv'] AND $pokemoninfo['spc.defence_iv'] >= $pokemoninfo['speed_iv'] AND $pokemoninfo['spc.defence_iv'] >= $pokemoninfo['spc.attack_iv'] AND $pokemoninfo['spc.defence_iv'] >= $pokemoninfo['attack_iv'] AND $pokemoninfo['spc.defence_iv'] >= $pokemoninfo['hp_iv']) {
                 $maiorstats = $txt['juiz_stat_sp_def'];
                 $mr = $pokemoninfo['spc.defence_iv'];
                 $ee = 1;
                             }
                 else if ($pokemoninfo['hp_iv'] >= $pokemoninfo['attack_iv'] AND $pokemoninfo['hp_iv'] >= $pokemoninfo['defence_iv'] AND $pokemoninfo['hp_iv'] >= $pokemoninfo['speed_iv'] AND $pokemoninfo['hp_iv'] >= $pokemoninfo['spc.attack_iv'] AND $pokemoninfo['hp_iv'] >= $pokemoninfo['spc.defence_iv']) {
                 $maiorstats = $txt['juiz_stat_hp'];
                 $mr = $pokemoninfo['hp_iv'];
                 $ff = 1;
                 }
            
                $analise .= sprintf($txt['juiz_best_stat_line'], $maiorstats);
                
                if ($mr >= 1 AND $mr <= 15) $analise .= $txt['juiz_tier_decent'];
                else if ($mr >= 16 AND $mr <= 25) $analise .= $txt['juiz_tier_good'];
                else if ($mr >= 26 AND $mr <= 30) $analise .= $txt['juiz_tier_fantastic'];
                else if ($mr >= 31) $analise .= $txt['juiz_tier_unbeatable'];
                $analise .= '<br>';
       
                if ($aa != 1 AND $pokemoninfo['attack_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_attack'];
                }
                if ($bb != 1 AND $pokemoninfo['defence_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_defense'];
                }
                if ($dd != 1 AND $pokemoninfo['spc.attack_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_sp_atk'];
                }
                if ($ee != 1 AND $pokemoninfo['spc.defence_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_sp_def'];
                }
                if ($cc != 1 AND $pokemoninfo['speed_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_speed'];
                }
                if ($ff != 1 AND $pokemoninfo['hp_iv'] >= $mr) {
                    $analise .= $txt['juiz_secondary_hp'];
                }
            
                if ($pokemoninfo['hp_iv'] == 0) {
                    $analise .= $txt['juiz_zero_hp'];
                    $a = 1;
                }else if ($pokemoninfo['attack_iv'] == 0) {
                    $analise .= $txt['juiz_zero_atk'];
                    $b = 1;
                }else if ($pokemoninfo['defence_iv'] == 0) {
                    $analise .= $txt['juiz_zero_def'];
                    $c = 1;
                }else if ($pokemoninfo['spc.attack_iv'] == 0) {
                    $analise .= $txt['juiz_zero_sp_atk'];
                    $d = 1;
                }else if ($pokemoninfo['spc.defence_iv'] == 0) {
                    $analise .= $txt['juiz_zero_sp_def'];
                    $e = 1;
                }else if ($pokemoninfo['speed_iv'] == 0) {
                    $analise .= $txt['juiz_zero_speed'];
                    $f = 1;
                }

                $analise .= $txt['juiz_final_phrase'];
        
                $analise .= $txt['juiz_another_link'];
          
            }
        }
    }

    echo addNPCBox(30, $txt['juiz_npc_title'], sprintf($txt['juiz_npc_text'], highamount($custo2)));
    if ($gebruiker['rank'] >= 4) {
    // if (!$sucesso AND $gebruiker['premiumaccount'] < time()) { echo '<div class="blue">Necessário ser premium.</div>'; }
    ?>
    <?php 
    if ($sucesso) {
        echo '<div class="box-content" style="color: #fff; text-align: left; padding: 10px; border-radius: 6px; font-size: 14.4px">
                <table>
                    <tr>
                        <td style="width: 70%"><div style="width: 100%; padding-left: 30px;">
                        '.$analise.'
                    </div></td>
                        <td style="width: 28%"><center><img src="'.$static_url . '/'.$img['link'].'" class="sprite"><br>#'.$pokemoninfo['id'].'</center></td>
                    </tr>
                </table>
             </div>';
    }
    ?>
         <?php 
    if (!$sucesso) {
    ?>
        <style>
            .carousel-cell {
                margin: 10px 10px;
                filter: grayscale(100%);
                transform: scale(0.85);
                overflow: hidden;
            }
            .carousel-cell.is-selected {
                filter: grayscale(20%) invert(8%);
                transition: 1s;
                transform: scale(1);
            }
        </style>
        <div class="box-content" style="width: 100%">
            <table width="100%" style="height: 170px;" class="general">
                <thead><tr><th colspan="6"><?php echo $txt['juiz_my_team']; ?></th></tr></thead>
                <tbody><tr>
                        <script>
                            var $poke_array_id = [];
                            var $poke_array_iid = [];
                            var $poke_array_name = [];
                            var $poke_array_spe = [];
                        </script>

                        <td style="padding: 0">
                            <div class="main-carousel" style="height: 97px; position: relative">
                                <?php
                                    $pokemon_profiel_sql = DB::exQuery("SELECT `pokemon_speler`.*,`pokemon_wild`.`naam`,`pokemon_wild`.`type1`,`pokemon_wild`.`type2` FROM `pokemon_speler` INNER JOIN `pokemon_wild` ON `pokemon_speler`.`wild_id`=`pokemon_wild`.`wild_id` WHERE `user_id`='" . $_SESSION['id'] . "' AND `opzak`='ja' ORDER BY `opzak_nummer` ASC");
                                    //Pokemons opzak weergeven op het scherm
                                    while($pokemon_profile = $pokemon_profiel_sql->fetch_assoc()) {
                                        $pokemon_profile = pokemonei($pokemon_profile, $txt);
                                        $of_name = $pokemon_profile['naam'];
                                        $popup = pokemon_popup($pokemon_profile, $txt);
                                        $pokemon_profile['naam'] = pokemon_naam($pokemon_profile['naam'], $pokemon_profile['roepnaam'], $pokemon_profile['icon']);
                                ?>
                                        <div class="carousel-cell" style="text-align: center;">
                                            <div style="display:table-cell; vertical-align:middle; min-width: 150px; height: 150px;">
                                                <?='<img id="my_pokes_infos" class="tip_bottom-middle" title="'.$popup.'" src="' . $static_url . '/'.$pokemon_profile['link'].'" />';?>
                                                <script id="remove">
                                                    $poke_array_id.push("<?=$pokemon_profile['wild_id']?>");
                                                    $poke_array_iid.push("<?=$pokemon_profile['id']?>");
                                                    $poke_array_name.push("<?=$of_name?>");
                                                    $poke_array_spe.push("<?=$pokemon_profile['naam']?>");

                                                    document.querySelector('#remove').outerHTML = '';
                                                </script>
                                            </div>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div style="width: 100%; background: rgba(0, 0, 0, .3); position: relative; bottom: 0; text-align: center; height: 53px; padding-top: 3px; margin-top: -8px; border-bottom-right-radius: 2px;  border-bottom-left-radius: 2px">
                                <div style="width: 100%; text-align: center; font-size: 17px; margin-top: 3px">
                                    <h4 id="poke_name" style="margin: 0; color: #eee; font-weight: bold;"></h4>
                                    <a href="./pokedex&poke=1" id="poke_link" style="color: #eee; font-size: 13px"></a>
                                </div>
                            </div>
                        </td>
                </tr></tbody>
                <tfoot>
                    <tr>
                        <td>
                             <form method="post" action="./juiz">
                                <input type="hidden" name="pokemonid" id="poke_id" value=""/>
                                <center><input type="submit" name="juiz" id="poke_submit" value="<?php echo $txt['juiz_judge_btn']; ?>" class="button"  style="margin: 3px"/></center>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <script>
            var $carousel = $('.main-carousel');
            var $poke_name = $('#poke_name');
            var $poke_link = $('#poke_link');
            var $poke_id = $('#poke_id');
            var $poke_submit = $('#poke_submit');

            var $car = $carousel.flickity({
                cellAlign: 'center',
                contain: false,
                pageDots: false,
                wrapAround: false,
                autoPlay: false
            });

            var flkty = $carousel.data('flickity');

            $carousel.on('select.flickity', function() {
                $poke_link.attr('href', '/pokedex&poke='+$poke_array_id[flkty.selectedIndex]);
                $poke_link.html($poke_array_name[flkty.selectedIndex]);
                $poke_name.html($poke_array_spe[flkty.selectedIndex]);

                $poke_id.val ($poke_array_iid[flkty.selectedIndex]);
                $poke_submit.val ('<?php echo $txt['juiz_judge_btn']; ?>');
            });

            $poke_link.attr('href', '/pokedex&poke='+$poke_array_id[0]);
            $poke_link.html($poke_array_name[0]);
            $poke_name.html($poke_array_spe[0]);

            $poke_id.val ($poke_array_iid[0]);
            $poke_submit.val ('<?php echo $txt['juiz_judge_btn']; ?>');

            $car.resize();
        </script>
<?php } 
        
    } else {
    echo '<div class="red">'.$txt['juiz_min_rank'].'</div>';
} ?>