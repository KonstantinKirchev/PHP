<?php
$text = $_GET['text'];
$red = dechex($_GET['red']);
$green = dechex($_GET['green']);
$blue = dechex($_GET['blue']);
if ($green=='0') {
    $green .= '0';
}else if (strlen($green)==1 && $green!='0') {
    $green = '0'.$green;
}
if ($red=='0') {
    $red .= '0';
}else if (strlen($red)==1 && $red!='0') {
    $red = '0'.$red;
}
if ($blue=='0') {
    $blue .= '0';
}else if (strlen($blue)==1 && $blue!='0') {
    $blue = '0'.$blue;
}
$nthLetter = $_GET['nth'];
$rgbColor = '#'.$red.$green.$blue;
$arr =  str_split($text);
echo '<p>';
for ($i=1;$i<=count($arr);$i++) {
    if ($i % $nthLetter == 0) {
        echo "<span style=\"color: ".$rgbColor."\">".htmlspecialchars($arr[$i-1])."</span>";
    }else{
        echo htmlspecialchars($arr[$i-1]);
    }
}
echo '</p>'
?>