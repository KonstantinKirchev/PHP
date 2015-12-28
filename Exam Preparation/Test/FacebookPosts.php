<?php
date_default_timezone_set("Europe/Sofia");
$text = preg_split('/[\n\r]+/', $_GET['text'], -1, PREG_SPLIT_NO_EMPTY);
$arraySort = [];
foreach ($text as $value1) {
    $html = '';
    $textArray = explode(';', $value1);
    $author = trim($textArray[0]);
    $dateStr = strtotime(trim($textArray[1]));
    $date = date('j F Y', $dateStr);
    $post = trim($textArray[2]);
    $likesCount = trim($textArray[3]);
    $html .= '<article>';
    $html .= '<header><span>' . htmlspecialchars($author) . '</span><time>' . htmlspecialchars($date) . '</time></header><main><p>' . htmlspecialchars($post) . '</p></main><footer><div class="likes">' . htmlspecialchars($likesCount) . ' people like this</div>';
    if (!empty($textArray[4])) {
        $html .= '<div class="comments">';
        $comments = explode('/', trim($textArray[4]));
        if (count($comments)>0) {
            foreach ($comments as $comment) {
                $html .= '<p>' . htmlspecialchars(trim($comment)) . '</p>';
            }
        }
        $html .= '</div>';
    }
    $html .= '</footer>';
    $html .= '</article>';
    $compDate = date('Y-m-d',$dateStr);
    $arraySort[$compDate] = $html;
}
krsort($arraySort);
foreach ($arraySort as $value) {
    echo $value;
}


