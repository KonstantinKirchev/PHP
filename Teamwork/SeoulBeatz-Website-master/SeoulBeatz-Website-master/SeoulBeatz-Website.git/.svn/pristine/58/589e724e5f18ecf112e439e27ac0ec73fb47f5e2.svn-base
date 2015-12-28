<?php
    include 'db.php';

    if ($_SESSION['username'] != "ttt") {
        header("Location: index.php");
    }

    if (isset($_GET['delete']) && isset($_GET['type'])) {
        deleteRecord($_GET['type'], $_GET['delete']);

        header("Location: ../cmsRemove.php");
    }

    function getUsers() {
        $array_users = getAllUsers();

        foreach($array_users as $user) {
            $username = $user["username"];
            $email = $user["email"];
            $join = $user["join_date"];

            echo "<tr><td>$username</td><td>$email</td><td>$join</td><td><a href='App_Code/cmsView.php?type=user&delete=$username'>DELETE</a></td></tr>";
        }
    }

    function listSongs() {
        $array_songs = getAllSongs();

        foreach($array_songs as $song) {
            $id = $song["id"];
            $songName = $song["artist"] . ' - ' . $song["title"];
            $likes = $song["likes"];

            echo "<tr><td>$id</td><td>$songName</td><td>$likes</td><td><a href='App_Code/cmsView.php?type=song&delete=$id'>DELETE</a></td></tr>";
        }
    }

    function getComment($type) {
        $array_comments = getAllComments($type);

        if ($type == "song") {
            foreach ($array_comments as $comment) {
                $id = $comment["id"];
                $commentBody = $comment["text"];
                $username = $comment["username"];
                $songName = $comment["artist"] . ' - ' . $comment["title"];

                echo "<tr><td>$id</td><td>$commentBody</td><td>$username</td><td>$songName</td><td><a href='App_Code/cmsView.php?type=comment&delete=$id'>DELETE</a></td></tr>";
            }
        } else {
            foreach ($array_comments as $comment) {
                $id = $comment["id"];
                $commentBody = $comment["text"];
                $username = $comment["username"];
                $playlist = $comment["PlaylistUser"];

                echo "<tr><td>$id</td><td>$commentBody</td><td>$username</td><td>$playlist</td><td><a href='App_Code/cmsView.php?type=comment&delete=$id'>DELETE</a></td></tr>";
            }
        }
    }