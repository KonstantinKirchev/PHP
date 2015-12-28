<html>
<head>
    <title>Admin Panel</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/cmsUpload.css"/>

    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/main.js"></script>
    <?php include 'App_Code/db.php' ?>
    <?php include 'App_Code/application.php'; ?>
    <?php include 'App_Code/cmsView.php'; ?>
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
                <li><a href="#">HOME</a></li>
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
    </section>

    <section class="content">
        <p>Upload Songs</p>

        <form enctype="multipart/form-data" action="uploaded.php" method="post">
            <label for="song-artist">Artist: </label> <input type="text" name="artist" id="song-artist"/>
            <label for="song-title">Title: </label> <input type="text" name="title" id="song-title"/>
            <label for="genre">Genre: </label> <input type="text" name="genre" id="genre"/>
            <label for="upload-cover">Select cover: </label> <input type="file" name="upload-cover" id="upload-cover"/>
            <label for="upload-song">Select song: </label> <input type="file" name="upload-song" id="upload-song"/>
            <input type="submit" value="Upload"/>
        </form>
    </section>
</div>

<script>
    document.getElementById('background').style.height = window.innerHeight;
</script>
</body>
</html>