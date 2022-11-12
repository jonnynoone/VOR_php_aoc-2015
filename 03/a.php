<?php

$location = [0, 0];

$visited = [];
array_push($visited, $location);

$f = fopen('input.txt', 'r') or die("Unable to open file.");
$input = fread($f, filesize('input.txt'));
fclose($f);

for($i = 0; $i < strlen($input); $i++) {
    switch($input[$i]) {
        case "^":
            $location[1]++;
            break;
        case ">":
            $location[0]++;
            break;
        case "v":
            $location[1]--;
            break;
        case "<":
            $location[0]--;
            break;
    }

    if(!in_array($location, $visited)) {
        array_push($visited, $location);
    }
}

$unique_visits = sizeof($visited);
echo $unique_visits;