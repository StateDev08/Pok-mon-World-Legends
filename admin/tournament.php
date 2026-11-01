<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
include_once("language/language-admin.php");

//Admin controle
if ($gebruiker['admin'] < 2) {
    game_redirect_header('location: ./home');
    exit; 
}

include_once 'app/classes/League.php';
include_once 'app/classes/League_award.php';
include_once 'app/classes/League_battle.php';

if (isset($_POST['new'])) {
    $league = new League();

    $league->setRegiao(($_POST['regiao'] ?? ''));
    $league->setTotal_participantes(($_POST['total_participantes'] ?? ''));
    $league->setInicio_inscricoes(($_POST['inicio_inscricoes'] ?? ''));
    $league->setFim_inscricoes(($_POST['fim_inscricoes'] ?? ''));
    $league->setInicio(($_POST['inicio'] ?? ''));
    $league->setIntervalo_fase(($_POST['intervalo_fase'] ?? ''));
    $league->setPreco_silvers(($_POST['preco_silvers'] ?? ''));
    $league->setPreco_golds(($_POST['preco_golds'] ?? ''));
    $league->setN_shinys(($_POST['n_shinys'] ?? ''));
    $league->setN_lendas(($_POST['n_lendas'] ?? ''));
    $league->setN_megas(($_POST['n_megas'] ?? ''));
    $league->setLv_max_pokemon(($_POST['lv_max_pokemon'] ?? ''));
    $league->setVip(($_POST['vip'] ?? ''));
    $league->setMods(($_POST['mods'] ?? ''));
    $league->setAdmins(($_POST['adms'] ?? ''));
    $league->setDonos(($_POST['donos'] ?? ''));

    if ($league->insert()) {
        ?>
        <div style="float: left; width: auto; height: auto; font-weight: bold; color: lime;">
            <?= sprintf($txt['adm_tn_created'], $league->getId()) ?>
        </div>
        <?php
    } else {
        ?>
        <div style="float: left; width: auto; height: auto; font-weight: bold; color: red;">
            <?=$txt['adm_tn_create_error']?>
        </div>
        <?php
    }
} else if (isset($_POST['new_award'])) {
    $league_award = new League_award();

    $league_award->setLeague_id(($_POST['league_id'] ?? ''));
    $league_award->setColocacao(($_POST['colocacao'] ?? ''));
    $league_award->setSilvers(($_POST['silvers'] ?? ''));
    $league_award->setGolds(($_POST['golds'] ?? ''));
    $league_award->setVip(($_POST['vip'] ?? ''));
    $league_award->setPokemon_id(($_POST['pokemon_id'] ?? ''));
    $league_award->setLv_pokemon(($_POST['lv_pokemon'] ?? ''));

    if ($league_award->insert()) {
        ?>
        <div style="float: left; width: auto; height: auto; font-weight: bold; color: lime;">
            <?= sprintf($txt['adm_award_created_tn'], $league_award->getLeague_id()) ?>
        </div>
        <?php
    } else {
        ?>
        <div style="float: left; width: auto; height: auto; font-weight: bold; color: red;">
            <?=$txt['adm_award_error']?>
        </div>
        <?php
    }
} else if (isset($_POST['criar_duelos'])) {
  $league = new League();
  $league->select(($_POST['league_id'] ?? ''));

  $league->criar_duelos();

  $msg_form = "msg_form_" . $league->getId();
  $$msg_form = $txt['adm_duels_created'];
  } else if (isset($_POST['passar_round'])) {
  $league = new League();
  $league->select(($_POST['league_id'] ?? ''));

  $league->passar_round();

  $msg_form = "msg_form_" . $league->getId();
  $$msg_form = $txt['adm_round_updated'];
  } else if (isset($_POST['entregar_premiacao'])) {
  $league = new League();
  $league->select(($_POST['league_id'] ?? ''));

  $league->entregar_premiacao();

  $msg_form = "msg_form_" . $league->getId();
  $$msg_form = $txt['adm_awards_delivered'];
}

if (isset($_GET['new'])) {
    ?>
    <div style="float: left; width: auto; height: auto;">
        <hr/>
        <form method="post" action="./admin/tournament">
            <h2><?=$txt['adm_tn_new_title']?></h2><br/>
            <label><?=$txt['adm_region']?> 
                <select name="regiao">
                    <option value="Kanto">Kanto</option>
                </select>
            </label>
            <br/><br/>
            <label><?=$txt['adm_total_participants']?> 
                <select name="total_participantes">
                    <option value="8">8</option>
                    <option value="16">16</option>
                </select>
            </label>
            <br/><br/>
            <label><?=$txt['adm_signup_start']?> 
                <input type="text" name="inicio_inscricoes" class="text_long" value="<?= date("Y-m-d H:i:s", time() + League::$ajuste_tempo_int) ?>" maxlength="19"/>
                <br/>
                <small><?=$txt['adm_format_hint']?></small>
            </label>
            <br/><br/>
            <label><?=$txt['adm_signup_end']?> 
                <input type="text" name="fim_inscricoes" class="text_long" value="<?= date("Y-m-d H:i:s", time() + League::$ajuste_tempo_int + 600) ?>" maxlength="19"/>
                <br/>
                <small><?=$txt['adm_format_hint']?></small>
            </label>
            <br/><br/>
            <label><?=$txt['adm_battles_start']?> 
                <input type="text" name="inicio" class="text_long" value="<?= date("Y-m-d H:i:s", time() + League::$ajuste_tempo_int + 600 + 300) ?>" maxlength="19"/>
                <br/>
                <small><?=$txt['adm_format_hint']?></small>
            </label>
            <br/><br/>
            <label><?=$txt['adm_phase_interval']?> 
                <input type="text" name="intervalo_fase" class="text_long" value="900"/>
                <br/>
                <small><?=$txt['adm_seconds_hint_900']?></small>
            </label>
            <br/><br/>
            <label><?=$txt['adm_price_silvers']?> 
                <input type="text" name="preco_silvers" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_price_golds']?> 
                <input type="text" name="preco_golds" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label>VIP: &nbsp;
                <input type="radio" name="vip" value="1"> <?=$txt['adm_yes']?>&nbsp;
                <input type="radio" name="vip" value="0" checked="true"> <?=$txt['adm_no']?>
            </label>
            <br/>
            <label><?=$txt['adm_mods_can_join']?> &nbsp;
                <input type="radio" name="mods" value="1"> <?=$txt['adm_yes']?>&nbsp;
                <input type="radio" name="mods" value="0" checked="true"> <?=$txt['adm_no']?>
            </label>
            <br/>
            <label><?=$txt['adm_admins_can_join']?> &nbsp;
                <input type="radio" name="adms" value="1"> <?=$txt['adm_yes']?>&nbsp;
                <input type="radio" name="adms" value="0" checked="true"> <?=$txt['adm_no']?>
            </label>
            <br/>
            <label><?=$txt['adm_owners_can_join']?> &nbsp;
                <input type="radio" name="donos" value="1"> <?=$txt['adm_yes']?>&nbsp;
                <input type="radio" name="donos" value="0" checked="true"> <?=$txt['adm_no']?>
            </label>
            <br/><br/>
            <label><?=$txt['adm_max_shinys']?> 
                <input type="text" name="n_shinys" class="text_long" value="6"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_max_legends']?> 
                <input type="text" name="n_lendas" class="text_long" value="6"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_max_megas']?> 
                <input type="text" name="n_megas" class="text_long" value="6"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_max_level']?> 
                <input type="text" name="lv_max_pokemon" class="text_long" value="100"/>
            </label>
            <br/><br/>

            <input type="submit" name="new" value="<?=htmlspecialchars($txt['adm_create_tournament'], ENT_QUOTES)?>" class="button">
            <input type="button" value="<?=htmlspecialchars($txt['adm_cancel'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament'" class="button"/>
        </form>
    </div>
    <?php
} else if (isset($_GET['new_award'])) {
    ?>
    <div style="float: left; width: auto; height: auto;">
        <hr/>
        <form method="post">
            <h2><?=$txt['adm_new_award_title']?></h2><br/>

            <label><?=$txt['adm_tournament_id']?> 
                <input type="text" name="league_id" class="text_long" value="<?= (isset($_GET['league_id']) ? ($_GET['league_id'] ?? '') : "1")?>"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_placement']?> 
                <input type="text" name="colocacao" class="text_long" value="1"/>
            </label>
            <br/><br/>
            <label>Silvers: 
                <input type="text" name="silvers" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label>Golds: 
                <input type="text" name="golds" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label>VIP: 
                <input type="text" name="vip" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_pokemon_id']?> 
                <input type="text" name="pokemon_id" class="text_long" value="0"/>
            </label>
            <br/><br/>
            <label><?=$txt['adm_pokemon_lv']?> 
                <input type="text" name="lv_pokemon" class="text_long" value="1"/>
            </label>
            <br/><br/>

            <input type="submit" name="new_award" value="<?=htmlspecialchars($txt['adm_create_award_btn'], ENT_QUOTES)?>" class="button">
            <input type="button" value="<?=htmlspecialchars($txt['adm_cancel'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament'" class="button"/>
        </form>
    </div>
    <?php
} else {
    $ligas_atuais = League::select_atuais(true);
    $ligas_terminadas = League::select_terminadas(true, null, 8);
    ?>
    <div style="float: left; width: auto; height: auto; margin: 10px;">
        <input type="button" value="<?=htmlspecialchars($txt['adm_create_new_tournament'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new'" class="button"/> &nbsp;
        <input type="button" value="<?=htmlspecialchars($txt['adm_create_award_btn'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new_award'" class="button"/>
    </div>
    <div style="float: left; width: auto; height: auto;">
        <h2><?=$txt['adm_open_tournaments']?></h2><br/>
        <ul style="list-style-type: none;">
            <?php
            foreach ($ligas_atuais as $liga) {
                ?>
                <li>
                    <div style="float: left; width: auto; height: auto;">
                        <div style="float: left; width: auto; height: auto;">
                            Id: <?= $liga->getId() ?><br/>
                            <?=$txt['adm_region']?> <?= $liga->getRegiao() ?><br/>
                            <?=$txt['adm_total_participants']?> <?= $liga->getTotal_participantes() ?><br/>
                            <?=$txt['adm_current_participants']?> <?= $liga->getParticipantes() ?><br/>
                            <?=$txt['adm_signup_start']?> <?= $liga->getInicio_inscricoes() ?><br/>
                            <?=$txt['adm_signup_end']?> <?= $liga->getFim_inscricoes() ?><br/>
                            <?=$txt['adm_battles_start']?> <?= $liga->getInicio() ?><br/>
                            <?=$txt['adm_phase_interval_short']?> <?= $liga->getIntervalo_fase() ?><br/>
                            <?=$txt['adm_current_round']?> <?= $liga->getRound_atual() ?><br/>
                            <?=$txt['adm_award_delivered']?> <?= ($liga->getPremiacao_entregue() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                            <br/>
                            <?=$txt['adm_participation_rules']?><br/>
                            <?=$txt['adm_price_in_silvers']?> <?= $liga->getPreco_silvers() ?><br/>
                            <?=$txt['adm_price_in_golds']?> <?= $liga->getPreco_golds() ?><br/>
                            <?=$txt['adm_mods_joining']?> <?= ($liga->getMods() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                            <?=$txt['adm_admins_joining']?> <?= ($liga->getAdmins() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                            <?=$txt['adm_owners_joining']?> <?= ($liga->getDonos() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                            <?=$txt['adm_vip_required']?> <?= ($liga->getVip() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                        </div>
                        <div style="float: left; width: auto; height: auto; margin-left: 50px;">
                            <?=$txt['adm_rules']?><br/>
                            <?=$txt['adm_n_legends']?> <?= $liga->getN_lendas() ?><br/>
                            <?=$txt['adm_n_shinys']?> <?= $liga->getN_shinys() ?><br/>
                            <?=$txt['adm_n_megas']?> <?= $liga->getN_megas() ?><br/>
                            <?=$txt['adm_lv_max']?> <?= $liga->getLv_max_pokemon() ?><br/>
                            <br/>
                            <?=$txt['adm_awards']?> <input type="button" value="<?=htmlspecialchars($txt['adm_create'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new_award&league_id=<?= $liga->getId() ?>'" class="button_mini"/>
                            <ul>
                                <?php
                                foreach (League_award::select_league($liga->getId()) as $premio) {
                                    $virgula = false;
                                    echo "<li>" . $premio->getColocacao() . "º - ";
                                    if ($premio->getSilvers()) {
                                        echo '<img src="'.$static_url.'/images/icons/silver.png" alt="silver"/> ';
                                        echo $premio->getSilvers();
                                        echo " silvers";
                                        $virgula = true;
                                    }
                                    if ($premio->getGolds()) {
                                        if ($virgula) {
                                            echo ", ";
                                        }
                                        echo '<img src="'.$static_url.'/images/icons/gold.png" alt="gold"/> ';
                                        echo $premio->getGolds();
                                        echo " golds";
                                        $virgula = true;
                                    }
                                    if ($premio->getPokemon_id()) {
                                        if ($virgula) {
                                            echo ", ";
                                        }
                                        echo '<img src="'.$static_url.'/images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';
                                        
                                        $pkfind = DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'")->fetch_assoc();
                                        echo $pkfind['naam'];
                                        echo " lv " . $premio->getLv_pokemon();
                                        $virgula = true;
                                    }
                                    if ($premio->getVip) {
                                        if ($virgula) {
                                            echo ", ";
                                        }
                                        echo '<img src="'.$static_url.'/images/icons/star.png" alt="vip"/> ';
                                        echo sprintf($txt['adm_days_vip'], $premio->getVip());
                                    }
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div style="float: left; width: 500px; height: auto;"><hr/></div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <br/>
    </div>
    <div style="float: left; width: auto; height: auto;">
        <hr/>
        <h2><?=$txt['adm_closed_tournaments']?></h2><br/>
        <div style="width: auto; height: auto;">
            <ul style="list-style-type: none;">
                <?php
                foreach ($ligas_terminadas as $liga) {
                    ?>
                    <li>
                        <div style="float: left; width: auto; height: auto;">
                            <!--div style="width: auto; height: auto;"-->
                            <div style="float: left; width: auto; height: auto;">
                                Id: <?= $liga->getId() ?><br/>
                                <?=$txt['adm_region']?> <?= $liga->getRegiao() ?><br/>
                                <?=$txt['adm_total_participants']?> <?= $liga->getTotal_participantes() ?><br/>
                                <?=$txt['adm_current_participants']?> <?= $liga->getParticipantes() ?><br/>
                                <?=$txt['adm_signup_start']?> <?= $liga->getInicio_inscricoes() ?><br/>
                                <?=$txt['adm_signup_end']?> <?= $liga->getFim_inscricoes() ?><br/>
                                <?=$txt['adm_battles_start']?> <?= $liga->getInicio() ?><br/>
                                <?=$txt['adm_phase_interval_short']?> <?= $liga->getIntervalo_fase() ?><br/>
                                <?=$txt['adm_current_round']?> <?= $liga->getRound_atual() ?><br/>
                                <?=$txt['adm_award_delivered']?> <?= ($liga->getPremiacao_entregue() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                                <br/>
                                <?=$txt['adm_participation_rules']?><br/>
                                <?=$txt['adm_price_in_silvers']?> <?= $liga->getPreco_silvers() ?><br/>
                                <?=$txt['adm_price_in_golds']?> <?= $liga->getPreco_golds() ?><br/>
                                <?=$txt['adm_mods_joining']?> <?= ($liga->getMods() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                                <?=$txt['adm_admins_joining']?> <?= ($liga->getAdmins() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                                <?=$txt['adm_owners_joining']?> <?= ($liga->getDonos() ? $txt['adm_yes'] : $txt['adm_no']) ?><br/>
                            </div>
                            <div style="float: left; width: auto; height: auto; margin-left: 50px;">
                                Regras de batalha:<br/>
                                <?=$txt['adm_n_legends']?> <?= $liga->getN_lendas() ?><br/>
                                <?=$txt['adm_n_shinys']?> <?= $liga->getN_shinys() ?><br/>
                                <?=$txt['adm_n_megas']?> <?= $liga->getN_megas() ?><br/>
                                <?=$txt['adm_lv_max']?> <?= $liga->getLv_max_pokemon() ?><br/>
                                <br/>
                                <?=$txt['adm_awards']?> <input type="button" value="<?=htmlspecialchars($txt['adm_create'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new_award&league_id=<?= $liga->getId() ?>'" class="button_mini"/>
                                <ul>
                                    <?php
                                    foreach (League_award::select_league($liga->getId()) as $premio) {
                                        $virgula = false;
                                        echo "<li>" . $premio->getColocacao() . "º - ";
                                        if ($premio->getSilvers()) {
                                            echo '<img src="'.$static_url.'/images/icons/silver.png" alt="silver"/> ';
                                            echo $premio->getSilvers();
                                            echo " silvers";
                                            $virgula = true;
                                        }
                                        if ($premio->getGolds()) {
                                            if ($virgula) {
                                                echo ", ";
                                            }
                                            echo '<img src="'.$static_url.'/images/icons/gold.png" alt="gold"/> ';
                                            echo $premio->getGolds();
                                            echo " golds";
                                            $virgula = true;
                                        }
                                        if ($premio->getPokemon_id()) {
                                            if ($virgula) {
                                                echo ", ";
                                            }
                                            echo '<img src="'.$static_url.'/images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';

                                            $pkfind = DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'")->fetch_assoc();
                                            echo $pkfind['naam'];
                                            echo " lv " . $premio->getLv_pokemon();
                                            $virgula = true;
                                        }
                                        if ($premio->getVip) {
                                            if ($virgula) {
                                                echo ", ";
                                            }
                                            echo '<img src="'.$static_url.'/images/icons/star.png" alt="vip"/> ';
                                            echo sprintf($txt['adm_days_vip'], $premio->getVip());
                                        }
                                        echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div style="float: left; width: 500px; height: auto;"><hr/></div>
                        </div>
                        <?php /*
                          <div style="float: left; margin-left: 50px;">
                          <form method="post">
                          <input type="hidden" name="league_id" value="<?= $liga->getId() ?>"/>
                          <?php
                          if ($liga->finalizada() && !$liga->getPremiacao_entregue()) {
                          ?>
                          <input type="submit" class="button" name="entregar_premiacao" value="<?=htmlspecialchars($txt['adm_deliver_award'], ENT_QUOTES)?>"/><br/>
                          <?php
                          } else if (!$liga->finalizada()) {
                          if ($liga->batalhas_criadas()) {
                          ?>
                          <input type="submit" class="button" name="criar_duelos" value="<?=htmlspecialchars($txt['adm_create_duels'], ENT_QUOTES)?>"/><br/>
                          <?php
                          } else {
                          ?>
                          <input type="submit" class="button" name="passar_round" value="<?=htmlspecialchars($txt['adm_next_round'], ENT_QUOTES)?>"/><br/>
                          <?php
                          }
                          }
                          $msg_form = "msg_form_" . $liga->getId();
                          if (isset($$msg_form)) {
                          echo "<p>" . $$msg_form . "</p>";
                          }
                          ?>
                          </form>
                          </div>
                         */ ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><br/>
    </div>
    <div style="float: left; width: auto; height: auto; margin: 10px;">
        <input type="button" value="<?=htmlspecialchars($txt['adm_create_new_tournament'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new'" class="button"/> &nbsp;
        <input type="button" value="<?=htmlspecialchars($txt['adm_create_award_btn'], ENT_QUOTES)?>" onclick="location.href = document.baseURI + 'admin/tournament&new_award'" class="button"/>
    </div>
    <?php
}
?>