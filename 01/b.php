<?php

$floor = 0;

$f = fopen("input.txt", "r") or die("Unable to open file.");
$input = fread($f, filesize("input.txt"));
fclose($f);

for ($i = 0; $i < strlen($input); $i++) {
    if($input[$i] === "(") {
        $floor++;
    } elseif($input[$i] === ")") {
        $floor--;
    }

    if($floor === -1) {
        echo "YOU ARE A WIN!\n";
        echo "Position: " . $i + 1;
        break;
    }
}