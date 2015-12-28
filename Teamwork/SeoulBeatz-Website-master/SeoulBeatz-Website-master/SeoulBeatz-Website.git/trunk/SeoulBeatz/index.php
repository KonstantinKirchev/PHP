<html>
<head>
    <title>Welcome To Seoul Beatz</title>

    <link rel="stylesheet" href="Styles/login-registration.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="Images/vynil_logo.png" />

</head>
<body>
<div class="background-image" id="background"></div>
<div id="wrapper">
    <section class="registration">
        <form action="App_Code/registration.php" method="post">
            <ul>
                <li>
                    <label for="username-reg">Username</label>
                    <input type="text" id="username-reg" name="username-reg" required />
                </li>
                <li>
                    <label for="password-reg">Password</label>
                    <input type="password" id="password-reg" name="password-reg" required />
                </li>
                <li>
                    <label for="password-repeat-reg">Confirm Password</label>
                    <input type="password" id="password-repeat-reg" name="password-repeat-reg" required />
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email-reg" required />
                </li>
                <li>
                    <input type="submit" name="submit" />
                </li>
            </ul>
        </form>
    </section>
    <section class="login">
        <form action="App_Code/login.php" method="post">
            <ul>
                <li>
                    <label for="username-login">Username</label>
                    <input type="text" id="username-login" name="username" />
                </li>
                <li>
                    <label for="password-login">Password</label>
                    <input type="password" id="password-login" name="password"/>
                </li>
                <li>
                    <input type="submit" name="submit"/>
                </li>
            </ul>
        </form>
    </section>
</div>

<script>
    document.getElementById('background').style.height = window.innerHeight;
    document.getElementById('wrapper').style.height = window.innerHeight - 30;
</script>

</body>
</html>