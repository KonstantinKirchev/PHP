<?php
$dateOne = $_GET['dateOne'];
$dateTwo = $_GET['dateTwo'];
$holidays = preg_split('/\n+/',$_GET['holidays']);
foreach ($holidays as $holiday) {
    echo trim($holiday).'<br/>';
}

?>