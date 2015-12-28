<?php
$text = $_GET['text'];
$minFontSize = (int)$_GET['minFontSize'];
$maxFontSize = (int)$_GET['maxFontSize'];
$step = (int)$_GET['step'];
$chars = str_split($text);
$currentSize = $minFontSize;
$isIncrementing = true;
foreach ($chars as $char) {

    if (ord($char) % 2 == 0) {
        echo "<span style='font-size:" . $currentSize . ";text-decoration:line-through;'>" . htmlspecialchars($char) . "</span>";
    } else {
        echo "<span style='font-size:" . $currentSize . ";'>" . htmlspecialchars($char) . "</span>";
    }
    if (ctype_alpha($char)) {
        if ($isIncrementing) {
            $currentSize += $step;
        } else {
            $currentSize -= $step;
        }
    }
    if (ctype_alpha($char) && ($currentSize >= $maxFontSize || $currentSize <= $minFontSize)) {
        $isIncrementing = !$isIncrementing;
    }
}
?>