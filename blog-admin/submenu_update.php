<?php
require '../db.php';
include './sidebar.php';
if(!isset($_SESSION['isUserLoggedIn'])){

    header("location: login.php");
  
  }
$id = $_GET['id'];

$catShow = "SELECT * FROM  submenu WHERE id = $id";
$catQue = mysqli_query($conn, $catShow);
$catArr = mysqli_fetch_assoc($catQue);

if(isset($_POST['catBtn'])){
    $catName = $_POST['catName'];
    $submenuURL = $_POST['submenuUrl'];
}

if(isset($_POST['catBtn'])){
    $catNameUp = $_POST['catName'];
    $submenuURLUp = $_POST['submenuUrl'];

    $catUpe =  "UPDATE `submenu` SET `name` = '$catNameUp', `action` = '$submenuURL' WHERE `submenu`.`id` = '$id';";
    $catQue = mysqli_query($conn, $catUpe);

    ?>

    <?php
    if($catQue){
        header("location: ./post.php?managemenu");
    }else{
        echo "<script>alert('not updated')</script>";
    }
    
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Home | Codlog Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
    
<section style="width: 80%; margin-left: 20rem; ">
<h1 >Edit  Menu</h1>
<form action="" method="post" id="cat_name">
  <label for="">Menu Name</label>
  <input type="text" name="catName"  class="form-control" value="<?= $catArr['name']?>">
  <label for="">Menu Link</label>
  <input type="text" name="submenuUrl"  class="form-control" value="<?= $catArr['action']?>">
  <input type="submit" value="Edit Menu" class="btn sb-btn-2" name="catBtn">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>