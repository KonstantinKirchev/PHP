<?php
    include 'db.php';
    $songs = getSongsByLikes();
    $songs = (count($songs) > 10) ? array_slice($songs, 0, 10) : $songs;

    echo "<p>Top 10 Chart</p>";
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
                            <input type='button' name='$songID' class='like-button' onclick='likeTrack(this)'>
                            <span class='span-likes$songID'>$likes</span>
                        </div>
                      </div>";
    }