<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculate Interest</title>
</head>
<body>
<form method="post">
    Enter Amount <input type="text" name="amount"/><br/>
    <input type="radio" name="currency" value="USD"/> USD
    <input type="radio" name="currency" value="EUR"/> EUR
    <input type="radio" name="currency" value="BGN"/> BGN <br/>
    Compound Interest Amount <input type="text" name="interest"/><br/>
    <select name="months" id="months">
        <option value="6">6 Months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit"/>
</form>
<?php
if (isset($_POST['amount']) &&
    isset($_POST['currency']) &&
    isset($_POST['months']) &&
    isset($_POST['interest'])) {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $months = $_POST['months'];
    $interest = $_POST['interest'];
    for ($i = 0; $i < $months; $i++) {
        $amount *= ((100 + ($interest / 12))/100);
    }
    if ($currency === 'USD') {
        echo '$ ' . round($amount, 2);
    } else if ($currency === 'EUR') {
        echo "&#128; "  . round($amount, 2);
    } else if ($currency === 'BGN') {
        echo round($amount, 2). ' левa' ;
    }
}
?>
</body>
</html>