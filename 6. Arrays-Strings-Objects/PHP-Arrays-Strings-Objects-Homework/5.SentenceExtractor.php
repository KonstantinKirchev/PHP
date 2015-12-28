<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sentence Extractor</title>
</head>
<body>
<form method="post">
    <textarea name="text" id="text" cols="30" rows="10">This is my cat! And this is my dog. We happily live in Paris – the most beautiful city in the world! Isn’t it great? Well it is :)
    </textarea><br/>
    <input type="text" name="word"/><br/>
    <input type="submit" name="submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $word = $_POST['word'];
    $sentences = preg_match_all('/[^.?!]+[.?!]/',$text, $matches);
    //var_dump($matches);
    foreach ($matches[0] as $value) {
        if (preg_match('/\b' . $word . '\b/i', $value, $matches)) {
            echo $value.'<br/>';
        }
    }
}
?>
</body>
</html>
