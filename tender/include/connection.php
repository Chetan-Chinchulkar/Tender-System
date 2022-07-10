<!-- add connection to database tender -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tender";
$table = "tender_table";

$_SESSION['logged_in'] = false;

// Create connection
$link = mysqli_connect($servername, $username, $password);
mysqli_select_db($link, $dbname);

// Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>