<?php
$keys = $_GET['keys'];
$text = $_GET['text'];
$startKey = preg_match('/^([A-Za-z_]+)\d/', $keys, $startMatch);
$endKey = preg_match('/\d([A-Za-z_]+)$/', $keys, $endMatch);
$startKey = $startMatch[1];
$endKey = $endMatch[1];
$digits = preg_match_all('/'.$startKey.'([\d.]+)'.$endKey.'/',$text, $matches);
$sum = 0;
foreach ($matches[1] as $digit) {
    $sum +=$digit;
}
if ($sum==0 && !empty($startKey) && !empty($endKey)) {
    echo '<p>The total value is: <em>nothing</em></p>';
} else if (empty($startKey) || empty($endKey)) {
    echo '<p>A key is missing</p>';
} else if ($sum>0) {
    echo '<p>The total value is: <em>'.$sum.'</em></p>';
}
?>