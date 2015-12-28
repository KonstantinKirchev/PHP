<?php
date_default_timezone_set("Europe/Sofia");
$dateOne = $_GET['dateOne'];
$dateTwo = $_GET['dateTwo'];
$startDate = strtotime($dateOne);
$lastDate = strtotime($dateTwo);
$thursdays = [];
if ($startDate >= $lastDate) {
    while ($startDate >= $lastDate) {
        $thursday = date('N',$lastDate);
        if ($thursday == 4) {
            $thursdays[] = $lastDate;
        }
        $lastDate = strtotime('+1 day', $lastDate);
    }
} else {
    while ($startDate <= $lastDate) {
        $thursday = date('N',$startDate);
        if ($thursday == 4) {
            $thursdays[] = $startDate;
        }
        $startDate = strtotime('+1 day', $startDate);
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