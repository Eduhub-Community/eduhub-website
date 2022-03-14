<?php
session_start();
session_destroy();
header("location: ./blog-admin/login.php");
?>