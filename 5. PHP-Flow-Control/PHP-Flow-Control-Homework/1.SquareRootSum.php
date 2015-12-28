<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Square Root Sum</title>
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
    }
</style>
<body>
<table cellspacing="0">
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>

<?php
$sum = 0;
for ($i=0;$i<=100;$i++):
    if ($i % 2 == 0) : ?>
    <tr>
        <td><?=$i?></td>
        <td><?=round(sqrt($i),2)?></td>
    </tr>
        <?php $sum += round(sqrt($i),2); ?>
        <?php endif; ?>
<?php endfor; ?>
    <tr>
        <th>Total:</th>
        <td><?=$sum?></td>
    </tr>
</table>
</body>
</html>
