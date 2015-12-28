<?php
$text = $_GET['text'];
$arr = preg_match_all('/([A-Za-z\s\-]+)\s*%\s*([A-Za-z\s\-\.]+)\s*;\s*\d{2}-(\d{2})-\d{4}\s*-\s*(.*)?/',$text,$match);
$month = '';
for ($i=0;$i<count($match[1]);$i++) {
    echo "<div>\n";
//    if ($i>0) {
//        echo "</div>";
//        echo "<div>";
//    }
    echo "<b>Topic:</b> <span>".htmlspecialchars(trim($match[1][$i]))."</span>\n";
    echo "<b>Author:</b> <span>".htmlspecialchars(trim($match[2][$i]))."</span>\n";
    switch ($match[3][$i]) {
        case '01':
            $month = 'January';
            break;
        case '02':
            $month = 'February';
            break;
        case '03':
            $month = 'March';
            break;
        case '04':
            $month = 'April';
            break;
        case '05':
            $month = 'May';
            break;
        case '06':
            $month = 'June';
            break;
        case '07':
            $month = 'July';
            break;
        case '08':
            $month = 'August';
            break;
        case '09':
            $month = 'September';
            break;
        case '10':
            $month = 'October';
            break;
        case '11':
            $month = 'November';
            break;
        case '12':
            $month = 'December';
            break;
    }
    echo "<b>When:</b> <span>".htmlspecialchars(trim($month))."</span>\n";
    $trimText = str_split($match[4][$i]);
    //var_dump($trimText);
    $result = '';
    if (count($trimText)>100) {
        for ($j=0;$j<100;$j++) {
            if($trimText[$j] == '\n') { continue; }
            $result .= $trimText[$j];
        }
        $result = trim($result);
        $lastSymbol = $result[strlen($result)-1] . $result[strlen($result) - 2];
        if ($lastSymbol == "\n" || $lastSymbol == "\t" || $lastSymbol == "\s") {
            $result[strlen($result)-1] = '';
            $result[strlen($result)-2] = '';
        }
        $result .='...';
    } else {
        for ($j=0;$j<count($trimText);$j++) {
            if($j < count($trimText) - 1 && $trimText[$j] == '\\' && $trimText[$j+1] == 'n') { continue; }
            $result .= $trimText[$j];
        }
        $result = trim($result);
        $lastSymbol = $result[strlen($result)-1] . $result[strlen($result) - 2];
        if ($lastSymbol == "\n" || $lastSymbol == "\t" || $lastSymbol == "\s") {
            $result[strlen($result)-1] = '';
            $result[strlen($result)-2] = '';
        }
        $result .='...';
    }
    //var_dump($result);
    echo "<b>Summary:</b> <span>".htmlspecialchars(trim($result))."</span>\n";
    echo "</div>\n";
}

//var_dump($match);
?>