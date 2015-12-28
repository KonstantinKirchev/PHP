<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Most Frequent Tag</title>
</head>
<body>
<form method="get">
    Enter Tags: <br/><br/>
    <input type="text" name="tags"/>
    <input type="submit"/>
    <br/>
    <br/>
</form>
<?php
if (isset($_GET['tags'])) {
    $arr = explode(', ',$_GET['tags']);
    $arr2 = array_count_values(explode(' ', implode(' ', $arr)));
}
arsort($arr2);
foreach ($arr2 as $key => $value) {
    echo $key.' : '.$value.' times'.'<br/>';
}
echo '<br/>';
foreach ($arr2 as $key => $value) {
    die("Most Frequent Tag is: ".$key);
}
?>
</body>
</html>
