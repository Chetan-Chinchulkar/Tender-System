<!-- add connection to database tender -->
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$link = mysqli_connect($servername, $username, $password);
mysqli_select_db($link, "tender");

// Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>