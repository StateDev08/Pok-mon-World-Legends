<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
require __DIR__.'/locale-inventory.php';
require __DIR__.'/../language/language-user.php';
require __DIR__.'/../language/rank-label.php';
$checks=0;
function locale_check(bool $condition, string $message): void {
    global $checks;
    if (!$condition) throw new RuntimeException($message);
    $checks++;
}
function locale_formats(string $text): array {
    preg_match_all('/(?<![0-9])%(?:(\d+)\$)?[-+0#]*\d*(?:\.\d+)?([bcdeEfFgGosuxX])/', str_replace('%%','',$text),$matches,PREG_SET_ORDER);
    $position=0;$result=[];
    foreach ($matches as $m) $result[($m[1] !== '' ? (int)$m[1] : ++$position)] = strtolower($m[2]);
    ksort($result);return $result;
}
$files=0;$assignments=0;
foreach (['general','pages','admin','ajax','box','events','mail','legal'] as $type) {
    $base=locale_assignments(__DIR__.'/../language/'.$type.'/language-'.$type.'-pt.php');
    foreach (['pt','de','en','pl','ru','zh'] as $lang) {
        $file=__DIR__.'/../language/'.$type.'/language-'.$type.'-'.$lang.'.php';
        $records=locale_assignments($file);$files++;$assignments+=count($records);
        foreach ($base as $id=>$reference) {
            $context="$type/$lang:$id";
            locale_check(isset($records[$id]), "$context missing");
            $record=$records[$id];
            locale_check(locale_formats($record['text'])===locale_formats($reference['text']), "$context format mismatch");
            $variables=$record['variables'];sort($variables);$expected=$reference['variables'];sort($expected);
            locale_check($variables===$expected, "$context dynamic variables changed");
            locale_check(!preg_match('/\x{FFFD}|Ã[\x{0080}-\x{00BF}]|â€/u',$record['text']), "$context broken encoding");
            locale_check(!preg_match('/(?:src|href)=["\x27]\s/u',$record['text']), "$context damaged HTML URL");
            if ($lang!=='pt') locale_check(!preg_match('/Recomeçar|Alterar (?:Senha|E-mail)|Atualizar Perfil|Itens [Ee]spec|Pedras (?:de )?[eE]volu|Nem todos os personagens|Novos avatares são/u',$record['text']), "$context Portuguese leak");
        }
    }
}
$expected=['pt'=>'Próximo','de'=>'Weiter','en'=>'Next','pl'=>'Dalej','ru'=>'Вперёд','zh'=>'下一页'];
foreach ($expected as $lang=>$next) {
    $table=json_decode(file_get_contents(__DIR__.'/../public/translations/datatables-'.$lang.'.json'),true,512,JSON_THROW_ON_ERROR);
    locale_check($table['oPaginate']['sNext']===$next,"$lang pagination");
    foreach (['_START_','_END_','_TOTAL_'] as $placeholder) locale_check(str_contains($table['sInfo'],$placeholder),"$lang table placeholder");
}
$static_url='/installed-game/public';
$ranks=['pt'=>'Duelista novato','de'=>'Duellneuling','en'=>'New Duelist','pl'=>'Początkujący pojedynkowicz','ru'=>'Начинающий дуэлянт','zh'=>'新晋决斗者'];
$tutors=['pt'=>'Tutor de golpes','de'=>'Attacken-Lehrer','en'=>'Move Tutor','pl'=>'Nauczyciel ataków','ru'=>'Наставник приёмов','zh'=>'招式教学'];
foreach ($ranks as $lang=>$rank) {
    $_COOKIE=['pa_language'=>$lang]; $_SESSION=[];
    locale_check(resolve_game_language()===$lang,"$lang language selection retained");
    locale_check(rank_label('New Duelist')===$rank,"$lang rank display");
    $general=language_txt('general',$lang);
    locale_check($general['moves_tutor_title']===$tutors[$lang],"$lang move tutor terminology");
    $profile=sprintf($general['profile_has_honors'],'LocaleTrainer',3);
    locale_check(str_contains($profile,'LocaleTrainer') && str_contains($profile,'3'),"$lang profile honors arguments");
    $sale=language_txt('box',$lang,['page'=>'sell-box']);
    locale_check(str_contains($sale['alert_price_too_less'],'/installed-game/public/images/'),"$lang sale icon path");
    $avatar=language_txt('pages',$lang,['page'=>'avatar']);
    locale_check(!str_contains($avatar['textnpc'],'Nem todos os personagens') || $lang==='pt',"$lang avatar append text");
    foreach (['email','password','profile','restart'] as $category) {
        $_GET=['category'=>$category];
        $options=language_txt('pages',$lang,['page'=>'account-options']);
        locale_check(isset($options['pagetitle']),"$lang account/$category title");
    }
}
$_COOKIE=[];$_SESSION=['pa_language'=>'ru'];
locale_check(resolve_game_language()==='ru','Session language without cookie');
$_COOKIE=['pa_language'=>'invalid'];
locale_check(resolve_game_language()==='ru','Invalid cookie does not discard valid session language');
echo "PASS: $checks locale checks; $files files, $assignments assignments, all six languages.\n";
