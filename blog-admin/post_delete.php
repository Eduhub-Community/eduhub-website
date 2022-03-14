<?php
require '../db.php';
$id = $_GET['id'];

$catdel = "DELETE FROM posts WHERE id = $id";
$catdelque = mysqli_query($conn, $catdel);

if($catdelque){
    header("location: ../post.php?managepost");
}else{
    echo "cat not deleted";
}

?>