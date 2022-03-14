<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "eduhub";

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";
  ?>

