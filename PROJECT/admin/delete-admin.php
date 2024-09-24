<?php
  include('config/constants.php');

  $id= $_GET['id'];


 $sql="DELETE  FROM admin WHERE id='$id' ";

 $res=mysqli_query($conn,$sql);

 if($res==TRUE){

    // echo "admin deleted";

    $_SESSION['delete']="<div class='success'>Admin deleted succssfully</div>";

    header('location:'.SITEURL.'admin/manage.admin.php');
 } else{
    // echo "failed to delete";
    $_SESSION['delete']="<div class='error'>failed to delete  admin</div>";
    header('location:'.SITEURL.'admin/manage.admin.php');
 }

?>