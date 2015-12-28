<html>
<head>
    <title>Contacts</title>

    <link rel="stylesheet" href="Styles/basic-template.css"/>
    <link rel="stylesheet" href="Styles/contacts.css"/>
    <link rel="stylesheet" href="Styles/fonts.css"/>

<<<<<<< HEAD
=======
    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

    <script src="Scripts/main.js"></script>

    <?php include 'App_Code/db.php' ?>
    <?php include 'App_Code/application.php'; ?>

>>>>>>> 02c29db52b61287cdc0fa5ceab45f1966949b191
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
                <a href="playlists.php" id="user" onclick="chart(this)"><p>My Playlists</p></a>
                <a href="App_Code/logout.php"><p>Log Out</p></a>
            </div>
        </div>
        <form action="App_Code/search.php" method="get">
            <input type="search" name="search" id="search"/>
            <input type="submit" name="submit" value="Search"/>
        </form>
    </header>
    <section>
        <nav class="nav">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="#" id="all" onclick="chart(this)">CHART</a>
                    <ul>
                        <?php echo getChartCategories(); ?>
                    </ul>
                </li> <!-- Submenu -->
                <li><a href="songs.php">SONGS</a></li>
                <li><a href="playlists.php">PLAYLISTS</a></li>
                <li class="current-page"><a href="contacts.php">CONTACTS</a></li>
            </ul>
        </nav>

    <section id="contacts">
        <div class="inner">
            <header>
                <h2>Contacts</h2>
            </header>
            <div class="content">
                <div class="half left">
                    <h3>Getting in touch is easy!</h3>
                    <div class="address">Sofia, Bulgaria<br>Izgrev, Tintqva 15-17</div>
                    <div class="mobile">
                        <div><a href="https://www.google.bg/maps/@52.4793527,62.1857845,16z?hl=en">Find us here!</a></div>
                    </div>
                    <div class="email">
                        <a href="put@mail.here">fake@mail.com</a>
                    </div>
                    <div class="social"><a class="icon-facebook" href="https://www.facebook.com/" target="_blank"></a>
                        <a class="icon-twitter" href="https://www.twitter.com/" target="_blank"></a>
                        <a class="icon-pinterest" href="http://www.pinterest.com/" target="_blank"></a>
                        <a class="icon-behance" href="http://www.behance.net/" target="_blank"></a>
                        <a class="icon-dribbble" href="http://www.dribbble.com/" target="_blank"></a>
                        <a class="icon-vimeo" href="http://www.vimeo.com/" target="_blank"></a>
                    </div>
                </div>
                <div class="half end">
                    <div class="contact-form">
                        <form id="contact" action="App_Code/sendMail.php" method="post">
                            <input name="name" id="form_name" title="name" class="input" type="text" placeholder="Your name" required="">
                            <input name="sender_email" id="form_email" title="email" class="input" type="email" placeholder="Your email" required="" >
                            <textarea name="message" id="form_message" title="message" placeholder="Write us about any project. We'd love to work with you!" required=""></textarea>
                            <input type="submit" value="Send us the message!" name="submit" class="button animated">
                            <div id="response"></div>
                        </form>
                    </div>
                    <div class="member-link"><a href="home.php" class="open-modal" data-toggle="modal">Are you bored? Listen to some music!</a></div>
                </div>
            </div>
        </div>
    </section>
    </section>
    <footer>
        <p>&copy; All Rights Reserved</p>
    </footer>
</div>

<script type="text/javascript" src="Scripts/jquery-2.1.3.min.js"></script>
<script>
    $('#contact').on('submit', function(e) {
        e.preventDefault();

        var data = {
            name: $('#form_name').val(),
            sender_email: $('#form_email').val(),
            message: $('#form_message').val()
        };

        $.ajax({
            url: 'http://localhost/SeoulBeatz-Website/SeoulBeatz/App_Code/sendMail.php',
            method: 'POST',
            data: data
        }).done(function(html) {
            $('#response').html(html);
            $('#form_name').val('');
            $('#form_email').val('');
            $('#form_message').val('');

        }).fail(function(err) {
            console.log(err);
        });
    });
</script>

</body>
</html>
