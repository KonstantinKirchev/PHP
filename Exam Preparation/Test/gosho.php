<?php
$luggage = preg_split('/C\|_\|/', $_GET['luggage'], -1, PREG_SPLIT_NO_EMPTY);
$typeLuggage = $_GET['typeLuggage'];
$roomInfo = $_GET['room'];
$minWeight = (int)$_GET['minWeight'];
$maxWeight = (int)$_GET['maxWeight'];
$result = [];
foreach ($luggage as $info) {
    $info = explode(';', $info);
    $luggageType = $info[0];
    $room = $info[1];
    $object = $info[2];
    $weight = (int)($info[3]);
    if ($room != $roomInfo) {continue;}
    if (!in_array($luggageType, $typeLuggage)) {continue;}
    if (!isset($result[$luggageType])) {
        $result[$luggageType] = [];
    }
    if (!isset($result[$luggageType]['weight'])) {
        $result[$luggageType]['weight'] = 0;
    }
    $result[$luggageType][] = $object;
    $result[$luggageType]['weight'] += $weight;
}
ksort($result);
$w = [];
foreach ($result as $luggageType => &$room) {
    usort($room, function ($a, $b) {
        return strcmp($a, $b);
    });
    //$result[$luggageType] = $room;
    $w[] = array_shift($result[$luggageType]);
}
echo '<ul>';
$i=0;
foreach ($result as $key => $value) {
    $str = implode(', ',$value);
    if ($w[$i]>=$minWeight && $w[$i]<=$maxWeight && (count($typeLuggage)!=0 || !empty($roomInfo) || !empty($minWeight) || !empty($maxWeight))) {
        echo '<li><p>'.htmlspecialchars($key).'</p><ul><li><p>'.htmlspecialchars($roomInfo).'</p><ul><li><p>'.htmlspecialchars($str).' - '.htmlspecialchars($w[$i++]).'kg</p></li></ul></li></ul></li>';
    }
}
echo '</ul>';
?>