<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Tags</title>
</head>
<body>
<form method="get">
    Enter Tags: <input type="text" name="tags"/>
    <input type="submit"/>
</form>
<?php
if (isset($_GET['tags'])) {
    $arr = explode(', ',$_GET['tags']);
}
foreach ($arr as $key => $value) {
    echo $key .":".$value."<br/>";
}
?>
</body>
</html>
