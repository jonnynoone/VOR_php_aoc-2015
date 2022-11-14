<?php

$f = fopen('input.txt', 'r') or die('Unable to open file.');
$input = fread($f, filesize('input.txt'));
fclose($f);

$strings = explode("\n", $input);
$nice_strings = 0;

foreach ($strings as $str) {
    if (is_nice($str)) {
        $nice_strings++;
    }
}

echo $nice_strings;

function is_nice($str)
{
    if (
        has_invalid_string($str) ||
        !has_three_vowels($str) ||
        !has_double_char($str)
    ) {
        return false;
    } else {
        return true;
    }
}

function has_invalid_string($str)
{
    if (
        str_contains($str, 'ab') ||
        str_contains($str, 'cd') ||
        str_contains($str, 'pq') ||
        str_contains($str, 'xy')
    ) {
        return true;
    } else {
        return false;
    }
}

function has_three_vowels($str)
{
    $num_vowels = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (
            $str[$i] == 'a' ||
            $str[$i] == 'e' ||
            $str[$i] == 'i' ||
            $str[$i] == 'o' ||
            $str[$i] == 'u'
        ) {
            $num_vowels++;
        }
    }

    return $num_vowels >= 3 ? true : false;
}

function has_double_char($str)
{
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        if ($str[$i] === $str[$i + 1]) {
            return true;
        }
    }
    return false;
}