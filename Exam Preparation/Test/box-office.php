<?php
$list = preg_split('/[\r\n]+/', $_GET['list']);
$minSeats = (int)$_GET['minSeats'];
$maxSeats = (int)$_GET['maxSeats'];
$filter = $_GET['filter'];
$order = $_GET['order'];
$movieName = '';
$genre = '';
$result = [];
$output = [];
foreach ($list as $row) {
    $info = preg_split('/[\/\-]/', $row);
    preg_match_all('/([\w\W]+?)\s\((.*?)\)/', $info[0], $match, PREG_SET_ORDER);
    $movieName = $match[0][1];
    $genre = $match[0][2];
    $stars = explode(', ', trim($info[1]));
    $seatsFilled = (int)trim($info[2]);
    if ($seatsFilled >= $minSeats && $seatsFilled <= $maxSeats && ($filter == $genre || $filter == 'all')) {
        $result = [
            "movie" => $movieName,
            "stars" => $stars,
            "seats" => $seatsFilled
        ];
        $output[] = $result;
    }
}
//var_dump($output);
usort($output, function ($a, $b) use ($order) {
    if ($a['movie'] == $b['movie']) {
        return $a['seats'] - $b['seats'];
    }
    if ($order == 'ascending') {
        return $a['movie'] > $b['movie'] ? 1 : -1;
    } else {
        return $a['movie'] < $b['movie'] ? 1 : -1;
    }
});
//var_dump($output);
foreach ($output as $value) {
    echo '<div class="screening"><h2>'.htmlspecialchars($value['movie']).'</h2><ul>';
    foreach ($value['stars'] as $star) {
        echo '<li class="star">'.htmlspecialchars($star).'</li>';
    }
    echo '</ul><span class="seatsFilled">'.htmlspecialchars($value['seats']).' seats filled</span></div>';
}
?>