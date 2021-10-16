<?php

$con = mysqli_connect("localhost","root","","eduhub");

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$query = "INSERT INTO `contact_form` (`name`, `email`, `message`) VALUES ('$name', '$email', '$msg')";
$result = mysqli_query($con, $query);

}

?>