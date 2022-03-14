<?php
require '../db.php';
include './Includes/sidebar.php';
if(!isset($_SESSION['isUserLoggedIn'])){

    header("location: login.php");
  
  }
  if(isset($_POST['catBtn'])){
    $catName = $_POST['submenuName'];
    $parentId = $_POST['parent-id'];
    $menuAction = $_POST['submenuAction'];
  
    $addcat = "INSERT INTO submenu (name,menu_id, action) VALUES ('$catName', $parentId, '$menuAction')";
    $addcatque = mysqli_query($conn, $addcat);
    if($addcatque){
        header("location: ./post.php?managemenu");
    //   echo "<script> alert('Category Added'); </script>";
    }else{
      echo "<script> alert('Please Try Again'); </script>";
      
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
<form action="" method="post">
    <label for="">Enter Submenu Name</label>
    <input type="text" name="submenuName" class="form-control">
    <label for="">Select Parent Menu</label>
    <select name="parent-id" id="" class="form-control">
        <?php
            $query = "SELECT * FROM menu";
            $run  = mysqli_query($conn, $query);
            while($menu = mysqli_fetch_assoc($run)){
                ?>
                <option value="<?= $menu  ['id'] ?>"><?= $menu ['name'] ?></option>

                <?php
            }

?>
    </select>
    <label for="">Enter Submenu Url</label>
    <input type="text" name="submenuAction" class="form-control">
    <input type="submit" value="Add Sub Menu" name="catBtn" class="btn sb-btn-2">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>