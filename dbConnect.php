<?php
$servername = "localhost";
$username = "root";
$password = "admin1587303*";
$dbname = "librarydb";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
#echo "Connected Successfully.";
?>