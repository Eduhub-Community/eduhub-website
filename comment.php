<?php
include './db.php';
if(isset($_POST['commentBtn'])){

    // print_r($_POST);
$name = mysqli_real_escape_string($conn, $_POST['cname']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$post_id = $_POST['post_id'];

$commentSel = "INSERT INTO comments (name, comment, post_id ) VALUES ('$name', '$comment', '$post_id')";
if(mysqli_query($conn, $commentSel)){
    header("location: post.php?id=$post_id");
}else{
    echo "comment not added";
}

}
?>