<!-- sidebar section -->
<div class="col-4">
      

          <?php
          if(isset($_GET['id'])){
            ?>

<div class="card mb-3">
  <h5 class="card-header">Comments</h5>
  <div class="card-body">

  <?php
    $commentsel = "SELECT * FROM comments WHERE  post_id = $post_id ORDER BY id DESC";
    $commentque = mysqli_query($conn, $commentsel);
    

 
    while($comments = mysqli_fetch_assoc($commentque)){
     ?>
       
<h5 class="card-title"><?= $comments ['name'] ?> - <small> <?= date('F jS, Y',strtotime($comments['commented_at']))?></small></h5>
<p class="card-text"><?= $comments ['comment'] ?>.</p>

<!-- <a href="#" class="btn btn-primary sb-btn">Go somewhere</a> -->


      <?php
    }

  ?>
            <?php
          }
          ?>
          
          </div>
          </div>

    
      
          </div>
        </div>
      
 
    <!-- sidebar section over -->