<?php
//Als de gebruiker rank lager dan 5 is wordt hij terug gestuurd naar index.php
if ($gebruiker['rank'] < 5)
    header('Location: index.php');
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");

$page = 'tour';

require_once './app/classes/League.php';
require_once './app/classes/League_award.php';

$ligas = League::select_atuais(true, null, 1);
?>
<h3><?= $txt['tour_next_heading'] ?></h3>
<?php
if (count($ligas)) {
    $liga = $ligas['0'];
    //NOW() - INTERVAL 4 HOUR - INTERVAL 2 MINUTE - INTERVAL 17 SECOND
    $time = time() + (int) League::$ajuste_tempo_int;

    if (isset($_POST['registration']) && ($_POST['league_id'] ?? '') == $liga->getId()) {
        $liga->select($liga->getId());
        $liga->inscrever($gebruiker['user_id']);
    } else if (isset($_POST['undo_registration']) && ($_POST['league_id'] ?? '') == $liga->getId()) {
        $liga->desfazer_inscricao($gebruiker['user_id']);
    }
    ?>
    <table style="border-bottom: solid 2px;">
        <tr>
            <td style="font-weight: bold; font-size: 1.2em;">
                <?= sprintf($txt['tour_region'], $liga->getRegiao()) ?>
            </td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">
                <?= sprintf($txt['liga_registration_period'], date("d/m/Y H:i:s", strtotime($liga->getInicio_inscricoes())), date("d/m/Y H:i:s", strtotime($liga->getFim_inscricoes()))) ?>
            </td>
            <?php
            if ($gebruiker['wereld'] != $liga->getRegiao()) {
                ?>
                <td style="font-weight: bold; font-size: 1.1em; margin-left: 10px;">
                    <?= $txt['tour_not_in_region'] ?>
                </td>
                <?php
            } else { 
                ?>
                <td style="font-weight: bold; font-size: 1.1em;">
                    <?php
                    if ($liga->inscrito($gebruiker['user_id'])) {
                        ?>
                        <img src="<?=$static_url?>/images/icons/green.png" alt="<?= $txt['liga_icon_confirm'] ?>"/>
                        <?= $txt['tour_registered'] ?>
                        <?php
                    } else {
                        ?>
                        <img src="<?=$static_url?>/images/icons/red.png" alt="<?= $txt['liga_icon_no_confirm'] ?>"/>
                        <?= $txt['tour_not_registered'] ?>
                        <?php
                    }
                    ?>
                </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td><?= sprintf($txt['liga_battles_start'], date("d/m/Y H:i:s", strtotime($liga->getInicio()))) ?></td>
            <?php
            if ($gebruiker['wereld'] != $liga->getRegiao()) {
                ?>
                <td style="text-align: center;">
                    <a href="./travel" class="button_mini" style="padding: 7px 6px; border-radius: 7px;"><?= $txt['liga_travel'] ?></a>
                </td>
                <?php
            } else {
                ?>
                <td>
                    <?= $txt['liga_slots'] ?> <?= ($liga->getTotal_participantes() - $liga->getParticipantes()) ?>
                </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_registration_cost'] ?></td>
            <?php
            if ($gebruiker['wereld'] == $liga->getRegiao()) {
                ?>
                <td style="text-align: center;">
                    <?php
                    if ($time >= strtotime($liga->getInicio_inscricoes()) && $time <= strtotime($liga->getFim_inscricoes())) {
                        ?>
                        <form method="post">
                            <input type="hidden" name="league_id" value="<?= $liga->getId() ?>"/>
                            <?php
                            if (!$liga->inscrito($gebruiker['user_id'])) {
                                ?>
                                <input type="submit" name="registration" value="<?= $txt['liga_register_button'] ?>" class="button" onclick="if (confirm('<?= $txt['tour_confirm_register'] ?>') == false) {
                                            return false;
                                        }"/>
                                       <?php
                                   } else {
                                       ?>
                                <input type="submit" name="undo_registration" value="<?= $txt['liga_unregister_button'] ?>" class="button" onclick="if (confirm('<?= $txt['tour_confirm_unregister'] ?>') == false) {
                                            return false;
                                        }"/>
                                       <?php
                                   }
                                   ?>
                        </form>
                        <?php
                    } else {
                        echo $txt['liga_registration_soon'];
                    }
                    ?>
                </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <td>
                <?php
                if ($liga->getPreco_silvers()) {
                    echo '<img src="'.$static_url.'/images/icons/silver.png" alt="'.$txt['liga_currency_silvers'].'"/> ';
                    echo $liga->getPreco_silvers();
                    echo " " . $txt['liga_currency_silvers'];
                    $virgula = true;
                }
                if ($liga->getPreco_golds()) {
                    if ($virgula) {
                        echo ", ";
                    }
                    echo '<img src="'.$static_url.'/images/icons/gold.png" alt="'.$txt['liga_currency_golds'].'"/> ';
                    echo $liga->getPreco_golds();
                    echo " " . $txt['liga_currency_golds'];
                    $virgula = true;
                }
                if ($liga->getVip()) {
                    if ($virgula) {
                        echo ", ";
                    }
                    echo '<img src="'.$static_url.'/images/icons/star.png" alt="'.$txt['liga_currency_vip'].'"/> ';
                    echo $txt['liga_currency_vip'];
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_prizes'] ?></td>
        </tr>
        <tr>
            <td>
                <?php
                foreach (League_award::select_league($liga->getId()) as $premio) {
                    $virgula = false;
                    echo "<p>" . sprintf($txt['liga_placement'], $premio->getColocacao());
                    if ($premio->getSilvers()) {
                        echo '<img src="'.$static_url.'/images/icons/silver.png" alt="'.$txt['liga_currency_silvers'].'"/> ';
                        echo $premio->getSilvers();
                        echo " " . $txt['liga_currency_silvers'];
                        $virgula = true;
                    }
                    if ($premio->getGolds()) {
                        if ($virgula) {
                            echo ", ";
                        }
                        echo '<img src="'.$static_url.'/images/icons/gold.png" alt="'.$txt['liga_currency_golds'].'"/> ';
                        echo $premio->getGolds();
                        echo " " . $txt['liga_currency_golds'];
                        $virgula = true;
                    }
                    if ($premio->getPokemon_id()) {
                        if ($virgula) {
                            echo ", ";
                        }
                        echo '<img src="'.$static_url.'/images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';
                        $nome = DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'")->fetch_assoc();
						echo isset($nome['naam']) ? $nome['naam'] : '';
                        echo sprintf($txt['liga_level'], $premio->getLv_pokemon());
                        $virgula = true;
                    }
                    if ($premio->getVip()) {
                        if ($virgula) {
                            echo ", ";
                        }
                        echo '<img src="'.$static_url.'/images/icons/star.png" alt="vip"/> ';
                        echo sprintf($txt['liga_vip_days'], $premio->getVip());
                    }
                    echo "</p>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_rules'] ?></td>
        </tr>
        <tr>
            <td>
                <?= $txt['liga_max_level'] ?> <?= $liga->getLv_max_pokemon() ?><br/>
                <?= $txt['liga_max_special'] ?><br/>
                <?= $txt['liga_shinys'] ?> <?= $liga->getN_shinys() ?><br/>
                <?= $txt['liga_legendaries'] ?> <?= $liga->getN_lendas() ?><br/>
                <?= $txt['liga_megas'] ?> <?= $liga->getN_megas() ?>
            </td>
        </tr>
        <tr>
            <td colspan = "2" style = "text-align: center;">
                <?php
                foreach ($liga->erros as $erro) {
                    ?>
                    <div style="font-weight: bold; color: black; background-color: #ff6666; border: solid 3px red; border-radius: 5px;"><?= $erro ?></div>
                    <?php
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
} else {
    ?>
    <div style="font-weight: bold; font-size: 1.2em;"><?= $txt['tour_none_scheduled'] ?></div>
    <?php
}
?>

<h3 style="margin-top: 30px;"><?= $txt['tour_last_heading'] ?></h3>
<ul style="list-style: none;">
    <?php
    $ligas = League::select_terminadas(true, null, 4);

    foreach ($ligas as $liga) {
        ?>
        <li>
            <table style="border-bottom: solid 2px;">
                <tr>
                    <td style="font-weight: bold; font-size: 1.2em;">
                        <?= sprintf($txt['tour_region'], $liga->getRegiao()) ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 10px;">
                        <p>
                            <?= sprintf($txt['liga_registration_period'], date("d/m/Y H:i:s", strtotime($liga->getInicio_inscricoes())), date("d/m/Y H:i:s", strtotime($liga->getFim_inscricoes()))) ?>
                        </p>
                        <p>
                            <?= sprintf($txt['liga_battles_start'], date("d/m/Y H:i:s", strtotime($liga->getInicio()))) ?>
                        </p>
                        <p>
                            <?= sprintf($txt['tour_round_interval'], number_format($liga->getIntervalo_fase() / 60, 0)) ?>
                        </p>
                        <p>
                            <span style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_rules'] ?></span><br/>
                            <?= $txt['liga_max_level'] ?> <?= $liga->getLv_max_pokemon() ?><br/>
                            <?= $txt['liga_max_special'] ?><br/>
                            <?= $txt['liga_shinys'] ?> <?= $liga->getN_shinys() ?><br/>
                            <?= $txt['liga_legendaries'] ?> <?= $liga->getN_lendas() ?><br/>
                            <?= $txt['liga_megas'] ?> <?= $liga->getN_megas() ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <span style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_registration_cost'] ?></span><br/>
                            <?php
                            if ($liga->getPreco_silvers()) {
                                echo '<img src="'.$static_url.'/images/icons/silver.png" alt="'.$txt['liga_currency_silvers'].'"/> ';
                                echo $liga->getPreco_silvers();
                                echo " " . $txt['liga_currency_silvers'];
                                $virgula = true;
                            }
                            if ($liga->getPreco_golds()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="'.$static_url.'/images/icons/gold.png" alt="'.$txt['liga_currency_golds'].'"/> ';
                                echo $liga->getPreco_golds();
                                echo " " . $txt['liga_currency_golds'];
                                $virgula = true;
                            }
                            if ($liga->getVip()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="'.$static_url.'/images/icons/star.png" alt="vip"/> ';
                                echo "VIP";
                            }
                            ?>
                        </p>
                        <p>
                            <span style="font-weight: bold; font-size: 1.1em;"><?= $txt['liga_prizes'] ?></span><br/>
                            <?php
                            foreach (League_award::select_league($liga->getId()) as $premio) {
                                $virgula = false;
                                echo "<p>" . sprintf($txt['liga_placement'], $premio->getColocacao());
                                if ($premio->getSilvers()) {
                                    echo '<img src="'.$static_url.'/images/icons/silver.png" alt="'.$txt['liga_currency_silvers'].'"/> ';
                                    echo $premio->getSilvers();
                                    echo " " . $txt['liga_currency_silvers'];
                                    $virgula = true;
                                }
                                if ($premio->getGolds()) {
                                    if ($virgula) {
                                        echo ", ";
                                    }
                                    echo '<img src="'.$static_url.'/images/icons/gold.png" alt="'.$txt['liga_currency_golds'].'"/> ';
                                    echo $premio->getGolds();
                                    echo " " . $txt['liga_currency_golds'];
                                    $virgula = true;
                                }
                                if ($premio->getPokemon_id()) {
                                    if ($virgula) {
                                        echo ", ";
                                    }
                                    echo '<img src="'.$static_url.'/images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';
                                    $nome = DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'")->fetch_assoc();
									echo $nome['naam'];
                                    echo " lv " . $premio->getLv_pokemon();
                                    $virgula = true;
                                }
                                if ($premio->getVip()) {
                                    if ($virgula) {
                                        echo ", ";
                                    }
                                    echo '<img src="'.$static_url.'/images/icons/star.png" alt="vip"/> ';
                                    echo sprintf($txt['liga_vip_days'], $premio->getVip());
                                }
                                echo "</p>";
                            }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 400px; height: auto;">
                            <div id='gracket_<?= $liga->getId() ?>'></div>
                            <div id='gracket2_<?= $liga->getId() ?>' style='float: left; bottom: 300px; left: 730px;'></div>
                            <?php
                            if ($liga->getRound_atual()) {
                                echo $liga->tabela_matamata();
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
        </li>
        <?php
    }
    if (count($ligas) == 0) {
        ?>
        <div style="font-weight: bold; font-size: 1.2em;"><?= $txt['tour_none_history'] ?></div>
        <?php
    }
    ?>
</ul>