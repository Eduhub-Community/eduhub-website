<?php
require '../db.php';
$id = $_GET['id'];

$catdel = "DELETE FROM catagory WHERE id = $id";
$catdelque = mysqli_query($conn, $catdel);

if($catdelque){
    header("location: ../post.php?managecategory");
}else{
    echo "cat not deleted";
}

?>