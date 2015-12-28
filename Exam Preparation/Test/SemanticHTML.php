<?php
$text = $_GET['html'];
$arrReplace = preg_match_all('/<(div).*?(\s*[id|class]+\s*=\s*"(.*?)")[\w\W]+?<\/(div)>(\s+<!--\s*(\3)\s*-->)/',$text,$match);
$replace = str_replace($match[2][0],'',$text);
$replace1 = str_replace($match[1][0],$match[6][0],$replace);
$replace2 = str_replace($match[5][0],'',$replace1);
echo $replace2;
//var_dump($replace2);
?>