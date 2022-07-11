<!-- redirect o login.php -->
<?php
    $_SESSION['logged_in'] = false;
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>