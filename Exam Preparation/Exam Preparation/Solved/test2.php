<?php
$childName = htmlspecialchars(preg_replace('/\s+/','-',$_GET['childName']));
$wantedPresent = $_GET['wantedPresent'];
$riddles = explode(';',$_GET['riddles']);
$i = strlen($childName) % count($riddles);
if ($i==0) {
    $pickedRiddle = $riddles[count($riddles)-1];
} else {
    $pickedRiddle = $riddles[$i-1];
}
echo "\$giftOf{$childName} = $[wasChildGood] ? '".htmlspecialchars($wantedPresent)."' : '".htmlspecialchars($pickedRiddle)."';";
?>