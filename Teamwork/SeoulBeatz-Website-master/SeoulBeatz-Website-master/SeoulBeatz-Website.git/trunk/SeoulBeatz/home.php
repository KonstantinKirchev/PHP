<html>
<head>
    <title>Home</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/home.css"/>
    <link rel="stylesheet" href="Styles/popup.css"/>

    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/jquery-2.1.3.min.js"></script>
    <script src="Scripts/main.js"></script>

    <?php include 'App_Code/db.php' ?>
    <?php include 'App_Code/application.php'; ?>
</head>
<body onload="imageSwitch()">
<div class="background-image" id="background"></div>
    <div id="wrapper">
        <header>
            <a href="home.php">
                <img src="Images/site-logo.png" alt="img is here"/>
            </a>
            <div>
                <span> <?php echo getUsername(); ?> </span>
                <div>
                    <!-- hidden menu -->
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
                    <li class="current-page"><a href="home.php">HOME</a></li>
                    <li><a href="#" id="all" onclick="chart(this)">CHART</a>
                        <ul>
                            <?php echo getChartCategories(); ?>
                        </ul>
                    </li> <!-- Submenu -->
                    <li><a href="songs.php">SONGS</a></li>
                    <li><a href="playlists.php">PLAYLISTS</a></li>
                    <li><a href="contacts.php">CONTACTS</a></li>
                </ul>
            </nav>

            <section class="releases-preview"> <!-- Sliding Images -->
                <img src="Images/img0.jpg" alt="test" id="sliding-image"/>
            </section>

            <section class="content-wrapper">
                <section class="album-section">
                    <!-- Albums Section -->
                    <p>Latest Song Releases</p>
                    <?php echo getLatestTracks(); ?>
                </section>

                <aside class="top-ten-chart">
                    <!-- Top 10 Chart -->
                    <p>Top 10 Chart</p>
                    <?php getTopTenChart(); ?>
                </aside>
            </section>
        </section>

        <div id="playlist-msg">
            <p id="msg"></p>
        </div>

        <footer>
            <p>&copy; All Rights Reserved</p>
        </footer>
    </div>

    <script>
        var counter = 0;
        function imageSwitch() {
            setInterval(function changeBackground() {
            document.getElementById('background').style.backgroundImage = "url(Images/img" + counter + ".jpg)";
            document.getElementById('sliding-image').src = "Images/img" + counter + ".jpg";

            counter = (counter + 1) % 5;
            }, 5000);
        }
    </script>
</body>
</html>