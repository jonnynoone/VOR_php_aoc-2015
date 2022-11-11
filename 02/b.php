<?php

$total_ribbon = 0;

$f = fopen("input.txt", "r") or die("Unable to open file.");
$input = fread($f, filesize("input.txt"));
fclose($f);

$presents = explode("\n", $input);

foreach($presents as $present) {
    $dimensions = explode('x', $present);
    $length = $dimensions[0];
    $width = $dimensions[1];
    $height = $dimensions[2];

    if($length >= $width && $length >= $height) {
        $ribbon = $width * 2 + $height * 2;
    } elseif($width >= $length && $width >= $height) {
        $ribbon = $length * 2 + $height * 2;
    } elseif($height >= $length && $height >= $width) {
        $ribbon = $length * 2 + $width * 2;
    }
    
    $bow = $length * $width * $height;

    $total_ribbon += $ribbon;
    $total_ribbon += $bow;
}

echo $total_ribbon;