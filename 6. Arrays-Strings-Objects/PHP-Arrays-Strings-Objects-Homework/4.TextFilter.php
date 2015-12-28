<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text Filter</title>
</head>
<body>
<form method="post">
    <textarea name="text" id="text" cols="30" rows="10">It is not Linux, it is GNU/Linux. Linux is merely the kernel while GNU adds the functionality. Therefore we owe it to them by calling the OS GNU/Linux!Sincerely, a Windows client
    </textarea><br/>
    <input type="text" name="banlist"/><br/>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];

    $banlist = explode(', ',$_POST['banlist']);
    foreach ($banlist as $value) {
        $replace = '';
        for ($i=0;$i<strlen($value);$i++) {
            $replace .= '*';
        }
        if(preg_match('/' . $value . '/i', $text)) {
            $text=str_replace($value, $replace, $text);
        }
    }
 echo  $text;
}
?>
</body>
</html>