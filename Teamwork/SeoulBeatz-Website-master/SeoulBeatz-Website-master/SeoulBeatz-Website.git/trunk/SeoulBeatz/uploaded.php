<html>
<head>
    <title>Uploaded</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/cmsUpload.css"/>

    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/main.js"></script>
    <?php include 'App_Code/db.php' ?>
    <?php include 'App_Code/application.php'; ?>
    <?php include 'App_Code/cmsView.php'; ?>
</head>

<body>
<?php
        $result = '';
        $file = $_FILES['upload-song'];
        $cover = $_FILES['upload-cover'];

        $genre = $_POST['genre'];
        $title = $_POST['title'];
        $artist = $_POST['artist'];

        $fileName = $_POST['title'];
        $fileTMP = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $file_ext = explode('.', $fileName);
        move_uploaded_file($cover['type'], 'Images/Songs_Covers'.$title);
        if ($fileError === 1 || $fileError === 0) {
            if ($fileSize <= 1.5 * 1024 * 1024) { //1.5MB
                //$file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = 'Audio/' . $title;
                move_uploaded_file($file['type'], $file_destination);
                $result = 'File successfully uploaded!';
            } else {
                $result =  'File size must be less, than 1.5 MB.';
            }
        } else {
            $result = 'An error occurred.';
        }
?>
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
        <p><?php
            echo $result;

            ?></p>
        <div id="ret_cmsUpl"><a style="color: #000000;" href="cmsUpload.php">BACK TO UPLOADS</a></div>
    </section>
</div>

<script>
    document.getElementById('background').style.height = window.innerHeight;
</script>
</body>
</html>