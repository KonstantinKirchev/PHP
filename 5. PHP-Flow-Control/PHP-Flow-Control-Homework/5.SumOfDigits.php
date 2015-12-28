<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sum Of Digits</title>
</head>
<style>
    body > table > tbody > tr > td{
        border: 1px solid black;
    }
    body > table > tbody > tr > th{
        border: 1px solid black;
    }
    body > table{
        border-collapse: collapse;
        margin-top: 10px;
    }
</style>
<body>

<form method="post">
    Input string: <input type="text" name="numbers"/>
    <input type="submit"/>
</form>

<?php
if (isset($_POST['numbers']) && !empty($_POST['numbers'])) :
$input = $_POST['numbers'];
$numbers = preg_split('/[ ,]+/', $input);
?>
<table cellspacing="0">
    <?php
    foreach ($numbers as $num) :
        $sum = 0;
        $arr= str_split($num);
        foreach ($arr as $char) {
            $sum += $char;
        }
        if ($sum==0 || $num == '') {
            $sum = 'I cannot sum that';
        }
        ?>
        <tr>
            <td><?=$num?></td>
            <td><?=$sum?></td>
        </tr>

    <?php endforeach; ?>
    <?php endif; ?>
</table>
</body>
</html>
