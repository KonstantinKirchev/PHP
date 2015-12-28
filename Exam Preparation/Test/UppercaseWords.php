<?php
$text = $_GET['text'];
preg_match_all('/[^A-Za-z]*([A-Za-z]+)[^A-Za-z]*/',$text,$match);
//var_dump($match[1]);
echo '<p>';
//$arr = [];
foreach ($match[1] as $value) {

    if (ctype_upper($value)) {
        $db = '';
        if ($value==strrev($value)) {
            for ($i=0;$i<strlen($value);$i++) {
                $double = $value[$i].$value[$i];
                $db .= $double;
            }
            //echo $db.'<br/>';
        } else {
            $db = strrev($value);
            //echo $db.'<br/>';
        }
        //$arr[] = $db;
        $text = preg_replace('/\b'.htmlspecialchars($value).'\b/', $db, $text);
    }
}
echo htmlspecialchars($text).'</p>';
?>