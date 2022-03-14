<?php

require './db.php';
 include './function.php';
 if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$post_per_page = 5;
$result = ($page - 1)*$post_per_page;
?>

<!DOCTYPE html>
<html>

<head>
	<!-- meta charec set -->
	<meta charset="utf-8">
	<!-- Always force latest IE rendering engine or request Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- Page Title -->
	<title>EduHub Community</title>
	<!-- Meta Description -->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Deepak Verma">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google Font -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- CSS
		================================================== -->
	<!-- Fontawesome Icon font -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Twitter Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- jquery.fancybox  -->
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<!-- animate -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/main.css">
	<!-- media-queries -->
	<link rel="stylesheet" href="css/media-queries.css">
	<!-- Blog Stylesheet -->
	<link rel="stylesheet" href="css/blog.css">
	<!-- testimonial-section -->
	<link rel="stylesheet" href="css/testimonial.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- Blog Posts CSS -->
	<link rel="stylesheet" href="css/blogPosts.css">

	<!-- Modernizer Script for old Browsers -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
	<link rel="manifest" href="favicon_io/site.webmanifest">
	<script src="./js/animation.js"></script>

</head>
<!-- favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
<script src="./js/animation.js"></script>

<body>

    <!-- header -->
    <?php
        include './header.php';
    ?>
    <!-- end of header -->

    <!-- blog -->
    <section class="blog" id="blog">
        <div class="container">
            <div class="title">
                <h2>Latest Blogs</h2>
                <p>Read Latest Blogs of Eduhub-Community</p>
            </div>
            <div class="blog-content">
                <!-- item -->
                <?php
                if(isset($_GET['search'])){
                    $keyword = $_GET['search'];
                    $postSelect = "SELECT * FROM posts WHERE title LIKE '%$keyword%'ORDER BY id DESC LIMIT $result, $post_per_page";
                }
               
                
                else{
                    $postSelect = "SELECT * FROM posts ORDER BY id DESC LIMIT $result, $post_per_page";

                }
                $runPQ = mysqli_query($conn, $postSelect);

                while($post = mysqli_fetch_assoc($runPQ)){
                ?>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src='./blog-admin/Post Images/<?= getPostThumb($conn, $post['id']) ?>' >
                    </div>
                    <div class="blog-text">
                        <span><?= date('F jS, Y',strtotime($post['created_at'])) ?></span>
                        <h2><?= $post ['title'] ?></h2>
                        
                        <a href="post.php?id=<?= $post ['id']?>"">Read More</a>
                    </div>
                </div>
                <?php
                    }
            ?>
                <!-- end of item -->
            
           
            
        </div>
    </section>
    <!-- end of blog -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
