<?php
    function getCatagory($conn, $id){

        $query = "SELECT * FROM catagory WHERE id = $id";
        $run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run);
        return $data ['name'];
        
    }
    function getPost($conn, $id){

        $query = "SELECT * FROM posts WHERE id = $id";
        $run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run);
        return $data ['title'];
        
    }
    
    function getImagesByPosts($conn, $post_id){
        
        $query2 = "SELECT * FROM images WHERE post_id = '$post_id' ";
        $run2 = mysqli_query($conn, $query2);
        $data = array();

        while($d = mysqli_fetch_assoc($run2)){
                $data = $d;
        }

        return $data;
    }
    
    function getSubMenu($conn, $menu_id){
        $query2 = "SELECT * FROM submenu WHERE menu_id = '$menu_id' ";
        $run2 = mysqli_query($conn, $query2);
        $data = array();
    
        while($d = mysqli_fetch_assoc($run2)){
                $data = $d;
        }
    
        return $data;
    }
    
    function getComments($conn, $post_id){
        $query2 = "SELECT * FROM comments WHERE post_id = '$post_id' ";
        $run2 = mysqli_query($conn, $query2);
        $data = array();

        while($d = mysqli_fetch_assoc($run2)){
                $data = $d;
        }

        return $data;
    }
    

    function getSubMenuNo($conn, $menu_id){
        $query2 = "SELECT * FROM submenu WHERE menu_id = '$menu_id' ";
        $run2 = mysqli_query($conn, $query2);
        return mysqli_num_rows($run2);
        
    
        
    }

    function getMenuName($conn, $id){
        $query = "SELECT * FROM menu WHERE id = $id";
        $run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run);
        return $data ['name'];
    }
    function getAllMenu($conn){
        $query = "SELECT * FROM menu ";
        $run = mysqli_query($conn, $query);
        $data = array();

        while ($d = mysqli_fetch_assoc($run)){
            $data[] = $d;

        }
        return $data;
    }

   function getPostThumb($conn, $id){
            $query = "SELECT * FROM images WHERE post_id = $id";
            $run = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($run);
            return $data ['image'];
   }
    
?>