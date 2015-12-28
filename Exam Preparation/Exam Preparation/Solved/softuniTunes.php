<?php
$text = $_GET['text'];
$artist = $_GET['artist'];
$property = $_GET['property'];
$order = $_GET['order'];

$information = preg_split('/[\n\r]+/', $text, -1, PREG_SPLIT_NO_EMPTY);
$results = [];
$result = [];
foreach ($information as $row) {
    $info = explode('|', $row);
    //var_dump($info);
    $song = trim($info[0]);
    $genre = trim($info[1]);
    $artists = explode(', ', trim($info[2]));
    asort($artists);
    $downloads = (int)trim($info[3]);
    $rating = floatval(trim($info[4]));
    $results = [
        "song" => $song,
        "genre" => $genre,
        "artists" => $artists,
        "downloads" => $downloads,
        "rating" => $rating
    ];
    if (in_array($artist, $artists)) {
        $result[] = $results;
    }
}
//var_dump($result);
if ($property == 'name') {
    usort($result, function ($a, $b) use ($order) {
        if ($order == 'ascending') {
            return $a['song'] > $b['song'] ? 1 : -1;
        } else {
            return $a['song'] < $b['song'] ? 1 : -1;
        }
    });
} else if ($property == 'genre') {
    usort($result, function ($a, $b) use ($order) {
        if ($a['genre'] == $b['genre']) {
            return $a['song'] > $b['song'] ? 1 : -1;
        }
        if ($order == 'ascending') {
            return $a['genre'] > $b['genre'] ? 1 : -1;
        } else {
            return $a['genre'] < $b['genre'] ? 1 : -1;
        }
    });
} else if ($property == 'downloads') {
    usort($result, function ($a, $b) use ($order) {
        if ($a['downloads'] == $b['downloads']) {
            return $a['song'] > $b['song'] ? 1 : -1;
        }
        if ($order == 'ascending') {
            return $a['downloads'] - $b['downloads'];
        } else {
            return $b['downloads'] - $a['downloads'];
        }
    });
} else if ($property == 'rating') {
    usort($result, function ($a, $b) use ($order) {
        if ($a['rating'] == $b['rating']) {
            return $a['song'] > $b['song'] ? 1 : -1;
        }
        if ($order == 'ascending') {
            return $a['rating'] > $b['rating'] ? 1 : -1;
        } else {
            return $a['rating'] < $b['rating'] ? 1 : -1;
        }
    });
}

echo "<table>\n";
echo "<tr><th>Name</th><th>Genre</th><th>Artists</th><th>Downloads</th><th>Rating</th></tr>\n";
foreach ($result as $row) {
    echo "<tr><td>" . htmlspecialchars($row['song']) . "</td><td>" . htmlspecialchars($row['genre']) . "</td><td>" . htmlspecialchars(implode(', ', $row['artists'])) . "</td><td>" . $row['downloads'] . "</td><td>" . $row['rating'] . "</td></tr>\n";
}
echo '</table>';
?>