<?php
$list = preg_split('/[\n\r]+/',$_GET['list'],-1,PREG_SPLIT_NO_EMPTY);
$minPrice = $_GET['minPrice'];
$maxPrice = $_GET['maxPrice'];
$filter = $_GET['filter'];
$order = $_GET['order'];
$products = [];
$id = 1;
foreach ($list as $product) {
    $productArray = explode(' | ', $product);
    $name = $productArray[0];
    $type = $productArray[1];
    $components = explode(', ',$productArray[2]);
    $price = floatval($productArray[3]);

    $data = [
        "name" => $name,
        "type" => $type,
        "components" => $components,
        "price" => $price,
        "id" => $id
    ];
    if ($price>=$minPrice && $price<=$maxPrice &&
        ($filter == $type || $filter == "all")) {
        $products[] = $data;
    }
    $id++;
}
usort($products,function($a,$b) use ($order){
    if ($a['price'] == $b['price']) {
        return $a['id'] - $b['id'];
    }
    if ($order == 'ascending') {
        return $a['price'] - $b['price'];
    } else {
        return $b['price'] - $a['price'];
    }
});
foreach ($products as $product) {
    echo '<div class="product" id="product'.htmlspecialchars($product['id']).'"><h2>'.htmlspecialchars($product['name']).'</h2><ul>';
    foreach ($product['components'] as $component) {
        echo '<li class="component">'.htmlspecialchars($component).'</li>';
    }
    echo '</ul><span class="price">'.htmlspecialchars(number_format($product['price'], 2, '.', '')).'</span></div>';
}

