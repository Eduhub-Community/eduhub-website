<?php
require './db.php';
require './function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
        $post_id = $_GET['id'];
        $postSelect = "SELECT * FROM posts WHERE id = $post_id";
        $runPQ = mysqli_query($conn, $postSelect);
        $post = mysqli_fetch_assoc($runPQ);
    

  
        ?>
    <title><?= $post ['title'] ?> | Codelog</title>

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    
</head>
<body>
<?php include './header.php';  ?>  
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">

        
    <?php
        $post_id = $_GET['id'];
        $postSelect = "SELECT * FROM posts WHERE id = $post_id";
        $runPQ = mysqli_query($conn, $postSelect);
        $post = mysqli_fetch_assoc($runPQ);
    

  
        ?>
            <div class="card mb-3">
                
                <div class="card-body">
                  <h5 class="card-title"><?= $post ['title'] ?></h5>
                  <span class="badge  post-date"><?= date('F jS, Y',strtotime($post['created_at'])) ?></span>
                  <span class="badge bg-danger"><?= getCatagory($conn, $post['catagory_id']) ?></span>
                  <div class="border-bottom mt-3"></div>
                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    
 

                  <?php
                 
                   $post_images = getImagesByPosts($conn, $post['id']);

                   $imagesel ="SELECT * FROM images WHERE post_id = $post_id";
                   $imageque = mysqli_query($conn, $imagesel);
                   $i = 1;
                   while($image = mysqli_fetch_assoc($imageque)){
                     if($i>1){
                       $ni = "";
                     }else{
                       $ni = "active";
                     }
                  
                     ?>

<div class="carousel-item <?= $ni ?>">
      <img src="./blog-admin/Post Images/<?=$image ['image'] ?>" class="d-block w-100" alt="...">
    </div>
<?php
                    }
                  ?>



</div>

</div>
                  
                  <p class="card-text"><?= $post ['content'] ?>
                  </p>
                  <div class="addthis_inline_share_toolbox_okvx"></div>
                  <a href="#" class="btn btn-primary sb-btn" data-bs-toggle="modal" data-bs-target="#commentModal" >Comment on this</a>

                </div>
              </div>
                    <!-- comment modal -->
                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment On This</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-backdrop="keyboard focus"></button>
        <span class="mdl-close disabled">Esc</span>
      </div>
      <div class="modal-body">
        <form action="./comment.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"> Name </label>
            <input type="text" class="form-control" name="cname" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"> Comment:  </label>
            <textarea class="form-control" name="comment" id="" cols="10" rows="6" ></textarea>
          </div>
          <input type="hidden" name="post_id" value="<?= $post_id?>">
          <button type="submit" class="btn btn-primary search-m-btn" name="commentBtn">Comment</button>
          
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
              <div>
                  <h4>Related Posts</h4>

                  <?php
                    $rpostsel = "SELECT * FROM posts WHERE catagory_id ={$post['catagory_id']} ORDER BY id DESC";
                    $rpostque = mysqli_query($conn, $rpostsel);

                    while($rpost = mysqli_fetch_assoc($rpostque)){
                        if($rpost['id'] == $post_id){
                            continue;
                        }
                        ?>
<div class="card mb-3" style="max-width: 700px;">
<a href="post.php?id=<?= $rpost ['id']?>" style="text-decoration: none; color:#000;">
    <div class="row g-0">
    
      <div class="col-md-5" style="background-image: url('./blog-admin/Post Images/<?= getPostThumb($conn, $rpost ['id'])?>');background-size: cover">
        <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h5 class="card-title post-title"><?= $rpost ['title'] ?></h5>
     
          <p class="card-text "><small class="text-muted">Posted On :  <?= date('F jS, Y',strtotime($rpost['created_at'])) ?></small></p>
        </div>
      </div>
    </div>
  </div>  
                    </a>
  
  


<?php
                    }

                ?>  
              </div>
        </div>       
              

    <?php include './sidebar.php'; ?>

  
      
      
     <?php  include './footer.php'; ?> 
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60f86501b47cad48"></script>

 
</body>
</html>