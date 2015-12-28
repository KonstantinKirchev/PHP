<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    function getUsername() {
        return $_SESSION['username'];
    }
	
    function getChartCategories() {
        $genres = getGenres();
        sort($genres);

        $output = '';
        foreach ($genres as $genre) {
            $currGenre = ucfirst($genre['genre']);
            $output .= "<li><a href='#' id='$currGenre' onclick='chart(this)'>$currGenre</a></li>";
        }

        return $output;
    }

    function isAdmin() {
        if ($_SESSION['username'] == "ttt") {
            echo "<a href='cmsUpload.php'><p>Uploads</p></a>
                  <a href='cmsRemove.php'><p>Removes</p></a>";
        }
    }

    function getTopTenChart() {
        $songs = getSongsByLikes();
        $songs = (count($songs) > 10) ? array_slice($songs, 0, 10) : $songs;

        foreach ($songs as $song) {
            $songArtist = $song["artist"];
            $songTitle = $song["title"];
            $songID = $song["id"];
            $likes = $song["likes"];

            echo "<div class='track'>
                    <aside>
                        <div>
                            <input type='button' name='$songID' class='playlist' value='' onclick='addToPlaylist(this)'/>
                            <input type='submit' name='$songID' class='cart' value='' onclick='getElementName(this)'/>
                        </div>
                    </aside>
                        <div class='song-info'>
                            <a href='info.php?song=$songID'>
                                <p>$songArtist</p>
                                <p>$songTitle</p>
                            </a>
                        </div>
                    <a href='App_Code/download.php?id=$songID'></a>
                    <div class=' likes'>
                        <input type='button' name='$songID' onclick='likeTrack(this)'>
                        <span class='span-likes$songID'>$likes</span>
                    </div>
                  </div>";
        }
    }

    function getLatestTracks() {
        $arrayOfSongs = getSongsByUpdate();
        for($i = 0; $i < 9; $i++) {
            $songID = $arrayOfSongs[$i]["id"];
            $cover = $arrayOfSongs[$i]["cover_link"];
            $title = $arrayOfSongs[$i]["artist"] . ' - ' . $arrayOfSongs[$i]["title"];

            echo "<a href='info.php?song=$songID'><div class='album'>" .
                "<img src='$cover' alt='Song Cover'/>" .
                "<p>$title</p>" .
                "</div></a>";
        }
    }

    function getSong($songID) {
        $songInfo = getSongByID($songID);

        $songArtist = $songInfo['artist'];
        $songTitle = $songInfo['title'];
        $songGenre = ucfirst($songInfo['genre']);
        $songCover = $songInfo['cover_link'];
        $songLink = $songInfo['song_link'];
        $songLikes = $songInfo["likes"];

        echo "<div class='track'>
            <img src='$songCover' alt='Song Cover'/>
            <p class='song-title'><span>Artist: </span>  $songArtist</p>
            <p class='song-title'><span>Title: </span>  $songTitle</p>
            <p class='song-genre'><span>Genre: </span>  $songGenre</p>
            <input type='button' name='$songID' onclick='likeTrack(this)' value='$songLikes'>
            <a href='App_Code/download.php?id=$songID'>DOWNLOAD</a>
             <input type='button' class='add-playlist' name='$songID' onclick='addToPlaylist(this)' value='ADD TO PLAYLIST'>
            <audio id='$songID' class='player' controls>
                <source src='$songLink' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio>
        </div>";
    }

    function getPlaylist($playlistID) {
        $songs = getPlaylistByID($playlistID);

        echo $songs;
    }

    function getSongs() {
        $songs = getAllSongs();

        foreach ($songs as $song) {
            $songID = $song["id"];
            $songName = $song["artist"] . ' - ' . $song["title"];
            $songCover = $song["cover_link"];

            echo "<a href='info.php?song=$songID'><div class='album'>" .
                "<img src='$songCover' alt='Song Cover'/>" .
                "<p>$songName</p>" .
                "</div></a>";
        }

    }

    function getPlaylists() {
        $playlists = getAllPlaylists();

        foreach ($playlists as $playlist) {
            $user = $playlist["username"];

            echo "<a href='info.php?playlist=$user'><div class='album'>" .
                "<img src='Images/album-cover.png' alt='Song Cover'/>" .
                "<p>$user</p>" .
                "</div></a>";
        }

    }

    function getComments($id, $type) {
        if ($type == 'song') {
            $comments = getSongComments($id);
            $path = "App_Code/comment.php";
        } else {
            $comments = getPlaylistComments($id);
            $path = "App_Code/commentPlaylist.php";
        }
        //var_dump($comments);
        foreach($comments as $comment) {
            $publisher = $comment["username"];
            $publish_date = $comment["publish_date"];
            $body = $comment["text"];

            echo "<div class='comment'>
                <p class='text'>  $body</p>
                <p class='publish-info'>Published By <span>$publisher</span> On <span class='publish-date'>$publish_date</span></p>
            </div>";
        }

        $_SESSION['songid'] = $id;
        $type = (isset($_GET['song'])) ? 'song' : 'playlist';
        echo "<div class='comment'>
                <form action=$path method='get'>
                    <input type='text' name='type' value='$type' style='display: none'/>
                    <textarea name='textarea' id='textarea' cols='30' rows='3' wrap='hard' maxlength='75'></textarea>
                    <span>Max symbols: 75</span>
                    <input type='submit'/>
                </form>
            </div>
        </section>";
    }

    function searchResult() {
        echo "<p class='joke'>This was GoogleAd thing. We are not supporting search</p>
        <div class='result-table'>
            <p>Nothing was found</p>
        </div>";
    }