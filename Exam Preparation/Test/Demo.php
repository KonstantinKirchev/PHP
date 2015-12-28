<a href="?name=<?=urlencode("pes#ho")?>">Zdrasti</a>
<form method="post">
    <input type="text" name="username">
    <input type="password" name="passwoed">
    <input type="submit" value="Send">
</form>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="picture">
    <input type="submit">
</form>
<?php
var_dump($_GET);
var_dump($_POST);
var_dump($_FILES);