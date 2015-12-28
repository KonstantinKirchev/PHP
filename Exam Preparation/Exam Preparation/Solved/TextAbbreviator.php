<?php
$text = $_GET['list'];
$arrSentence = preg_split('/\n/',$text);
$maxSize = $_GET['maxSize'];
echo '<ul>';
foreach ($arrSentence as $sentence) {
    $words = str_split(trim($sentence));

    if (count($words)!=1) {
        if (count($words)>$maxSize) {
            $result = '';
            for ($i=0;$i<$maxSize;$i++) {
                $result .= $words[$i];
            }
            $result .= '...';
            echo '<li>'.htmlspecialchars($result).'</li>';
        } else {
            $result = '';
            foreach ($words as $char) {
                $result .= $char;
            }
            echo '<li>'.htmlspecialchars($result).'</li>';
        }
    }
}
echo '</ul>';
?>