<?php
$text = $_GET['list'];
$arrSentence = preg_split('/\n/',$text);
$maxSize = $_GET['maxSize'];
echo '<ul>';
foreach ($arrSentence as $sentence) {
    $chars = str_split(trim($sentence));

    if (count($chars)!=1) {
        if (count($chars)>$maxSize) {
            $result = '';
            for ($i=0;$i<$maxSize;$i++) {
                $result .= $chars[$i];
            }
            $result .= '...';
            echo '<li>'.htmlspecialchars($result).'</li>';
        } else {
            $result = '';
            foreach ($chars as $char) {
                $result .= $char;
            }
            echo '<li>'.htmlspecialchars($result).'</li>';
        }
    }
}
echo '</ul>';
?>