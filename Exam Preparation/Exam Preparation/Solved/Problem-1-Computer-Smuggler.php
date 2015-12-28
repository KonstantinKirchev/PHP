<?php
$list = explode(', ',$_GET['list']);
//var_dump($list);
$countCPU = 0;
$countROM = 0;
$countRAM = 0;
$countVIA = 0;
foreach ($list as $part) {
    switch ($part){
        case 'CPU':
            $countCPU++;
            break;
        case 'ROM':
            $countROM++;
            break;
        case 'RAM':
            $countRAM++;
            break;
        case 'VIA':
            $countVIA++;
            break;
    }
}
//echo $countCPU;
//echo $countROM;
//echo $countRAM;
//echo $countVIA;
$numberOfParts = 0;
$numberOfParts = $countCPU + $countRAM + $countROM + $countVIA;
if ($numberOfParts>=1 && $numberOfParts<=500) {
    $paid = 0;
    if ($countCPU>=5) {
        $paid += $countCPU*85/2;
    } else {
        $paid += $countCPU*85;
    }
    if ($countROM>=5) {
        $paid += $countROM*45/2;
    } else {
        $paid += $countROM*45;
    }
    if ($countRAM>=5) {
        $paid += $countRAM*35/2;
    } else {
        $paid += $countRAM*35;
    }
    if ($countVIA>=5) {
        $paid += $countVIA*45/2;
    } else {
        $paid += $countVIA*45;
    }
//echo $paid;
    $comp = 0;
    $partsLeft = 0;
    $gain = 0;
    $soldLeftParts = 0;
    while ($countCPU > 0 && $countROM > 0 && $countRAM > 0 && $countVIA > 0) {
        $comp++;
        $countCPU--;
        $countROM--;
        $countRAM--;
        $countVIA--;
    }
//echo $comp;
    $partsLeft = $countCPU+$countROM+$countRAM+$countVIA;
//echo $partsLeft;
    $gain = $comp*420;
//echo $gain;
    $soldLeftParts = ($countCPU*85/2)+($countROM*45/2)+($countRAM*35/2)+($countVIA*45/2);
//echo $soldLeftParts;
    $gain +=$soldLeftParts;
//echo $gain;
    $gain -=$paid;
//echo $gain;
    echo '<ul>';
    echo '<li>'.$comp.' computers assembled</li>';
    echo '<li>'.$partsLeft.' parts left</li>';
    echo '</ul>';
    if ($gain>0) {
        echo '<p>Nakov gained '.$gain.' leva</p>';
    } else {
        echo '<p>Nakov lost '.$gain.' leva</p>';
    }

}

?>