<?php
    include "db.php";

    if (isset($_POST['submit'])) {
        $username = $_POST['username-reg'];
        $password = $_POST['password-reg'];
        $rptPassword = $_POST['password-repeat-reg'];
        $email = $_POST['email-reg'];
        $date = new DateTime();
        $date = $date->format('y-m-d');

        if (passwordsMatch($password, $rptPassword) && registerUser($username, $password, $email, $date)) {
            session_start();
            $_SESSION['username'] = $username;

            header("Location: ../home.php");
        }
    }

    function passwordsMatch($pass, $rptPass) {
        return ($pass == $rptPass);
    }