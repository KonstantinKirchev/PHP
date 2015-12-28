
<?php
$text = $_GET['text'];
$key = $_GET['key'];
$first = $key[0];
$last = $key[strlen($key)-1];
$specialChars = preg_match('/'.$first.'([A-Za-z0-9])+([^A-Za-z0-9]+)+([A-Za-z0-9])+'.$last.'/',$key,$match);
//var_dump($match);
$group1 = $match[1];
$chars = $match[2];
$group2 = $match[3];
//echo $group2."<br/>";
if (($group1>=0 && $group1<=9) && ($group2>='A' && $group2<='Z')) {
    $words = preg_match_all('/'.$first.'[0-9\s]*#"[A-Z\s]*'.$last.'(.*?)'.$first.'[0-9\s]*#"[A-Z\s]*'.$last.'/',$text,$matches);
} else if (($group1>=0 && $group1<=9) && ($group2>='a' && $group2<='z')) {
    $words = preg_match_all('/'.$first.'[0-9\s]*#"[a-z\s]*'.$last.'(.*?)'.$first.'[0-9\s]*#"[a-z\s]*'.$last.'/',$text,$matches);
} else if (($group2>=0 && $group2<=9) && ($group1>='a' && $group1<='z')) {
    $words = preg_match_all('/'.$first.'[a-z\s]*#"[0-9\s]*'.$last.'(.*?)'.$first.'[a-z\s]*#"[0-9\s]*'.$last.'/',$text,$matches);
} else if (($group2>=0 && $group2<=9) && ($group1>='A' && $group1<='Z')) {
    $words = preg_match_all('/'.$first.'[A-Z\s]*#"[0-9\s]*'.$last.'(.*?)'.$first.'[A-Z\s]*#"[0-9\s]*'.$last.'/',$text,$matches);
}
//$words = preg_match_all('/'.$first.'[^'.$first.']*'.$chars.'[^'.$last.']*'.$last.'(.*?)'.$first.'[^'.$first.']*'.$chars.'[^'.$last.']*'.$last.'/',$text,$matches);
//var_dump($matches);
$result = '';
foreach ($matches[1] as $value) {
    $result .= $value;
}
echo $result;

?>


