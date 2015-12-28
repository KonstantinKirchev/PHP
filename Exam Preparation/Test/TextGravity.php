<?php
$text = $_GET['text'];
$lineLength = (int)($_GET['lineLength']);
$chars = str_split($text);
var_dump($chars);