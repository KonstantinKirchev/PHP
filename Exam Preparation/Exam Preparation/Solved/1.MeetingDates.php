<?php
date_default_timezone_set("Europe/Sofia");
$dateOne = $_GET['dateOne'];
$dateTwo = $_GET['dateTwo'];
$currentDate = strtotime($dateOne);
$lastDate = strtotime($dateTwo);
$thursdays = [];
if ($currentDate>=$lastDate) {
    while ($currentDate >= $lastDate) {
        $thursday = date('N',$lastDate);
        if ($thursday == 4) {
            $thursdays[] = $lastDate;
        }
        $lastDate = strtotime('+1 day', $lastDate);
    }
} else {
    while ($currentDate <= $lastDate) {
        $thursday = date('N',$currentDate);
        if ($thursday == 4) {
            $thursdays[] = $currentDate;
        }
        $currentDate = strtotime('+1 day', $currentDate);
    }
}

if (count($thursdays)>0) {
    echo '<ol>';
    foreach ($thursdays as $thursday) {
        $day = date("d-m-Y",$thursday);
        echo '<li>'.$day.'</li>';
    }
    echo '</ol>';
} else {
    echo '<h2>No Thursdays</h2>';
}
?>