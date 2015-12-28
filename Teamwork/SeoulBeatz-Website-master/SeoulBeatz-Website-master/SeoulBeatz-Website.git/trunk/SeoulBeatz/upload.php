<html>
<head>
    <title>Upload</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/upload.css"/>

    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/jquery-2.1.3.min.js"></script>
    <script src="Scripts/main.js"></script>

    <?php include 'App_Code/application.php'; ?>
    <?php include 'App_Code/db.php' ?>
</head>
<body onload="imageSwitch()">
<div class="background-image" id="background"></div>
<div id="wrapper">
    <header>
        <img src="Images/site-logo.png" alt="img is here"/>
        <div>
            <span> <?php echo getUsername(); ?> </span>
            <div>
                <!-- hidden menu -->
                <a href="#" id="user" onclick="chart(this)"><p>My Playlists</p></a>
                <a href="App_Code/logout.php"><p>Log Out</p></a>
            </div>
        </div>
        <form action="search.php" method="post">
            <input type="search" name="search" id="search"/>
            <input type="submit" name="submit" value="Search"/>
        </form>
    </header>
    <section>
        <div id="container">
            <form action="uploaded.php" method="get">
                <label for="#">
                    File: <input type="file" name="file"/> <br/>
                    Song name: <input type="text" name="song_name"/> <br/>
                    Artist: <input type="text" name="artist"/> <br/>
                    Release date: <input type="date" name="date"/> <br/>
                    <input type="submit" value="submit"/>
                </label>
            </form>
        </div>
    </section>
    <footer>
        <p>&copy; All Rights Reserved</p>
    </footer>
</div>
</body>
</html>