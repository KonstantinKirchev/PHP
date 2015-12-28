<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (loginUser($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;

        header("Location: ../home.php");
        exit();
    }

    header("Location: ../index.php");
}