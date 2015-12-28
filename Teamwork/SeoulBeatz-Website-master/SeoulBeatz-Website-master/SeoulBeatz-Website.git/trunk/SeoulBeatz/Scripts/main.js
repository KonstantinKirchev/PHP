function chart(elem) {
    var genre = elem.id;
    window.open('charts.php?genre=' + genre, '_self', false);
}

function addToPlaylist(elem) {
    var songID = 'id='+ elem.name;

    $.ajax({
        type:"GET",
        url: "App_Code/ajax.php",
        data: songID,
        cache: false
    }).success(function (data) {
        text = $.parseHTML(data);

        if (text == null) {
            $("#playlist-msg").addClass("info");
            $('#msg').text("Added");
        } else {
            $("#playlist-msg").addClass( "info-error" );
            $('#msg').text("This song is added to your playlist, already!");
        }

        $("#playlist-msg").fadeIn(1000);
        $("#playlist-msg").fadeOut(4000);
    });

    $("#playlist-msg").removeClass( "info info-error" );
}

function likeTrack(elem) {
    var songID = 'id='+ elem.name;

    $.ajax({
        type: "GET",
        url: "App_Code/like.php",
        data: songID,
        cache: false
    }).success(function (data) {
        text = $.parseHTML(data);

        if (text == null) {
            $("#playlist-msg").addClass( "info" );
            $('#msg').text("Liked");

            var php = "App_Code/refreshChart.php";
            $(".top-ten-chart").empty().load(php);
        } else {
            $("#playlist-msg").addClass( "info-error" );
            $('#msg').text("You liked this song, already!");
        }

        $("#playlist-msg").fadeIn(1000);
        $("#playlist-msg").fadeOut(4000);
    });

    $("#playlist-msg").removeClass( "info info-error" );
}

function playPause(elem) {
    console.log(elem.name);
    var player = document.getElementById(elem.name);

    var control = 'control-' + elem.name;
    if (document.getElementById(control).className === 'paused') {
        document.getElementById(control).className = 'playing';
        player.play();
    } else {
        document.getElementById(control).className = 'paused';
        player.pause();
    }
}