<?php
$text = $_GET['text'];
$hashValue = $_GET['hashValue'];
$fontSize = $_GET['fontSize'];
$fontStyle = $_GET['fontStyle'];

$arrChars = str_split($text);
//var_dump($arrChars);
$result = '';
for ($i=0;$i<count($arrChars);$i++) {
    if ($i % 2 == 0) {
        $ch = chr(ord($arrChars[$i]) + $hashValue);
    } else {
        $ch = chr(ord($arrChars[$i]) - $hashValue);
    }
    $result .= $ch;
}

$style = "font-size:$fontSize;";

if ($fontStyle == 'bold') {
    $style .= "font-weight:bold;";
} else {
    $style .= "font-style:$fontStyle;";
}
echo "<p style=\"$style\">$result</p>";
?>