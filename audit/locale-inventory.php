<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
// Extract assignments without executing route conditions or game code.
function locale_assignments(string $file): array {
    $tokens = token_get_all(file_get_contents($file));
    $flat = []; $positions = []; $offset = 0;
    foreach ($tokens as $token) {
        $length = strlen(is_array($token) ? $token[1] : $token);
        if (!(is_array($token) && in_array($token[0], [T_WHITESPACE,T_COMMENT,T_DOC_COMMENT], true))) {
            $positions[] = $offset;
            $flat[] = $token;
        }
        $offset += $length;
    }
    $text = fn($token) => is_array($token) ? $token[1] : $token;
    $result = []; $occurrences = [];
    for ($i=0; $i<count($flat)-5; $i++) {
        if ($text($flat[$i]) !== '$txt' || $text($flat[$i+1]) !== '[' || !is_array($flat[$i+2]) || $flat[$i+2][0] !== T_CONSTANT_ENCAPSED_STRING || $text($flat[$i+3]) !== ']' || !in_array($text($flat[$i+4]), ['=','.=', '+='], true)) continue;
        $key = trim($text($flat[$i+2]), "'\"");
        $expression = ''; $raw = ''; $variables=[];
        for ($j=$i+5; $j<count($flat) && $text($flat[$j]) !== ';'; $j++) {
            $expression .= $text($flat[$j]);
            if (is_array($flat[$j]) && $flat[$j][0] === T_VARIABLE) $variables[]=$flat[$j][1];
            if (is_array($flat[$j]) && $flat[$j][0] === T_CONSTANT_ENCAPSED_STRING) $raw .= eval('return '.$flat[$j][1].';');
            elseif (is_array($flat[$j]) && $flat[$j][0] === T_ENCAPSED_AND_WHITESPACE) $raw .= $flat[$j][1];
        }
        $occurrence = $occurrences[$key] = ($occurrences[$key] ?? 0) + 1;
        $result[$key.'#'.$occurrence] = ['key'=>$key,'occurrence'=>$occurrence,'line'=>$flat[$i][2], 'text'=>$raw,'variables'=>$variables,'start'=>$positions[$i+5],'end'=>$positions[$j]];
    }
    return $result;
}
if (realpath($_SERVER['SCRIPT_FILENAME'] ?? '') === __FILE__) {
    $inventory = [];
    foreach (['general','pages','admin','ajax','box','events','mail','legal'] as $type) {
        foreach (['pt','de','en','pl','ru','zh'] as $lang) {
            $inventory[$type][$lang] = locale_assignments(__DIR__.'/../language/'.$type.'/language-'.$type.'-'.$lang.'.php');
        }
    }
    file_put_contents(__DIR__.'/locale-inventory.json', json_encode($inventory, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_THROW_ON_ERROR));
    echo "Locale inventory generated.\n";
}
