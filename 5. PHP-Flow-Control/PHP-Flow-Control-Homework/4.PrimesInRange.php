<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Primes In Range</title>
</head>
<body>

<form method="post">
    Start Index: <input type="text" name="start"/>
    End: <input type="text" name="end"/>
    <input type="submit" value="Submit"/>
</form>

<?php
if (isset($_POST['start']) && !empty($_POST['start']) &&
    isset($_POST['end']) && !empty($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    for ($i = $start; $i <= $end; $i++) {
        $counter = 0;
        for ($j = 1; $j <= $i; $j++) {
            if ($i % $j == 0) {
                $counter++;
            }
        }
        if ($counter==2) {
            echo "<b>$i</b>, ";
        }else{
            echo $i.", ";
        }
    }
}
?>
</body>
</html>