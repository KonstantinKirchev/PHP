<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML Tags Counter</title>
</head>
<body>
<form method="post">
    <label for="HTMLTags">Enter HTML tags</label><br/>
    <input type="text" name="tags"/>
    <input type="submit"/><br/>
</form>
<?php

$_SESSION['count'] = 0;
session_start();

if (isset($_POST['tags'])) {
    $tag = $_POST['tags'];
    $validTags = ['a', 'abbr', 'acronym', 'address', 'area', 'b', 'base', 'bdo', 'big', 'blockquote', 'body', 'br', 'button',
                  'caption', 'cite', 'code', 'col', 'colgroup', 'dd', 'del', 'dfn', 'div', 'dl', 'DOCTYPE', 'dt', 'em', 'fieldset',
                  'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'html', 'hr', 'i', 'img', 'input', 'ins', 'kbd', 'label', 'legend',
                  'li', 'link', 'map', 'meta', 'noscript', 'object', 'ol', 'optgroup', 'option', 'p', 'param', 'pre', 'q', 'samp', 'script',
                  'select', 'small', 'span', 'strong', 'style', 'sub', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title', 'tr', 'tt', 'ul'];
    if (in_array($tag,$validTags)) {
        $_SESSION['count']++;
        echo '<b>Valid HTML tag!</b><br/>';
        echo '<b>Score: </b>'.'<b>'.$_SESSION['count'].'</b>';
    } else {
        echo '<b>Invalid HTML tag!<b/><br/>';
        echo '<b>Score: </b>'.'<b>'.$_SESSION['count'].'</b>';
    }
}
?>
</body>
</html>
