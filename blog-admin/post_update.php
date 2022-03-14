<?php

use Monolog\Handler\WhatFailureGroupHandler;

require '../db.php';
require '../function.php';
if(!isset($_SESSION['isUserLoggedIn'])){

    header("location: login.php");
  
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
    
<?php include './sidebar.php'; ?>
<section style="width: 80%; margin-left: 20rem; ">
  <h1>Add Post</h1>
    <form action="" method="post"enctype="multipart/form-data" class="form-horizontal "style="position: relative; top:100px; " >
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Title</label>

                    <?php
                    $id = $_GET['id'];
                        $postsel = "SELECT * FROM posts WHERE id = $id";
                        $run = mysqli_query($conn, $postsel);
                        $data = mysqli_fetch_assoc($run);
                    ?>
                    <input type="text" class="form-control" name="post_title" id="" placeholder="" required value="<?=$data ['title']?>">
                 
                  </div>
                  </div><br>
                    <!-- Bootsrep Editor -->
   <div class="col-sm-12">
        <div class="form-group">
        <label for="">Content</label>
      <textarea name="post_content" id="editor" class="form-control" required><?= $data ['content'] ?></textarea><br>
        </div>
   </div>

   <div class="row">
       <div class="col-sm-6">
                   <div class="form-group col-sm-12">
                     <label for="">Select Post Categoty</label>
                     <select class="form-control" name="post_category" id="">
 
                     <?php
                     $id = $_GET['id'];
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
                     <input type="file" name="post_image" class="form-control" id="formFile" accept="image/png, image/gif, image/jpeg" >
                   </div>
                   </div>

                 

   </div>
     
   <input type="submit" value="Update" class="btn sb-btn btn-block" name="upPost">
    </form>

                    
                </section>
                <?php
if(isset($_POST['upPost'])){
    
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
$post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
$post_category = $_POST['post_category'];

    $catUpe =  "UPDATE posts SET title = '$post_title', content = '$post_content', catagory_id = $post_category WHERE posts.id = $id";
    $catQue = mysqli_query($conn, $catUpe);
    
    $img_name = $_FILES['post_image']['name'];
    $img_temp = $_FILES ['post_image']['tmp_name'];
    if(move_uploaded_file($img_temp, "./Post Images/$img_name")){
        $postins = " INSERT INTO images (post_id, image) VALUES ($id, '$img_name')";
        $imgque = mysqli_query($conn, $postins);
        echo "image added";
    }
  

    
    if($catQue){
   
        ?>
<script type="text/javascript">
window.location.href = './post.php?managepost';
</script>
        <?php
        
        
    }else{
        echo "<script> alert('Post not Published') </script>" or die();
    
    }
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
</html>
