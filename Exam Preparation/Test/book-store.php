<?php
date_default_timezone_set("Europe/Sofia");
$text = preg_split('/[\r\n]+/', $_GET['text'], -1, PREG_SPLIT_NO_EMPTY);
$minPrice = floatval($_GET['min-price']);
$maxPrice = floatval($_GET['max-price']);
$sort = $_GET['sort'];
$order = $_GET['order'];
$result = [];
$output = [];
foreach ($text as $info) {
    $info = explode('/', $info);
    $author = $info[0];
    $name = $info[1];
    $genre = $info[2];
    $price = floatval($info[3]);
    //var_dump($price);
    $publishDate = $info[4];
    $bookInfo = $info[5];
    if ($price >= $minPrice && $price <= $maxPrice) {
        $result = [
            "author" => $author,
            "name" => $name,
            "genre" => $genre,
            "price" => $price,
            "publishDate" => $publishDate,
            "bookInfo" => $bookInfo
        ];
        $output[] = $result;
    }
}
//var_dump($output);
if ($sort == 'genre') {
    usort($output, function ($a, $b) use ($order) {
        if ($a['genre'] == $b['genre']) {
            return date_create($a['publishDate']) > date_create($b['publishDate']);
        }
        if ($order == 'ascending') {
            return $a['genre'] > $b['genre'] ? 1 : -1;
        } else {
            return $a['genre'] < $b['genre'] ? 1 : -1;
        }
    });
} else if ($sort == 'author') {
    usort($output, function ($a, $b) use ($order) {
        if ($a['author'] == $b['author']) {
            return date_create($a['publishDate']) > date_create($b['publishDate']);
        }
        if ($order == 'ascending') {
            return $a['author'] > $b['author'] ? 1 : -1;
        } else {
            return $a['author'] < $b['author'] ? 1 : -1;
        }
    });
} else if ($sort == 'publish-date') {
    usort($output, function ($a, $b) use ($order) {
        if ($order=='ascending') {
            return date_create($a['publishDate']) > date_create($b['publishDate']);
        } else {
            return date_create($b['publishDate']) > date_create($a['publishDate']);
        }
    });
}
//var_dump($output);
foreach ($output as $value) {
    echo '<div><p>'.htmlspecialchars($value['name']).'</p><ul><li>'.htmlspecialchars($value['author']).'</li><li>'.htmlspecialchars($value['genre']).'</li><li>'.number_format($value['price'],2).'</li><li>'.htmlspecialchars($value['publishDate']).'</li><li>'.htmlspecialchars($value['bookInfo']).'</li></ul></div>';
}
?>