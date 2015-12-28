<?php
date_default_timezone_set("Europe/Sofia");
$list = preg_split('/[\n\r]+/',$_GET['list'],-1,PREG_SPLIT_NO_EMPTY);
$currDate = new DateTime(trim($_GET['currDate']));
$currDate = date_format($currDate,'m/d/Y');
$dayArray = [];
foreach ($list as $days) {
    $dtInfo = date_parse($days);
    if ($dtInfo['warning_count'] == 0 && $dtInfo['error_count'] == 0 ) {
        $date = new DateTime($days);
        $dayArray[] = $date;
    }
}
asort($dayArray);
echo '<ul>';
foreach ($dayArray as $value) {
    $day = $value->format('m/d/Y');
    if (strtotime($currDate) > strtotime($day)) {
        echo '<li><em>'.$value->format('d/m/Y').'</em></li>';
    } else {
        echo '<li>'.$value->format('d/m/Y').'</li>';
    }
}
echo '</ul>';
?>