<?php

function connectDB() {
    $servername = "sql4.freemysqlhosting.net:3306";
    $username = "sql474546";
    $password = "yT2!hZ5!";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    $conn->select_db('sql474546');

    return $conn;
}

function registerUser($pUsername, $pPassword, $usrEmail, $date) {
    $conn = connectDB();

    if (!empty($pUsername) && !empty($pPassword)) {
        // escape the $pUsername to avoid SQL Injections
        $eUsername = mysqli_real_escape_string($conn, $pUsername);
        $sql = "SELECT username FROM Users WHERE username = '$eUsername';";

        // Note the use of trigger_error instead of or die.
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        if (mysqli_num_rows($query) == 0) {
            // All errors passed lets
            // Create our insert SQL by hashing the password and using the escaped Username.
            $pPassword = md5($pPassword);
            $sql = "INSERT INTO Users VALUES('$pUsername', '$pPassword', '$usrEmail', '$date');";
            $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

            if ($query) {
                $sql = "INSERT INTO Playlists VALUES(NULL, DEFAULT , '$eUsername');";
                $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

                $conn->close();

                return true;
            }
        }
    }

    $conn->close();

    return false;
}

function loginUser($pUsername, $pPassword) {
    $conn = connectDB();

    // See if the username and password are valid.
    $eUsername = mysqli_real_escape_string($conn, $pUsername);
    $pPassword = md5($pPassword);

    $sql = "SELECT username FROM Users WHERE username = '$eUsername' AND password = '$pPassword';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    // If one row was returned, the user was logged in!
    if (mysqli_num_rows($query) == 1) {
        $conn->close();

        return true;
    }


    return false;
}

function getAllUsers() {
    $conn = connectDB();

    $sql = "SELECT username, email, join_date FROM Users;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $output_array = array();
    while ($song = mysqli_fetch_assoc($query)) {
        array_push($output_array, $song);
    }

    $conn->close();

    return $output_array;
}

function getAllSongs() {
    $conn = connectDB();

    $sql = "SELECT id, artist, title, cover_link, likes FROM Songs;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $output_array = array();
    while ($user = mysqli_fetch_assoc($query)) {
        array_push($output_array, $user);
    }

    $conn->close();

    return $output_array;
}

function getAllComments($type) {
    $conn = connectDB();

    if ($type == "song") {
        $sql = "SELECT Comments.id, Comments.text, Comments.username, Songs_Comments.song_id, Songs.artist, Songs.title
            FROM Comments
            INNER JOIN Songs_Comments ON Comments.id = Songs_Comments.comment_id
            INNER JOIN Songs ON Songs_Comments.song_id = Songs.id";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        $output_array = array();
        while ($user = mysqli_fetch_assoc($query)) {
            array_push($output_array, $user);
        }
    } else {
        $sql = "SELECT Comments.id, Comments.text, Comments.username, Playlist_Comments.playlist_id, Playlists.username AS PlaylistUser
                FROM Comments
                INNER JOIN Playlist_Comments ON Comments.id = Playlist_Comments.comment_id
                INNER JOIN Playlists ON Playlist_Comments.playlist_id = Playlists.id;";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        $output_array = array();
        while ($user = mysqli_fetch_assoc($query)) {
            array_push($output_array, $user);
        }
    }

    $conn->close();

    return $output_array;
}

function getSongByID($songID) {
    $conn = connectDB();

    $sql = "SELECT * FROM Songs WHERE id = '$songID';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $conn->close();

    return mysqli_fetch_assoc($query);
}

function getSongsByGenre($genre) {
    $conn = connectDB();

    $sql = ($genre == '*') ? "SELECT * FROM Songs;" :  "SELECT * FROM Songs WHERE genre = '$genre' ORDER BY likes DESC;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $counter = 0;
    $result = array();
    while($row = mysqli_fetch_assoc($query)) {
        $result[$counter]= $row;
        $counter += 1;
    }

    $conn->close();

    return $result;
}

function getSongsByLikes() {
    $conn = connectDB();

    $sql = "SELECT * FROM Songs ORDER BY likes DESC;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $counter = 0;
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[$counter]= $row;
        $counter += 1;
    }

    $conn->close();

    return $result;
}

function getSongsByUpdate() {
    $conn = connectDB();

    $sql = "SELECT * FROM Songs ORDER BY id DESC;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $counter = 0;
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[$counter]= $row;
        $counter += 1;
    }

    $conn->close();

    if (count($result) > 9) {
        $result = array_slice($result, 0, 9);
    }

    return $result;
}

function getAllPlaylists() {
    $conn = connectDB();

    $output = array();
    $sql = "SELECT username FROM Playlists;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    while($playlist = mysqli_fetch_assoc($query)) {
        array_push($output, $playlist);
    }

    $conn->close();

    return $output;

}

function getUserPlaylists() {
    $conn = connectDB();

    $output = '';
    //Get All User Playlists
    $username = $_SESSION['username'];
    $sql = "SELECT id FROM Playlists WHERE username ='$username';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    while($playlist = mysqli_fetch_assoc($query)) {
        $output .= "<section class='chart'>" . "<p>My Playlist</p>";

        $playlist_id = $playlist["id"];

        $sql_playlists = "SELECT song_id FROM Playlist_Songs WHERE Playlist_Songs.playlist_id = '$playlist_id';";
        $query_playlists = mysqli_query($conn, $sql_playlists) or trigger_error("Query Failed: " . mysql_error());

        while($song = mysqli_fetch_assoc($query_playlists)) {
            $song_id = $song["song_id"];

            $sql_song = "SELECT * FROM Songs WHERE Songs.id = '$song_id';";
            $query_song = mysqli_query($conn, $sql_song) or trigger_error("Query Failed: " . mysql_error());

            while($currSong =  mysqli_fetch_assoc($query_song)) {
                $songID = $currSong["id"];
                $songArtist = $currSong["artist"];
                $songTitle = $currSong["title"];
                $songGenre = $currSong["genre"];
                $songLink = $currSong["song_link"];

                $output .= "<div class='track'>
                            <input type='button' value='' name='$songID' id='control-$songID' class='paused' onclick='playPause(this)'/>
                                            <audio id='$songID'>
                                                <source src='$songLink' type='audio/mpeg'>
                                            </audio>
                            <p class='song-title'>$songArtist - $songTitle</p>
                            <p class='song-genre'>$songGenre</p>
                            <p class='song-length'>3:25</p>
                        </div>";
            }

        }

        $output .= "</section>";
    }

    $conn->close();

    return $output;
}

function getPlaylistByID($playlistUser) {
    $conn = connectDB();
    $output = "<section class='chart'>" . "<p><span>$playlistUser</span>'s Playlist</p>";

    $sql_playlists = "SELECT id FROM Playlists WHERE Playlists.username = '$playlistUser';";
    $query_playlists = mysqli_query($conn, $sql_playlists) or trigger_error("Query Failed: " . mysql_error());

    $playlistID = mysqli_fetch_assoc($query_playlists);
    $playlistID = $playlistID["id"];

    $sql_playlists = "SELECT song_id FROM Playlist_Songs WHERE Playlist_Songs.playlist_id = '$playlistID';";
    $query_playlists = mysqli_query($conn, $sql_playlists) or trigger_error("Query Failed: " . mysql_error());

    while($song = mysqli_fetch_assoc($query_playlists)) {
        $song_id = $song["song_id"];

        $sql_song = "SELECT * FROM Songs WHERE Songs.id = '$song_id';";
        $query_song = mysqli_query($conn, $sql_song) or trigger_error("Query Failed: " . mysql_error());

        while($currSong =  mysqli_fetch_assoc($query_song)) {
            $songID = $currSong["id"];
            $songArtist = $currSong["artist"];
            $songTitle = $currSong["title"];
            $songGenre = $currSong["genre"];
            $songLink = $currSong["song_link"];

            $getID3 = new getID3;
            $mixinfo = $getID3->analyze($songLink);
            $play_time = $mixinfo["playtime_string"];

            $output .= "<div class='track'>
                <input type='button' value='' name='$songID' id='control-$songID' class='paused' onclick='playPause(this)'/>
                <audio id='$songID'>
                    <source src='$songLink' type='audio/mpeg'>
                </audio>
                <p class='song-title'>$songArtist - $songTitle</p>
                <p class='song-genre'>$songGenre</p>
                <p class='song-length'>$play_time</p>
            </div>";
        }

    }

    $output .= "</section>";

    $conn->close();

    return $output;
}

function getGenres() {
    $conn = connectDB();

    $sql = "SELECT DISTINCT genre FROM Songs;";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $counter = 0;
    $result = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $result[$counter] = $row;
        $counter += 1;
    }

    $conn->close();

    return $result;
}

function addToPlayist($username, $songID) {
    $conn = connectDB();

    $sql = "SELECT id FROM Playlists WHERE username ='$username';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $playlistID = mysqli_fetch_assoc($query);
    $playlistID = $playlistID['id'];

    $sql = "SELECT * FROM Playlist_Songs WHERE song_id = '$songID' AND playlist_id ='$playlistID';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    if (mysqli_num_rows($query) == 0) {
        $sql = "INSERT INTO Playlist_Songs VALUES('$songID', '$playlistID');";

        if ($query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error())) {

            $conn->close();
            exit();
        }
    }

    $conn->close();
    throw new Exception('Already Liked', 666);
}

function like($username, $songID) {
    $conn = connectDB();

    $sql = "SELECT * FROM Likes WHERE song_id = '$songID' AND username = '$username'";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    if (mysqli_num_rows($query) == 0) {
        $sql = "UPDATE Songs SET likes = likes + 1 WHERE id = '$songID'";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        $sql = "INSERT INTO Likes VALUES ('$songID', '$username');";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        $conn->close();
        exit();
    }

    $conn->close();
    throw new Exception('Already Liked', 666);
}

function getPath($songID) {
    $conn = connectDB();

    $sql = "SELECT * FROM Songs WHERE id = '$songID';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
    $path = mysqli_fetch_assoc($query);

    return $path;
}

function addComment($id, $comment, $user, $type) {
    $conn = connectDB();

    $comment = htmlentities($comment);

    $sql = "INSERT INTO Comments VALUES (null, '$comment', '$user', null);";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $sql = "SELECT id FROM Comments WHERE text = '$comment' AND username = '$user' ORDER BY id DESC";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $commentID = mysqli_fetch_assoc($query);
    $commentID = $commentID["id"];

    if ($type == "song") {
        $sql = "INSERT INTO Songs_Comments VALUES ('$id', '$commentID');";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
    } else {
        $sql = "SELECT id FROM Playlists WHERE username = '$id';";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

        $id = mysqli_fetch_assoc($query);
        $id = $id["id"];

        $sql = "INSERT INTO Playlist_Comments VALUES ('$id', '$commentID');";
        $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
    }

    $conn->close();
}

function getSongComments($songID) {
    $conn = connectDB();

    $sql = "SELECT comment_id FROM Songs_Comments WHERE song_id = '$songID';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $result = array();
    while ($commentInfo = mysqli_fetch_assoc($query)) {
        $commentID = $commentInfo["comment_id"];

        $sql_comment = "SELECT * FROM Comments WHERE id = '$commentID';";
        $query_comment = mysqli_query($conn, $sql_comment) or trigger_error("Query Failed: " . mysql_error());

        while ($comment = mysqli_fetch_assoc($query_comment)) {
            array_push($result, $comment);
        }
    }

    $conn->close();

    return $result;
}

function getPlaylistComments($playlistUsername) {
    $conn = connectDB();

    $sql = "SELECT id FROM Playlists WHERE username = '$playlistUsername';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $playlistID = mysqli_fetch_assoc($query);
    $playlistID = $playlistID["id"];

    $sql = "SELECT comment_id FROM Playlist_Comments WHERE playlist_id = '$playlistID';";
    $query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());

    $result = array();
    while ($commentInfo = mysqli_fetch_assoc($query)) {
        $commentID = $commentInfo["comment_id"];

        $sql_comment = "SELECT * FROM Comments WHERE id = '$commentID';";
        $query_comment = mysqli_query($conn, $sql_comment) or trigger_error("Query Failed: " . mysql_error());

        while ($comment = mysqli_fetch_assoc($query_comment)) {
            array_push($result, $comment);
        }
    }

    $conn->close();

    return $result;
}

function deleteRecord($type, $rec) {
    $conn = connectDB();

    if ($type == "user") {
        $sql = "DELETE FROM Users WHERE username = '$rec';";

        mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
    } else if ($type == "song") {
        $sql = "DELETE FROM Songs WHERE id = '$rec';";
        $sql_likes = "DELETE FROM Likes WHERE song_id = '$rec';";
        $sql_playlist = "DELETE FROM Songs_Playlists WHERE song_id = '$rec';";

        mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
        mysqli_query($conn, $sql_likes) or trigger_error("Query Failed: " . mysql_error());
        mysqli_query($conn, $sql_playlist) or trigger_error("Query Failed: " . mysql_error());
    } else {
        $sql = "DELETE FROM Comments WHERE id = '$rec';";
        $sql_songs = "DELETE FROM Songs_Comments WHERE comment_id = '$rec';";
        $sql_playlists = "DELETE FROM Playlists_Comments WHERE comment_id = '$rec';";

        mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
        mysqli_query($conn, $sql_songs) or trigger_error("Query Failed: " . mysql_error());
        mysqli_query($conn, $sql_playlists) or trigger_error("Query Failed: " . mysql_error());
    }

    $conn->close();
}