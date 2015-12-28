<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Randomizer</title>
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

<form method="post">
    Enter cars <input type="text" name="cars"/>
    <input type="submit" value="Show result"/>
</form>

    <?php
    if (isset($_POST['cars']) && !empty($_POST['cars'])) :
        $carList = $_POST['cars'];
        $cars = preg_split('/[ ,]+/', $carList);
    ?>
<table cellspacing="0">
    <tr>
        <th>Car</th>
        <th>Color</th>
        <th>Count</th>
    </tr>
    <?php
    $colors = ['red','blue','green','yellow','black','grey'];
    foreach ($cars as $carName) :
        $count = rand(1, 5);
        $randColor = array_rand($colors);
    ?>
        <tr>
            <td><?=$carName?></td>
            <td><?=$colors[$randColor]?></td>
            <td><?=$count?></td>
        </tr>

<?php endforeach; ?>
<?php endif; ?>
</table>
</body>
</html>
