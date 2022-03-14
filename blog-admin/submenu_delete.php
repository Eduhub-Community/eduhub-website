<?php
require '../db.php';
$id = $_GET['id'];

$catdel = "DELETE FROM submenu WHERE id = $id";
$catdelque = mysqli_query($conn, $catdel);

if($catdelque){
    header("location: ../post.php?managemenu");
}else{
    echo "cat not deleted";
}

?>