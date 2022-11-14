<?php

$f = fopen('input.txt', 'r') or die('Unable to open file.');
$input = fread($f, filesize('input.txt'));
fclose($f);

$nice_strings = 0;
$strings = explode("\n", $input);
foreach ($strings as $str) {
    if (is_nice($str)) {
        $nice_strings++;
    }
}

echo $nice_strings;

function is_nice($str)
{
    if (char_pair_twice($str) && repeat_over_space($str)) {
        return true;
    } else {
        return false;
    }
}

function char_pair_twice($str)
{
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        $needle = $str[$i] . $str[$i + 1];
        if (substr_count($str, $needle) === 2) {
            return true;
        }
    }

    return false;
}

function repeat_over_space($str)
{
    for ($i = 0; $i < strlen($str) - 2; $i++) {
        if ($str[$i] === $str[$i + 2]) {
            return true;
        }
    }
    return false;
}