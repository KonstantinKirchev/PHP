<?php
    include "db.php";
    require_once('getid3/getid3.php');

    function generateCharts($genre)
    {
        $songs = getSongsByGenre($genre);
        $genreFormat = ucfirst($genre);

        echo "<section class='chart'>";
            if (count($songs) > 0) {
                $songs = (count($songs) > 10) ? array_slice($songs, 0, 10) : $songs;
                echo "<p>Chart $genreFormat</p>";

                foreach ($songs as $song) {
                    $songID = $song["id"];
                    $songArtist = $song["artist"];
                    $songTitle = $song["title"];
                    $songGenre = $song["genre"];
                    $songLink = $song["song_link"];

                    $getID3 = new getID3;
                    $mixinfo = $getID3->analyze($songLink);
                    $play_time = $mixinfo["playtime_string"];

                    echo "<div class='track'>
                                            <input type='button' value='' name='$songID' id='control-$songID' class='paused' onclick='playPause(this)'/>
                                            <audio id='$songID'>
                                                <source src='$songLink' type='audio/mpeg'>
                                            </audio>
                                            <p class='song-title'>$songArtist - $songTitle</p>
                                            <p class='song-genre'>$songGenre</p>
                                            <p class='song-length'>$play_time</p>
                                          </div>";
                }
            } else {
                echo "<p>No Playlist To Be Displayed</p>";
        }
        echo "</section>";
    }

    function generateAllCharts() {
        $genres = getGenres();

        sort($genres);
        foreach ($genres as $genre) {
            $output = $genre["genre"];
            generateCharts($output);
        }
    }

    function content() {
        //Get URL
        $genre = preg_split("/[=]/", $_SERVER['REQUEST_URI'])[1];
        //Check Genre
        $genre = ($genre !== 'all') ? $genre : '*';
        //Call generateCharts

        if ($genre == 'user') {
            getMyPlaylists();
        } else if ($genre == '*'){
            generateAllCharts();
        } else {
            generateCharts($genre);
        }

    }

    function getMyPlaylists() {
        $playlists = getUserPlaylists();

        echo $playlists;
    }