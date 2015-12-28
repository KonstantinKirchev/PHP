<?php
$input = json_decode($_GET['jsonTable']);
$colSize = $input[0];
$message = "";
foreach ($input[1] as $key=>$value) {
    preg_match_all('/(?<=time=)\d{1,3}(?=ms)/',$value, $matches);
    if(isset($matches[0][0]))
        $message .= chr($matches[0][0]);
}
$words = explode("*", $message);

echo "<table border='1' cellpadding='5'>";
foreach($words as $key=>$value) {
    $rows = ceil(strlen($value)/$colSize);
    $currentChar = 0;
    for($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for($j = 0; $j < $colSize; $j++){
            if($currentChar < strlen($value) && $value[$currentChar] != ' ') {
                echo "<td style='background:#CAF'>";
                echo htmlspecialchars($value[$currentChar]);
            }else {
                echo "<td>";
            }
            echo "</td>";
            $currentChar++;
        }
        echo "</tr>";
    }
}
echo "</table>";
