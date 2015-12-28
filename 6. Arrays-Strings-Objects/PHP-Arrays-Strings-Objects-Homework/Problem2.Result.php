<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coloring Texts</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $text = str_split($_POST['text']);
    foreach ($text as $char) {
        if (ord($char)%2==0) {
            echo '<span style="color: red;">'.$char.'</span>'.' ';
        } else {
            echo '<span style="color: blue;">'.$char.'</span>'.' ';
        }

    }

}
?>
</body>
</html>
