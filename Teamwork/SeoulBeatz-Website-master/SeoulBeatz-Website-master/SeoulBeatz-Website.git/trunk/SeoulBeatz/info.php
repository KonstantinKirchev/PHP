<html>
<head>
    <title>Details</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/charts.css"/>
    <link rel="stylesheet" href="Styles/info.css"/>
    <link rel="stylesheet" href="Styles/popup.css"/>



    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/jquery-2.1.3.min.js"></script>
    <script src="Scripts/main.js"></script>
    <?php include 'App_Code/db.php' ?>
    <?php include 'App_Code/application.php'; ?>
    <?php include 'App_Code/chartView.php'; ?>
</head>
<body>
<div class="background-image" id="background"></div>
    <div id="wrapper">
        <header>
            <a href="home.php">
                <img src="Images/site-logo.png" alt="img is here"/>
            </a>
            <div>
                <span> <?php echo getUsername(); ?> </span>
                <div>
                    <!-- hidden menu-->
                    <?php isAdmin() ?>
                    <a href="#" id="user" onclick="chart(this)"><p>My Playlists</p></a>
                    <a href="App_Code/logout.php"><p>Log Out</p></a>
                </div>
            </div>
            <form action="App_Code/search.php" method="get">
                <input type="search" name="search" id="search"/>
                <input type="submit" name="submit" value="Search"/>
            </form>
        </header>

        <section>
            <nav>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li class="current-page"><a href="#" id="all" onclick="chart(this)">CHART</a>
                        <ul>
                            <?php echo getChartCategories(); ?>
                        </ul>
                    </li> <!-- Submenu -->
                    <li><a href="songs.php">SONGS</a></li>
                    <li><a href="playlists.php">PLAYLISTS</a></li>
                    <li><a href="contacts.php">CONTACTS</a></li>
                </ul>
            </nav>
        </section>

        <section id="content-wrapper">
            <?php
                if(isset($_GET['song'])) {
                    getSong($_GET['song']);
                    getComments($_GET['song'], 'song');
                } else if (isset($_GET['playlist'])) {
                    getPlaylist($_GET['playlist']);
                    getComments($_GET['playlist'], 'playlist');
                } else {
                    searchResult();
                }
            ?>
    </div>
    <div id="playlist-msg">
        <p id="msg"></p>
    </div>

    <script>
        var textarea = document.getElementById("textarea");
        var limit = 200;

        document.getElementById('background').style.height = window.innerHeight;

        textarea.oninput = function() {
            textarea.style.height = "";
            textarea.style.height = Math.min(textarea.scrollHeight, 300) + "px";
        };
    </script>
</body>
</html>