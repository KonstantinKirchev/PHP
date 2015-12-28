<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>InformationTable</title>
</head>
<body>
<table>
    <?php
    $name = 'Konstantin';
    $phoneNumber = '0882-321-423';
    $age = 24;
    $address = 'Hadji Dimitar';
    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>$name</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

