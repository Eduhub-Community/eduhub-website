<?php
require '../db.php';
$id = $_GET['id'];

$catdel = "DELETE FROM comments WHERE id = $id";
$catdelque = mysqli_query($conn, $catdel);

if($catdelque){
    header("location: ../post.php?managecomment");
}else{
    echo "cat not deleted";
}

?>