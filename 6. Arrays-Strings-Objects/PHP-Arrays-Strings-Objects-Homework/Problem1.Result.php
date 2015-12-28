<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Mapper</title>
</head>

<body>

<?php
if (isset($_POST['submit'])) {
    $text = strtolower($_POST['text']);
    $pattern = '/[A-Za-z]+/';
    $count = preg_match_all($pattern, $text, $results);
    //var_dump($results);
    $results[0] = array_unique($results[0]);

    foreach ($results[0] as $match): ?>
        <table style="background-color: gray; border: 1px solid black">
            <tr>
                <td style="border: 1px solid black; width: 50px"><?php echo $match ?></td>
                <td style="border: 1px solid black"><?php echo substr_count($text, $match) . '<br/>'; ?></td>
            </tr>

        </table>

    <?php endforeach ?>
<?php
}
?>
</body>
</html>