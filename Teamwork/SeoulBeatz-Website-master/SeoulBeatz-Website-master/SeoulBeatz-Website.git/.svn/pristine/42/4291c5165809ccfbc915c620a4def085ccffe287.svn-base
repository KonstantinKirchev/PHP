<?php // download.php
    include "db.php";

    $songID = $_GET['id'];

    $result = getPath($songID);
    $songTitle = $result['artist'] . ' - ' . $result['title'] . '.mp3';
    $path = $result['song_link'];

    $file = '../' . $path;

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: audio/mpeg3');
        header('Content-Disposition: attachment; filename=' . $songTitle);
        readfile($file);
        exit;
    }