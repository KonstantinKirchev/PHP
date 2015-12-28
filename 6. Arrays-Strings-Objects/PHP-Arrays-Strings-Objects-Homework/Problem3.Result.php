<?php
if (isset($_POST['submit'])) :
    $arrCategories = explode(', ',$_POST['categories']);
    $arrTags = explode(', ',$_POST['tags']);
    $arrMonths = explode(', ',$_POST['months']);?>
    <ul style="list-style-type: circle;background-color: lightblue; width: 130px; border: 1px solid black; border-radius: 10px">
        <h2 style="margin: 0">Categories</h2>
        <hr/>
        <?php foreach ($arrCategories as $value) :?>

            <li style="text-decoration: underline"><?php echo $value ?></li>

        <?php endforeach ?>
    </ul>
    <ul style="list-style-type: circle; background-color: lightblue; width: 130px; border: 1px solid black; border-radius: 10px">
        <h2 style="margin: 0">Tags</h2>
        <hr/>
    <?php foreach ($arrTags as $value) :?>

            <li style="text-decoration: underline"><?php echo $value ?></li>

    <?php endforeach ?>
    </ul>
    <ul style="list-style-type: circle; background-color: lightblue; width: 130px; border: 1px solid black; border-radius: 10px">
        <h2 style="margin: 0">Months</h2>
        <hr/>
        <?php foreach ($arrMonths as $value) :?>

            <li style="text-decoration: underline"><?php echo $value ?></li>

        <?php endforeach ?>
    </ul>
<?php endif ?>
