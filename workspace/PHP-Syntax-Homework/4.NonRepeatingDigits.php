<?php
$end = 247;
$find = false;
for ($i = 102; $i <= $end; $i++) {
    if (strval($i)[0] != strval($i)[1] &&
        strval($i)[0] != strval($i)[2] &&
        strval($i)[1] != strval($i)[2] &&
        $i < 1000){
        echo "{$i}, ";
        $find = true;
    }
}
if (!$find) {
    echo 'no';
}
?>