<?php
$text = $_GET['text'];
$minFontSize = (int)$_GET['minFontSize'];
$maxFontSize = (int)$_GET['maxFontSize'];
$step = (int)$_GET['step'];
$words = str_split($text);
$currentSize = $minFontSize;
$isIncrementing = true;
foreach ($words as $word) {

    if (ord($word) % 2 == 0) {
        echo "<span style='font-size:" . $currentSize . ";text-decoration:line-through;'>" . htmlspecialchars($word) . "</span>";
    } else {
        echo "<span style='font-size:" . $currentSize . ";'>" . htmlspecialchars($word) . "</span>";
    }
    if (preg_match('/[a-zA-Z]/', $word)) {
        if ($isIncrementing) {
            $currentSize += $step;
        } else {
            $currentSize -= $step;
        }
    }
    if (preg_match('/[a-zA-Z]/', $word) && ($currentSize >= $maxFontSize || $currentSize <= $minFontSize)) {
        $isIncrementing = !$isIncrementing;
    }
}
?>