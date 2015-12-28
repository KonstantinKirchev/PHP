
<?php
$text = $_GET['text'];
$blacklist = preg_split("/[\s*]/",$_GET['blacklist'],-1, PREG_SPLIT_NO_EMPTY);
$validEmails = preg_match_all("/[\w\+\-]+@[\w\-].[\w.\-]+/",$text,$matches);
foreach ($blacklist as $value) {
    foreach ($matches[0] as $val) {
        if (substr_compare($val, $value, strlen($val) - strlen($value), strlen($value)) === 0) {
            $replace = '';
            for ($i = 0; $i < strlen($val); $i++) {
                $replace .= "*";
            }
            if (preg_match('/' . $val . '/', $text)) {
                $text = str_replace($val, $replace, $text);
            }
        }
    }

}
$validEmails = preg_match_all("/[\w\+\-]+@[\w\-].[\w.\-]+/",$text,$matches);
foreach ($matches[0] as $value) {
    $replace = "<a href=\"mailto:".$value."\">".$value."</a>" ;
    $text = str_replace($value, $replace, $text);
}
echo "<p>".$text."</p>";
?>
