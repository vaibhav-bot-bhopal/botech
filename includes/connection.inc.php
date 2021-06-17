<?php
$servername = "localhost";
$username = "onelife_wildmp";
$password = "dolphin123$";
$dbname = "onelife_wildmp";
// error_reporting(0);
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>
