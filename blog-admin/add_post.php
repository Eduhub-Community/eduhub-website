<?php
require '../db.php';
if(isset($_POST['addPost'])){
$post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
$post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
$post_category = $_POST['post_category'];
// $post_category = $_POST['post_category'];

$postins = "INSERT INTO posts (title, catagory_id, content) VALUES ('$post_title', $post_category, '$post_content') ";
$postque = mysqli_query($conn, $postins);
$post_id = mysqli_insert_id($conn);
$image_name = $_FILES['post_image']['name'];
$image_temp = $_FILES ['post_image']['tmp_name'];
print_r($image_name);
print_r($image_temp);

    if(move_uploaded_file($image_temp, "./Post Images/$image_name")){
        $postins = "INSERT INTO images (post_id, image) VALUES ($post_id, '$image_name') ";
        $imgque = mysqli_query($conn, $postins);
        echo "image added";
    }


if($postque){
   
    header("location: ./post.php?managepost ");
    
    
}else{
    echo "<script> alert('Post not Published') </script>";

}



}
?>