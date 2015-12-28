<?php
$recipient = htmlspecialchars($_GET['recipient']);
$subject = htmlspecialchars($_GET['subject']);
$message = htmlspecialchars($_GET['body']);
$key = $_GET['key'];

//var_dump($message);
$formattedMessage = '<p class=\'recipient\'>'.$recipient.'</p><p class=\'subject\'>'.$subject.'</p><p class=\'message\'>'.$message.'</p>';
$arrMessage = str_split($formattedMessage);
$arrKey = str_split($key);
//var_dump($arrKey);
echo "|";
for ($i=0,$j=0;$i<count($arrMessage);$i++,$j++) {
    $number = 0;
    if ($j==count($arrKey)) {
        $j=0;
    }
    $number = dechex(ord($arrMessage[$i])*ord($arrKey[$j]));
    echo $number.'|';
}
?>