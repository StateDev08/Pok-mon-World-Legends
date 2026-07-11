<?php
/**
 * Extract translatable top-level string literals from the Portuguese language files.
 *
 * This script walks the PHP token stream of each language/*-pt.php file and finds
 * T_CONSTANT_ENCAPSED_STRING tokens that are inside a $txt['key'] = ...; assignment
 * at the top level (not inside function calls, array indices, etc.).
 *
 * Output: tools/translation_input.json
 *   - files: array of {path, source, strings: [{start, end, quote, value}]}
 */

if (!isset($argv[1])) {
    echo "Usage: php tools/translate_extract.php <repo-root>\n";
    exit(1);
}

$root = rtrim($argv[1], '/');
$files = [
    'language/general/language-general-pt.php',
    'language/pages/language-pages-pt.php',
    'language/ajax/language-ajax-pt.php',
    'language/box/language-box-pt.php',
    'language/events/language-events-pt.php',
    'language/mail/language-mail-pt.php',
];

function unquote_value($raw, $quote) {
    // Remove the surrounding quotes.
    $value = substr($raw, 1, -1);
    if ($quote === "'") {
        // Single-quoted: only \\ and \' are special.
        $value = str_replace("\\'", "'", $value);
        $value = str_replace("\\\\", "\\", $value);
    } else {
        // Double-quoted: use PHP's stripcslashes.
        $value = stripcslashes($value);
    }
    return $value;
}

function quote_value($value, $quote) {
    if ($quote === "'") {
        return "'" . addcslashes($value, "'\\") . "'";
    }
    // Double-quoted: escape ", \, $.
    return '"' . addcslashes($value, '"\\$') . '"';
}

$result = ['files' => []];

foreach ($files as $file) {
    $path = $root . '/' . $file;
    if (!is_file($path)) {
        continue;
    }
    $source = file_get_contents($path);
    $tokens = token_get_all($source);

    $offset = 0;
    $strings = [];
    $in_txt = false;
    $txt_paren = 0;
    $txt_square = 0;

    // Helpers to peek tokens.
    $count = count($tokens);
    for ($i = 0; $i < $count; $i++) {
        $token = $tokens[$i];
        $text = is_array($token) ? $token[1] : $token;
        $type = is_array($token) ? $token[0] : $token;

        if ($in_txt) {
            if ($type === '(') {
                $txt_paren++;
            } elseif ($type === ')') {
                $txt_paren--;
            } elseif ($type === '[') {
                $txt_square++;
            } elseif ($type === ']') {
                $txt_square--;
            } elseif ($type === ';') {
                $in_txt = false;
                $txt_paren = 0;
                $txt_square = 0;
            } elseif ($type === T_CONSTANT_ENCAPSED_STRING && $txt_paren === 0 && $txt_square === 0) {
                $start = $offset;
                $end = $offset + strlen($text);
                $quote = $text[0];
                $value = unquote_value($text, $quote);

                $strings[] = [
                    'start' => $start,
                    'end' => $end,
                    'quote' => $quote,
                    'value' => $value,
                ];
            }
        } else {
            // Look for $txt['key'] = sequence.
            if ($type === T_VARIABLE && $text === '$txt') {
                $txtIndex = $i;
                // skip whitespace and comments.
                $j = $i + 1;
                while ($j < $count && is_array($tokens[$j]) && ($tokens[$j][0] === T_WHITESPACE || $tokens[$j][0] === T_COMMENT)) {
                    $j++;
                }
                if ($j < $count && $tokens[$j] === '[') {
                    $j++;
                    // key: can be T_CONSTANT_ENCAPSED_STRING or T_STRING
                    while ($j < $count && is_array($tokens[$j]) && ($tokens[$j][0] === T_WHITESPACE || $tokens[$j][0] === T_COMMENT)) {
                        $j++;
                    }
                    if ($j < $count && (is_array($tokens[$j]) && ($tokens[$j][0] === T_CONSTANT_ENCAPSED_STRING || $tokens[$j][0] === T_STRING))) {
                        $j++;
                        while ($j < $count && is_array($tokens[$j]) && ($tokens[$j][0] === T_WHITESPACE || $tokens[$j][0] === T_COMMENT)) {
                            $j++;
                        }
                        if ($j < $count && $tokens[$j] === ']') {
                            $j++;
                            while ($j < $count && is_array($tokens[$j]) && ($tokens[$j][0] === T_WHITESPACE || $tokens[$j][0] === T_COMMENT)) {
                                $j++;
                            }
                            if ($j < $count && $tokens[$j] === '=') {
                                $j++;
                                // skip whitespace after =
                                while ($j < $count && is_array($tokens[$j]) && ($tokens[$j][0] === T_WHITESPACE || $tokens[$j][0] === T_COMMENT)) {
                                    $j++;
                                }
                                $i = $j - 1; // the loop will increment.
                                $in_txt = true;
                                $txt_paren = 0;
                                $txt_square = 0;
                                // Add the length of the tokens we just skipped ($txt + key + =).
                                for ($k = $txtIndex; $k < $j; $k++) {
                                    $t = $tokens[$k];
                                    $offset += strlen(is_array($t) ? $t[1] : $t);
                                }
                                continue;
                            }
                        }
                    }
                }
            }
        }

        // Update offset after processing.
        $offset += strlen($text);
    }

    $result['files'][] = [
        'path' => $file,
        'source' => $source,
        'strings' => $strings,
    ];
}

$out = $root . '/tools/translation_input.json';
file_put_contents($out, json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
echo "Wrote $out with " . count($result['files']) . " files.\n";
