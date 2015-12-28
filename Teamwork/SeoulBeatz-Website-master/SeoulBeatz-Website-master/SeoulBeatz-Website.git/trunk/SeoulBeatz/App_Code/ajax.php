<?php
    include "db.php";
    include "application.php";

    $username = $_SESSION['username'];;
    $songID = $_GET['id'];

    addToPlayist($username, $songID);
    header("Location: ../charts.php?genre=user");