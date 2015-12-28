<?php
    include 'db.php';
    include 'application.php';

    $user = $_SESSION['username'];
    $type = $_GET['type'];
    $id = $_SESSION['songid'];
    $comment = $_GET['textarea'];

    addComment($id, $comment, $user, $type);

    header("Location: ../info.php?song=" . $id);