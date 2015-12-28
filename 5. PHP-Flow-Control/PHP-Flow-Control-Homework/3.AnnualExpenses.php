<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Annual Expenses</title>
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
    Enter number of years: <input type="text" name="years"/>
    <input type="submit" value="Show costs"/>
</form>

<?php
if (isset($_POST['years']) && !empty($_POST['years'])) :
$years = $_POST['years'];
?>
<table cellspacing="0">
    <tr>
        <th>Year</th>
        <th>January</th>
        <th>February</th>
        <th>March</th>
        <th>April</th>
        <th>May</th>
        <th>June</th>
        <th>July</th>
        <th>August</th>
        <th>September</th>
        <th>October</th>
        <th>November</th>
        <th>December</th>
        <th>Total:</th>
    </tr>
    <?php
    for ($i = 0; $i < $years; $i++) :
        $sum = 0;

    ?>
        <tr>
        <td><?=1015 - $i?></td>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
            <?php $count = rand(0, 1000); ?>
        <td><?=$count?></td>
            <?php $sum += $count; ?>
        <td><?=$sum?></td>
    </tr>
    <?php endfor; ?>
    <?php endif; ?>
</table>
</body>
</html>
