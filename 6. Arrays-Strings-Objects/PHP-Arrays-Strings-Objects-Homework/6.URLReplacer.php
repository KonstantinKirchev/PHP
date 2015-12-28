<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Replacer</title>
</head>
<body>
<form method="post">
    <textarea name="text" id="text" cols="30" rows="10"><\p>Come and visit <a href="http://softuni.bg">the Software University</a> to master the art of programming. You can always check our <a href="www.softuni.bg/forum">forum</a> if you have any questions.<\/p>
    </textarea><br/>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $pattern = '/<a\s+href="(.*?)>(.*?)<\/a>/';
    $replace = '[URL=\1]\2[/URL]';
    $text = preg_replace($pattern,$replace,$text);
    echo $text;
}
?>
</body>
</html>
