<?php
$priceList = preg_match_all('/<tr>[\w\W]*?<td>([\w\W]*?)<\/td>[\w\W]*?<td>([\w\W]*?)<\/td>[\w\W]*?<td>([\w\W]*?)<\/td>[\w\W]*?<td>([\w\W]*?)<\/td>/',$_GET['priceList'],$match,PREG_SET_ORDER);
$result = [];
$products = [];
foreach ($match as $key => $info) {
    $product = trim($info[1]);
    $product = html_entity_decode($product);
    $category = trim($info[2]);
    $price = trim($info[3]);
    $currency = trim($info[4]);
    $result = [
        "product" => $product,
        "price" => $price,
        "currency" => $currency,
    ];
    if (!isset($products[$category])) {
        $products[$category] = [];
    }
    $products[$category][] = $result;
}
ksort($products);
foreach ($products as $key => $value){
    usort($value,function($a,$b){
        return $a["product"] > $b["product"] ? 1 : -1;
    });
    $products[$key] = $value;
}
echo json_encode($products);
?>