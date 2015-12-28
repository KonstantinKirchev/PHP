<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>String Modifier</title>
</head>
<style>
    body > table > tbody > tr > td{
        border: 1px solid black;
    }
    body > table > tbody > tr > th{
        border: 1px solid black;
    }
    body > table{
        border-collapse: collapse;
        margin-top: 10px;
    }
</style>
<body>

<form method="post">
    <input type="text" name="string"/>
    <input type="radio" name="option" value="palindrome"/> Check Palindrome
    <input type="radio" name="option" value="reverse"/> Reverse String
    <input type="radio" name="option" value="split"/> Split
    <input type="radio" name="option" value="hash"/> Hash String
    <input type="radio" name="option" value="shuffle"/> Shuffle String
    <input type="submit"/>
</form>

<?php
$str = $_POST['string'];
$opp = $_POST['option'];
if ($opp == 'palindrome') {
    $word = $str;
    $reverse = strrev($word);
    if ($word == $reverse) {
        echo $str." is a palindrome!";
    } else {
        echo $str . " is not a palindrome!";
    }
} elseif ($opp == 'reverse') {
    echo strrev($str);
} elseif ($opp == 'split') {
    $arr = str_split($str);
    foreach ($arr as $char) {
        echo $char.' ';
    }
} elseif ($opp == 'hash') {
    echo crypt($str);
} elseif ($opp == 'shuffle') {
    echo str_shuffle($str);
}
?>

</body>
</html>
