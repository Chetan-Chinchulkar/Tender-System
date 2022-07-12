<!-- add connection to database tender -->
<?php
$servername = "localhost";
$rootuser = "root";
$rootpass = "";
$dbname = "Tender";
$table = "tender_table";



// Create connection
$link = mysqli_connect($servername, $rootuser, $rootpass);
mysqli_select_db($link, $dbname);

// Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>