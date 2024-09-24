<?php

include('config/constants.php');








// this process is for when your id will pass then you can go to delete page other wise you will redirect to manage page.

if(isset($_GET['id'])AND isset($_GET['img_name'])){

    // echo "get the value and delete";
    $id= $_GET['id'];
    $img_name=$_GET['img_name'];

    if($img_name!=""){
        $path="../admin/images/".$img_name;

        $remove= unlink($path);
        
        if($remove==false){

            $_SESSION['REMOVE']="<div class='err>failed to remove image</div>'";

            header('location:'.SITEURL.'admin/manage-category.php');

            die();
        }
    }

    $sql="DELETE  FROM category WHERE id=$id";

    $res= mysqli_query($conn,$sql);

    if($res==TRUE){
       
        $_SESSION['DEL']="<div class='success'>DELETED </div>";

        header('location:'.SITEURL.'admin/manage-category.php');


    }else{

        $_SESSION['DEL']="<div class='success'>failed to delete </div>";

        header('location:'.SITEURL.'admin/manage-category.php');


    }

}else{

    header('location:'.SITEURL.'admin/manage-category.php');
}



?>