<?php
$_GET = array (
    'today' => '27/08/2014',
    'invoices' =>
        ["11/05/2013 | Sopharma | Paracetamol | 20.54 lv", "11/05/2013 | Sopharma | Analgin | 57.45 lv", "02/12/2011 | Actavis | Aulin | 120.54 lv", "13/05/2009 | Sopharma | Tamiflu | 221.54 lv", "23/01/2014 | Actavis | Paracetamol | 7.54 lv", "11/05/2013 | Actavis | Paracetamol | 17.54 lv"]
);
?>
<?php
date_default_timezone_set("Europe/Sofia");

$today = $_GET['today'];
$deliveries = $_GET['invoices'];

//convert today to unix timestamp
$bitsToday = explode('/',$today);
$currDateToday = strtotime($bitsToday[1].'/'.$bitsToday[0].'/'.$bitsToday[2]);

$dataBase = array();

for ($i = 0; $i < count($deliveries); $i++) {

    $currentDeliver =  explode("|", $deliveries[$i]);
    //we trim the intervals if any
    foreach ($currentDeliver as $key => $delivery){
        $currentDeliver[$key] = trim($delivery);
    }

    //convert date to unix timestamp
    $currDate = $currentDeliver[0];
    $bits = explode('/',$currDate);
    $currDate = strtotime($bits[1].'/'.$bits[0].'/'.$bits[2]);

    //get other parameters
    $currCompany = $currentDeliver[1];
    $currMedicine = $currentDeliver[2];
    $currValue = (double)$currentDeliver[3];
    $currValue = $currValue.'';

    //we work only with the invoices from the last five years
    if($currDate >= strtotime("-5 years",$currDateToday)) {

        if (
            !array_key_exists($currDate, $dataBase) ||
            !array_key_exists($currCompany, $dataBase[$currDate]) //&&
            //!array_key_exists($currValue, $dataBase[$currDate][$currCompany])
        ) {
            $dataBase[$currDate][$currCompany][$currValue] = array();
            $dataBase[$currDate][$currCompany][$currValue][] = $currMedicine;
        } else {
            //update medicine and values of current invoice
            foreach ($dataBase[$currDate][$currCompany] as $value => $medicine) {
                $newKey = $value + $currValue;
                $newKey = $newKey.'';
                $dataBase[$currDate][$currCompany][$newKey] = $dataBase[$currDate][$currCompany][$value];
                unset($dataBase[$currDate][$currCompany][$value]);
                $dataBase[$currDate][$currCompany][$newKey][] =  $currMedicine;
            }


        }
    }
}

ksort($dataBase);
echo "<ul>";
foreach ($dataBase as $date => $companies) {
    ksort($companies);
    echo '<li><p>'.date("d/m/Y", $date).'</p>';
    foreach ($companies as $company => $values) {
        echo '<ul><li><p>'.$company.'</p>';
        foreach ($values as $value => $medicine) {
            asort($medicine);
            echo '<ul><li><p>'.implode(",",$medicine).'-'.$value.'lv</p></li></ul>';
        }
        echo '</li></ul>';
    }
    echo '</li>';
}
echo "</ul>";


//date_default_timezone_set("Europe/Sofia");
//$today = explode('/',$_GET['today']);
//$today = strtotime($today[1].'/'.$today[0].'/'.$today[2]);
//$invoices = $_GET['invoices'];
//$invoice = [];
//foreach ($invoices as $row) {
//    $info = preg_split('/\s*\|\s*/', $row, -1, PREG_SPLIT_NO_EMPTY);
//    $invoiceDate = $info[0];
//    $date = explode('/',$invoiceDate);
//    $date = strtotime($date[1].'/'.$date[0].'/'.$date[2]);
//    $company = $info[1];
//    $drug = $info[2];
//    $cost = floatval($info[3]);
//    if ($date >= strtotime('-5 years',$today)) {
//        if (!array_key_exists($date,$invoice) || !array_key_exists($company,$invoice[$date])) {
//            $invoice[$date][$company][$cost.''][] = $drug;
//        } else {
//            $oldKey = key($invoice[$date][$company]);
//            $newKey = ($oldKey + $cost) .'';
//            $invoice[$date][$company][$newKey] = $invoice[$date][$company][$oldKey];
//            $invoice[$date][$company][$newKey][] = $drug;
//            unset($invoice[$date][$company][$oldKey]);
//        }
//    }
//}
////print_r($invoice);
////ksort($invoice);
////print_r($invoice);
////foreach ($invoice as &$date) {
////    ksort($date);
////    foreach ($date as $newKey => &$drug) {
////        foreach ($drug as &$value) {
////            asort($value);
////        }
////    }
////}
////print_r($invoice);
//echo '<ul>';
//foreach ($invoice as $date => $companies) {
//    ksort($companies);
//    echo '<li><p>'.date("d/m/Y", $date).'</p>';
//    foreach ($companies as $company => $values) {
//        echo '<ul><li><p>'.$company.'</p>';
//        foreach ($values as $value => $medicine) {
//            asort($medicine);
//            echo '<ul><li><p>'.implode(",",$medicine).'-'.$value.'lv</p></li></ul>';
//        }
//        echo '</li></ul>';
//    }
//    echo '</li>';
//}
//echo '</ul>';

?>