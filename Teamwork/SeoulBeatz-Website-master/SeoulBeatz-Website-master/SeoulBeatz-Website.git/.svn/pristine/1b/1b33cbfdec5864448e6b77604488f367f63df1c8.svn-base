<html>
<head>
    <title>Charts</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/charts.css"/>

    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

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

        <section class="content-wrapper">
            <?php content();?>
        </section>

        <footer>
            <p>&copy; All Rights Reserved</p>
        </footer>
    </div>

    <script>
        document.getElementById('background').style.height = window.innerHeight;
    </script>
</body>
</html>