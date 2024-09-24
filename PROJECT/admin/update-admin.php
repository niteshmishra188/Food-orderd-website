<?php include('partials/menu.php'); ?>

<br>
   
<div class="main_content"> 
<div class="wrapper">
    <br>
  <h1>UPDATE ADMIN</h1>
  <br>

  <?php
   
   $id=$_GET['id'];


   $sql="SELECT * FROM admin WHERE id=$id";

   $res=mysqli_query($conn,$sql);
//    $data= mysqli_fetch_assoc($res);


   if($res==TRUE){
    $count=mysqli_num_rows($res);

    if($count==1){
          
        echo "admin available"; 


      $row=mysqli_fetch_assoc($res);
     
      $full_name=$row['fullname'];
      $username=$row['username'];

    

    }else{
      

        header('loaction:'.SITEURL.'admin/manage-admin.php');
    }
   }
  ?>

  <form action="#" method="POST">
         <table class="tbl-30">

         <?php 
         if($res==TRUE){

            // echo "updated successfully";
         }

          ?>
            <tr>
                <td>FULL NAME </td>
                <td><input type="text" name="full_name" placeholder="" value='<?php echo $full_name; ?>' required> </td>
            </tr>
            <tr>
                <td>USERNAME </td>
                <td><input type="text" name="username" placeholder="" value="<?php echo $username;
                 ?>" required> </td>
            </tr>
            
            <!-- <tr>
                <td>PASSWORD </td>
                <td><input type="password" name="password" placeholder="enter your password"> </td>
            </tr>
            <tr> -->
                <td> 
                    <input type="submit" name="submit" value="Update ADMIN" class="btn-primary">
                </td>
                
            </tr>
         </table>
     </form>
</div>



</div>

<br>

<?php 
 if(isset($_POST['submit'])){
    // echo "updated successfully";

    $_SESSION['update']="<div class='success'>Admin updated succssfully</div>";
    
        header('location:'.SITEURL.'admin/manage.admin.php');

    //  echo $id=$_POST['id'];
      $full_name=$_POST['full_name'];
     $username=$_POST['username'];
 } else{
    // echo "button not clicked";
 }


 $sql="UPDATE admin SET fullname='$full_name',username='$username' WHERE id=$id "; 

 $res=mysqli_query($conn,$sql);


//  if($res==TRUE){
   
//     if($res==TRUE){

//         // echo "admin deleted";
    
//         $_SESSION['update']="<div class='success'>Admin updated succssfully</div>";
    
//         header('location:'.SITEURL.'admin/manage.admin.php');
//      } else{
//         // echo "failed to delete";
//         $_SESSION['update']="<div class='error'>failed to update  admin</div>";
//         header('location:'.SITEURL.'admin/manage.admin.php');
//      }
    
//  }else{

//  }

?>



<?php include('partials/footer.php'); ?>