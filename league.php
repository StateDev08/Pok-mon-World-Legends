<?php
if ($gebruiker['rank'] < 5)
    header('Location: index.php');
//Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");

$page = 'league';

require_once './app/classes/League.php';
require_once './app/classes/League_award.php';

$ligas = League::select_atuais();

//NOW() - INTERVAL 4 HOUR - INTERVAL 2 MINUTE - INTERVAL 17 SECOND
$time = time() + League::$ajuste_tempo_int;
?>
<div style="margin-bottom: 30px; text-align: center;">
    <img src="<?=$static_url?>/images/layout/liga_pokemon.png" alt="Liga Pokémon"/>
</div>

<h3><?= $txt['liga_open_heading'] ?></h3>
<ul style="list-style: none;">
    <?php
    foreach ($ligas as $liga) {
        if (isset($_POST['registration']) && ($_POST['league_id'] ?? '') == $liga->getId()) {
            $liga->select($liga->getId());
            $liga->inscrever($gebruiker['user_id']);
        } else if (isset($_POST['undo_registration']) && ($_POST['league_id'] ?? '') == $liga->getId()) {
            $liga->desfazer_inscricao($gebruiker['user_id']);
        }
        ?>
        <li>
            <table style="border-bottom: solid 2px;">
                <tr>
                    <td style="font-weight: bold; font-size: 1.2em;">
                        <?= sprintf($txt['liga_region'], $liga->getRegiao()) ?>
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
                            <?= $txt['liga_not_in_region'] ?>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td style="font-weight: bold; font-size: 1.1em;">
                            <?php
                            if ($liga->inscrito($gebruiker['user_id'])) {
                                ?>
                                <img src="images/icons/green.png" alt="confirm"/>
                                <?= $txt['liga_registered'] ?>
                                <?php
                            } else {
                                ?>
                                <img src="images/icons/red.png" alt="no_confirm"/>
                                <?= $txt['liga_not_registered'] ?>
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
                            <a href="./travel" class="button_mini" style="padding: 7px 6px; border-radius: 7px;">Viajar</a>
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
                                        <input type="submit" name="registration" value="<?= $txt['liga_register_button'] ?>" class="button" onclick="if (confirm('<?= $txt['liga_confirm_register'] ?>') == false) {
                                                    return false;
                                                }"/>
                                               <?php
                                           } else {
                                               ?>
                                        <input type="submit" name="undo_registration" value="<?= $txt['liga_unregister_button'] ?>" class="button" onclick="if (confirm('<?= $txt['liga_confirm_unregister'] ?>') == false) {
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
                            echo '<img src="images/icons/silver.png" alt="silver"/> ';
                            echo $liga->getPreco_silvers();
                            echo " silvers";
                            $virgula = true;
                        }
                        if ($liga->getPreco_golds()) {
                            if ($virgula) {
                                echo ", ";
                            }
                            echo '<img src="images/icons/gold.png" alt="gold"/> ';
                            echo $liga->getPreco_golds();
                            echo " golds";
                            $virgula = true;
                        }
                        if ($liga->getVip()) {
                            if ($virgula) {
                                echo ", ";
                            }
                            echo '<img src="images/icons/star.png" alt="vip"/> ';
                            echo "VIP";
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
                            echo "<p>" . $premio->getColocacao() . "º - ";
                            if ($premio->getSilvers()) {
                                echo '<img src="images/icons/silver.png" alt="silver"/> ';
                                echo $premio->getSilvers();
                                echo " silvers";
                                $virgula = true;
                            }
                            if ($premio->getGolds()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/icons/gold.png" alt="gold"/> ';
                                echo $premio->getGolds();
                                echo " golds";
                                $virgula = true;
                            }
                            if ($premio->getPokemon_id()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';
                                echo (DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'"))->fetch_assoc()['0'];
                                echo " lv " . $premio->getLv_pokemon();
                                $virgula = true;
                            }
                            if ($premio->getVip()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/icons/star.png" alt="vip"/> ';
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
        </li>
        <?php
    }
    if (count($ligas) == 0) {
        ?>
        <div style="font-weight: bold; font-size: 1.2em;"><?= $txt['liga_none_open'] ?></div>
        <?php
    }
    ?>
</ul>

<h3 style="margin-top: 30px;"><?= $txt['liga_closed_heading'] ?></h3>
<ul style="list-style: none;">
    <?php
    $ligas = League::select_terminadas();

    foreach ($ligas as $liga) {
        ?>
        <li>
            <table style="border-bottom: solid 2px;">
                <tr>
                    <td style="font-weight: bold; font-size: 1.2em;">
                        <?= sprintf($txt['liga_region'], $liga->getRegiao()) ?>
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
                            <?= $txt['liga_not_in_region'] ?>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td style="font-weight: bold; font-size: 1.1em;">
                            <?php
                            if ($liga->inscrito($gebruiker['user_id'])) {
                                ?>
                                <img src="images/icons/green.png" alt="confirm"/>
                                <?= $txt['liga_registered'] ?>
                                <?php
                            } else {
                                ?>
                                <img src="images/icons/red.png" alt="no_confirm"/>
                                <?= $txt['liga_not_registered'] ?>
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
                            <a href="./travel" class="button_mini" style="padding: 7px 6px; border-radius: 7px;">Viajar</a>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td>
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
                            <a href="./league_status&league_id=<?= $liga->getId() ?>" class="button" style="padding: 7px 6px;">Acompanhar liga</a>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>
                        <?php
                        if ($liga->getPreco_silvers()) {
                            echo '<img src="images/icons/silver.png" alt="silver"/> ';
                            echo $liga->getPreco_silvers();
                            echo " silvers";
                            $virgula = true;
                        }
                        if ($liga->getPreco_golds()) {
                            if ($virgula) {
                                echo ", ";
                            }
                            echo '<img src="images/icons/gold.png" alt="gold"/> ';
                            echo $liga->getPreco_golds();
                            echo " golds";
                            $virgula = true;
                        }
                        if ($liga->getVip()) {
                            if ($virgula) {
                                echo ", ";
                            }
                            echo '<img src="images/icons/star.png" alt="vip"/> ';
                            echo "VIP";
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
                            echo "<p>" . $premio->getColocacao() . "º - ";
                            if ($premio->getSilvers()) {
                                echo '<img src="images/icons/silver.png" alt="silver"/> ';
                                echo $premio->getSilvers();
                                echo " silvers";
                                $virgula = true;
                            }
                            if ($premio->getGolds()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/icons/gold.png" alt="gold"/> ';
                                echo $premio->getGolds();
                                echo " golds";
                                $virgula = true;
                            }
                            if ($premio->getPokemon_id()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/pokemon/icon/' . $premio->getPokemon_id() . '.gif" alt="pokemon"/> ';
                                echo (DB::exQuery("SELECT `naam` FROM `pokemon_wild` WHERE `wild_id`='" . $premio->getPokemon_id() . "'"))->fetch_assoc()['0'];
                                echo " lv " . $premio->getLv_pokemon();
                                $virgula = true;
                            }
                            if ($premio->getVip()) {
                                if ($virgula) {
                                    echo ", ";
                                }
                                echo '<img src="images/icons/star.png" alt="vip"/> ';
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
            </table>
        </li>
        <?php
    }
    if (count($ligas) == 0) {
        ?>
        <div style="font-weight: bold; font-size: 1.2em;"><?= $txt['liga_none_closed'] ?></div>
        <?php
    }
    ?>
</ul>