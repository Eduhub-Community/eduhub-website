<?php

use Monolog\Handler\WhatFailureGroupHandler;

require '../db.php';
require '../function.php';
if(!isset($_SESSION['isUserLoggedIn'])){

    header("location: login.php");
  
  };
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

  <title>Add Post | Eduhub Blog Admin Pane</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

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
    <div>
 

    <?php include './sidebar.php'; ?>


    </div>

  <?php
  if(isset($_GET['managecomment'])){
      ?>
 <section style="width: 80%; margin-left: 20rem; ">
<h1>Manage Comments</h1>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Comments
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No.</th>
                    <th>User Name</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>Commented On</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 0;
                    
                    $catsel = "SELECT * FROM comments  ORDER  BY id   DESC";
                    $catque = mysqli_query($conn, $catsel);
                    while($cat = mysqli_fetch_assoc($catque)){
                      $no++;
                      ?>
                      
<tr>
                    <td><?= $no?></td>
                    <td><?= $cat ['name'] ?></td>
                    <td><?= $cat ['comment'] ?></td>
                    <td><?= getPost($conn, $cat ['post_id'])?></td>
                    <td><?= date('F jS, Y',strtotime($cat['commented_at'])) ?></td>
              
                    <td>
                      <div class="btn-group">
                        
                       
                        <a class="btn btn-danger" href="./comment_delete.php?id=<?= $cat['id']?>">Remove&nbsp; <i class="fa fa-trash" aria-hidden="true"></i></a>
                       
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
 </section>



      <?php
  }
  elseif(isset($_GET['managepost'])){
        ?>
 <section style="width: 80%; margin-left: 20rem; ">


<h1>Manage Post</h1>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Posts
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No.</th>
                    <th>Post Title</th>
                    <th>Post Category</th>
                    <th>Posted On</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 0;
                    
                    $catsel = "SELECT * FROM posts  ORDER  BY id   DESC";
                    $catque = mysqli_query($conn, $catsel);
                    while($cat = mysqli_fetch_assoc($catque)){
                      $no++;
                      ?>
                      
<tr>
                    <td><?= $no?></td>
                    <td><?= $cat ['title'] ?></td>
                    <td><?=  $cat ['catagory_id']?></td>
                    <td><?= date('F jS, Y',strtotime($cat['created_at'])) ?></td>
              
                    <td>
                      <div class="btn-group">
                        
                        <a class="btn btn-success" href="./post_update.php?id=<?= $cat['id']?>">Edit&nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" href="./post_delete.php?id=<?= $cat['id']?>">Remove&nbsp; <i class="fa fa-trash" aria-hidden="true"></i></a>
                       
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
 </section>
        <?php
  }
  elseif(isset($_GET['managemenu'])){
    ?>
    <section style="width: 80%; margin-left: 20rem; ">


        <h1>Manage Menu</h1>
        

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

              <header class="panel-heading">
                Menu - <a  class="text-primary" id="addMenu">Add New Menu</a>  
              </header>
           <script>
           document.querySelector('#addMenu').onclick = function(){
            Swal.fire({
  title: 'Create New Menu',
  width: 600,
  size: 40,
  html:
    '<form method = "POST"> ' +
    '<label>Enter Menu Name</label>'+
    '  <input type="text" name="menuName"  class="form-control"> ' +
    '<label>Enter URL</label>'+
    '  <input type="text" name="menuAction"  class="form-control" value="#"> ' +
    '  <input type="submit" value="Add Menu" class="btn sb-btn-2" name="catBtn">'+
    '</form>',
  showCloseButton: true,
  showCancelButton: false,
  showOkButton:false,
  focusConfirm: false,
  
})
          }
             
           </script>
           <?php
if(isset($_POST['catBtn'])){
  $catName = $_POST['menuName'];
  $menuAction = $_POST['menuAction'];

  $addcat = "INSERT INTO menu (name, action) VALUES ('$catName', '$menuAction')";
  $addcatque = mysqli_query($conn, $addcat);
  if($addcatque){
    // echo "<script> alert('Category Added'); </script>";
  }else{
    echo "<script> alert('Please Try Again'); </script>";
    
  }
}
?>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No.</th>
                    <th>Menu</th>
                    <th>Link</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 0;
                    
                    $catsel = "SELECT * FROM menu";
                    $catque = mysqli_query($conn, $catsel);
                    while($cat = mysqli_fetch_assoc($catque)){
                      $no++;
                      ?>
                      
<tr>
                    <td><?= $no?></td>
                    <td><?= $cat ['name'] ?></td>
                    <td><a href="../<?= $cat ['action'] ?>"> <?= $cat ['action'] ?></a></td>
              
                    <td>
                      <div class="btn-group">
                        
                        <a class="btn btn-success" href="./menu_update.php?id=<?= $cat['id']?>">Edit&nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" href="./menu_delete.php?id=<?= $cat['id']?>">Remove&nbsp; <i class="fa fa-trash" aria-hidden="true"></i></a>
                       
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>



        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

              <header class="panel-heading">
               Sub Menu - <a  href="./add_submenu.php" class="text-primary" id="addsubMenu">Add New Sub Menu</a>  
              </header>

         
           <?php
if(isset($_POST['catBtn'])){
  $catName = $_POST['submenuName'];
  $parentId = $_POST['parent-id'];
  $menuAction = $_POST['submenuAction'];

  $addcat = "INSERT INTO submenu (name, action) VALUES ('$catName', '$menuAction')";
  $addcatque = mysqli_query($conn, $addcat);
  if($addcatque){
    // echo "<script> alert('Category Added'); </script>";
  }else{
    echo "<script> alert('Please Try Again'); </script>";
    
  }
}
?>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No.</th>
                    <th>Parent Menu Id</th>
                    <th>Sub Menu</th>
                    <th>Link</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 0;
                   
                   
                    $catsel = "SELECT * FROM submenu";
                    $catque = mysqli_query($conn, $catsel);
                    while($submenu = mysqli_fetch_assoc($catque)){
                      $no++;
                      ?>
                      
<tr>
                    <td><?= $no?></td>
                    <td><?= getMenuName($conn, $submenu ['menu_id']) ?></td>
                    <td><?= $submenu ['name'] ?></td>
                    <td><a href="../<?= $submenu ['action'] ?>"> <?= $submenu ['action'] ?></a></td>
              
                    <td>
                      <div class="btn-group">
                        
                        <a class="btn btn-success" href="./submenu_update.php?id=<?= $submenu['id']?>">Edit&nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" href="./submenu_delete.php?id=<?= $submenu['id']?>">Remove&nbsp; <i class="fa fa-trash" aria-hidden="true"></i></a>
                       
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>

    </section>
    <?php
  }
  elseif(isset($_GET['managecategory'])){
?>
<section style="width: 80%; margin-left: 20rem; ">
<h1 >Manage Category</h1>

<button type="button" class="btn sb-btn-1" id="addCat">Add New Category</button>
<form action="" method="post" id="cat_name">
  <label for="">Enter Category Name</label>
  <input type="text" name="catName"  class="form-control">
  <input type="submit" value="Add Category" class="btn sb-btn-2" name="catBtn">
</form>


<?php
if(isset($_POST['catBtn'])){
  $catName = $_POST['catName'];

  $addcat = "INSERT INTO catagory (name) VALUES ('$catName')";
  $addcatque = mysqli_query($conn, $addcat);
  if($addcatque){
    // echo "<script> alert('Category Added'); </script>";
  }else{
    echo "<script> alert('Please Try Again'); </script>";
    
  }
}
?>
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Category
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No.</th>
                    <th>Catagoty Name</th>
                    <th>Action</th>
                  </tr>

                  <?php
                    $no = 0;
                    
                    $catsel = "SELECT * FROM catagory";
                    $catque = mysqli_query($conn, $catsel);
                    while($cat = mysqli_fetch_assoc($catque)){
                      $no++;
                      ?>
                      
<tr>
                    <td><?= $no?></td>
                    <td><?= $cat ['name'] ?></td>
              
                    <td>
                      <div class="btn-group">
                        
                        <a class="btn btn-success" href="./cat_update.php?id=<?= $cat['id']?>">Edit&nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></a>
                       
                      </div>
                    </td>
                  </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
        
        
        </section>

<?php
  }else{
      ?>
    <section style="width: 80%; margin-left: 20rem; ">
  <h1>Add Post</h1>
    <form action="./add_post.php" method="post"enctype="multipart/form-data" class="form-horizontal "style="position: relative; top:100px; " >
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="post_title" id="" placeholder="" required>
                 
                  </div>
                  </div><br>
                
 
   <!-- Bootsrep Editor -->
   <div class="col-sm-12">
        <div class="form-group">
        <label for="">Content</label>
      <textarea name="post_content" id="editor" class="form-control" required></textarea><br>
        </div>
   </div>
   <div class="row">
       <div class="col-sm-6">
                   <div class="form-group col-sm-12">
                     <label for="">Select Post Categoty</label>
                     <select class="form-control" name="post_category" id="">
 
                     <?php
                         $allctsel = "SELECT * FROM catagory";
                         $allctque = mysqli_query($conn, $allctsel);
                         while($allct = mysqli_fetch_assoc($allctque)){
 
                             ?>
                                 <option value="<?= $allct ['id'] ?>"><?= $allct ['name']?></option>
                                 
 
                             <?php
                         }
                     ?>
                  </select>
                   </div>
                   </div>
       <div class="col-sm-6">
                   <div class="form-group col-sm-12">
                     <label for="">Upload Image</label>
                     <input type="file" name="post_image" class="form-control" id="formFile" accept="image/png, image/gif, image/jpeg" r>
                   </div>
                   </div>

                 

   </div>
     
   <input type="submit" value="Publish" class="btn sb-btn btn-block" name="addPost">
    </form>

                    
                </section>
      <?php
  }

  ?>

  

   
   



    <!-- javascripts -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="./CKEditor/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });


      CKEDITOR.replace('editor');
      var editor = CKEDITOR.replace( 'ckfinder' );
CKFinder.setupCKEditor( editor );

$(document).ready( function () {
    $('#table_id').DataTable();
} );

      document.querySelector('#cat_name').style.display = 'none';

        document.querySelector('#addCat').onclick = function (){
          document.querySelector('#cat_name').style.display = 'block';
        }
        
    </script>
</body>