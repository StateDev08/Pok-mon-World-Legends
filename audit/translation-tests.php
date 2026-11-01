<?php
require __DIR__ . '/../language/resolve.php';
require __DIR__ . '/../language/move-label.php';
require __DIR__ . '/../language/language-user.php';
require __DIR__ . '/../language/rank-label.php';
$checks = 0;
function translated_check($ok, $message) {
    global $checks;
    if (!$ok) throw new RuntimeException($message);
    $checks++;
}
$_COOKIE = []; $_SESSION = [];
translated_check(resolve_game_language() === 'pt', 'Original default retained without configuration');
$_SESSION['pa_language'] = 'de'; $_COOKIE['pa_language'] = 'invalid';
translated_check(resolve_game_language() === 'de', 'Session survives invalid cookie');
$_COOKIE['pa_language'] = 'en';
translated_check(resolve_game_language() === 'en', 'Explicit language retained');
translated_check(move_label('Growl') === 'Growl', 'Other languages retain engine names');
$_COOKIE['pa_language'] = 'de';
translated_check(move_label('Growl') === 'Heuler', 'German attack name');
translated_check(move_label('Thunderbolt') === 'Donnerblitz', 'German attack name');
translated_check(move_label('Double-Edge') === move_label('Double Edge'), 'Legacy punctuation');
translated_check(move_label('Custom Move') === 'Custom Move', 'Unknown moves retained');
translated_check(rank_label('New Duelist') === 'Duellneuling', 'German trainer rank');
translated_check(rank_label('Custom Rank') === 'Custom Rank', 'Custom trainer rank retained');
$originalDirectory = getcwd();
chdir(sys_get_temp_dir());
$page = '';
require __DIR__ . '/../language/language-ajax.php';
translated_check($lang === 'de', 'AJAX uses the selected language outside the game directory');
chdir($originalDirectory);
$static_url = '/game/public';
foreach (['attack/wild/wild-attack', 'attack/trainer/trainer-attack', 'attack/duel/duel-attack'] as $page) {
    $text = language_txt('pages', 'de', ['page' => $page]);
    translated_check($text['your_turn'] === 'Du bist am Zug!', $page . ': turn');
    translated_check($text['did'] === 'verwendet', $page . ': action');
    translated_check($text['a_wild'] === 'Ein wildes Pokémon:', $page . ': encounter');
    translated_check(str_contains($text['you_lost_1'], 'src=\'/game/public/'), $page . ': intact image URL');
    translated_check(!str_contains($text['you_lost_2'], "href='/pokemoncenter'"), $page . ': relative center link');
}
foreach (language_available() as $lang) {
    $text = language_txt('general', $lang);
    foreach (['battle_heading','battle_against','duel_against','battle_time_remaining','battle_seconds','battle_item_target','choose_pokemon_label','chat_wait_message','item_equipped_message'] as $key) {
        translated_check(!empty($text[$key]), $lang . ': ' . $key);
    }
    translated_check(substr_count($text['battle_item_target'], '%s') === 1, $lang . ': tooltip placeholder');
}
$txt = language_txt('pages', 'de', ['page' => 'attack/wild/wild-attack']);
require __DIR__ . '/../attack/attack.inc.php';
$hit = multiple_hits(['naam'=>'Double Slap', 'aantalkeer'=>2], 7);
translated_check($hit['damage'] === 14, 'Translation preserves multi-hit damage');
translated_check($hit['message'] === '<br />Duplexhieb trifft 2-mal.', 'Multi-hit message translated');
translated_check(sprintf($txt['battle_recoil'], 'Bulbasaur') === 'Bulbasaur erleidet Rückstoßschaden.', 'Recoil message translated');
foreach (['wild/wild-attack','trainer/trainer-attack','duel/duel-attack'] as $battle) {
    $source = file_get_contents(__DIR__ . '/../attack/' . $battle . '.php');
    translated_check(str_contains($source, 'data-move="<?=htmlspecialchars($move, ENT_QUOTES)?>"'), $battle . ': canonical button identifier');
    translated_check(str_contains($source, "encodeURIComponent($(this).attr('data-move') || $(this).text())"), $battle . ': canonical request identifier');
    translated_check(str_contains($source, "button.attr('data-move', move).text(gameMoveLabel(move))"), $battle . ': update identifier and label after switching Pokemon');
    translated_check(str_contains($source, 'battle-control-label'), $battle . ': localized image captions');
    translated_check(!str_contains($source, 'BATALHA') && !str_contains($source, 'DUELO CONTRA') && !str_contains($source, 'Um selvagem'), $battle . ': no hardcoded Portuguese headings');
}
echo "PASS: $checks translation regression checks\n";
