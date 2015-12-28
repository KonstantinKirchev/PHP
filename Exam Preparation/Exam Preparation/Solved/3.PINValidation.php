<?php
$name = $_GET['name'];
$gender = $_GET['gender'];
$pin = $_GET['pin'];
$checkSum = 0;
$str = preg_match('/[A-Z][a-z]+\s+[A-Z][a-z]+/',$name);
if ($str==0) {
    die('<h2>Incorrect data</h2>');
}
if (strlen($pin)==10) {
    $year = (int)($pin[0].$pin[1]);
    $month = (int)($pin[2].$pin[3]);
    $day = (int)($pin[4].$pin[5]);
//echo $year;
//var_dump($month);
    if ($month > 1 && $month < 13) {
        $year = '19'.$year;
    } else if ($month > 21 && $month < 33) {
        $year = '18'.$year;
    } else if ($month > 41 && $month < 53) {
        $year = '20'.$year;
    }
    //echo $year;
    $num = (int)$pin[8];
    $maleOrFemale = '';
    if ($num % 2 == 0) {
        $maleOrFemale = 'male';
    } else {
        $maleOrFemale = 'female';
    }
    //echo $maleOrFemale;
    if ($maleOrFemale != $gender) {
        die('<h2>Incorrect data</h2>');
    }
    $checkSum = (int)$pin[0]*2 + (int)$pin[1]*4 + (int)$pin[2]*8 + (int)$pin[3]*5 + (int)$pin[4]*10 + (int)$pin[5]*9 + (int)$pin[6]*7 + (int)$pin[7]*3 + (int)$pin[8]*6;
    $remainder = $checkSum % 11;
    if ($remainder==10) {
        $remainder=0;
    }
    if ($remainder != (int)$pin[9]) {
        die('<h2>Incorrect data</h2>');
    }
    $arrName = preg_split('/\s+/',$name);
    if (count($arrName)!=2) {
        die('<h2>Incorrect data</h2>');
    }
    $result = [
        "name" => $name,
        "gender" => $gender,
        "pin" => $pin
    ];
    echo json_encode($result);
} else {
    die('<h2>Incorrect data</h2>');
}
?>