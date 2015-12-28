<?php
$errorLog = $_GET['errorLog'];
//\.([\w]+)?:\s*at\d+\n+.*\.(.*?)?\((.*?)?:(\d+)?\)
$pattern = '/Exception in thread ".+?" java\.[\w\W]*?\.?(\w+?):\s+\d+\s*?at[\w\W]+?\.(.*?)\((.*?):(\d+)\)/';
preg_match_all($pattern, $errorLog, $matches, PREG_SET_ORDER);
echo '<ul>';
foreach ($matches as $match) {
    $exception = htmlspecialchars($match[1]);
    $method = htmlspecialchars($match[2]);
    $fileName = htmlspecialchars($match[3]);
    $line = htmlspecialchars($match[4]);
    //<ul><li>line <strong>22</strong> - <strong>ArrayIndexOutOfBoundsException</strong> in <em>Java_Basics.java:calc</em></li></ul>
    echo '<li>';
    echo 'line <strong>'.$line.'</strong> - <strong>'.$exception.'</strong> in <em>'.$fileName.':'.$method.'</em>';
    echo '</li>';
}
echo '</ul>';
