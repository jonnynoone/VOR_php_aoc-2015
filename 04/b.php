<?php

$key = 'bgvyzdsv';

$i = 0;
do {
    $i++;
    $hash = md5($key . strval($i));
} while(!str_starts_with($hash, '000000'));

echo "WIN!\n" . $hash . "\n" . $i;