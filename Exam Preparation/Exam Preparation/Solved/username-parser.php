<?php
$list = $_GET['list'];
$names = preg_split('/[\n\r]+/',trim($list));
$minLength = (int)$_GET['length'];
echo '<ul>';
for ($i=0;$i<count($names);$i++) {
    if (isset($_GET['show'])) {
        if (strlen(trim($names[$i]))>=$minLength) {
            echo '<li>'.htmlspecialchars($names[$i]).'</li>';
        } else {
            echo '<li style="color: red;">'.htmlspecialchars($names[$i]).'</li>';
        }
    } else {
        if (strlen(trim($names[$i]))>=$minLength) {
            echo '<li>'.htmlspecialchars($names[$i]).'</li>';
        }
    }
}
echo '</ul>';
?>