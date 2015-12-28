<?php
$numbersString = $_GET['numbersString'];
$arr = preg_match_all('/([A-Z][A-Za-z]*)[^A-Za-z\+]*?(\+?[\d]+[\d\(\)\/\.\-\s]*[\d]+)/', $numbersString , $matches);
$matchFound = false;
$arrCombine = array_combine($matches[1],$matches[2]);
if (!empty($arrCombine)) {
    echo '<ol>';
    foreach ($arrCombine as $person => $phone) {
        $matchFound = true;
        echo '<li><b>'.htmlspecialchars($person).':</b> '.preg_replace('/[\/\-\.\(\)\s]/',"",htmlspecialchars($phone)).'</li>';
    }
    echo '</ol>';
}else {
    echo '<p>No matches!</p>';
}
?>