<?php
date_default_timezone_set("Europe/Sofia");
$numbersString = $_GET['numbersString'];
$dateString = $_GET['dateString'];
$matchNum = preg_match_all('/[^A-Za-z0-9](\d+)[^A-Za-z]/',$numbersString,$matches);
$matchDates = preg_match_all('/\d{4}-\d{2}-\d{2}/',$dateString,$matchesDates);
$sum = array_sum($matches[1]);
$strSum = strrev((string)$sum);
if (empty($matchesDates[0])) {
    echo '<p>No dates</p>';
} else {
    echo '<ul>';
    foreach ($matchesDates[0] as $date) {
        echo '<li>';
        $d = DateTime::createFromFormat('Y-m-d', $date);
        $d->modify('+'.$strSum.' day');
        echo $d->format('Y-m-d');
        //echo '<li>'.date('Y-m-d', strtotime($date. ' + '.$strSum.' days')).'</li>';
        echo '</li>';
    }
    echo '</ul>';
}
?>