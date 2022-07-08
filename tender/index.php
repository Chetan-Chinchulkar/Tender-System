<!-- redirect o login.php -->
<?php
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
?>