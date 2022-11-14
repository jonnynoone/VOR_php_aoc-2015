<?php

$visited = array([0,0]);

$f = fopen('input.txt', 'r') or die('Unable to open file.');
$directions = fread($f, filesize('input.txt'));
fclose($f);

$santa_way = "";
$robot_way = "";

// Split directions between Santa and Robot
for($i = 0; $i < strlen($directions); $i++) {
    if($i % 2 === 0) {
        $santa_way .= $directions[$i];
    } else {
        $robot_way .= $directions[$i];
    }
}

function parsePath($path) {
    global $visited;
    $position = [0,0];
    
    for($i = 0; $i < strlen($path); $i++) {
        switch($path[$i]) {
            case '^':
                $position[1]++;
                break;
            case '>':
                $position[0]++;
                break;
            case 'v':
                $position[1]--;
                break;
            case '<':
                $position[0]--;
                break;
        }

        if(!in_array($position, $visited)) {
            array_push($visited, $position);
        }
    }
}

parsePath($santa_way);
parsePath($robot_way);

echo count($visited);