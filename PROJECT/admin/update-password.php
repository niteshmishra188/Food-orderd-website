<?php  include('partials/menu.php');?>


<div class="main-content"> 
<div class="wrapper">

<h1>CHANGE PASSWORD</h1>

<br>

<?php 

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

?>

<form  action="#"  method="POST">
<table class="tbl-30">

</table>

<tr>

<td><b>cuurent password:</b></td>


<td>
<br><br>
<input type="password" name="current_password" placeholder="old_password" >
</td>
</tr>

<br>
<br>


<tr>
    <td><b>New password</b></td>
    <br><br>
    <td>

<input type="password" name="new_password" placeholder="new_password">
</td>
</tr>
<br>
<br>

<tr>
    <td><b>confirm password:</b></td>
     <br><br>
    <td>

<input type="password" name="confirm_password" placeholder="confirm password">
<br>
</td>
</tr>
<br>
<br>
<tr>
    <td colspan="2"></td>

    <input type="hidden" name="id"  value="<?php echo $id; ?>">

    <br>

    <input type="submit" name="submit" value="change password" class="btn-primary">
</tr>



</form>
</div>
</div>


<?php 
  if(isset($_POST['submit'])){
    echo "button clicked";

    $id=$_POST['id'];
    $current_password= md5($_POST['current_password']);
    $new_password= md5($_POST['new_password']);
    $confirm_password= md5($_POST['confirm_password']);


    $sql="SELECT * FROM admin WHERE id=$id AND password='$current_password' ";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE){

    $count=mysqli_num_rows($res);


    if($count==1){
     
      // echo "user found";

      if($new_password == $confirm_password){

             
        // echo "password match";

        $sql2="UPDATE admin SET password='$new_password' WHERE id=$id ";

        $res2=mysqli_query($conn,$sql2);

        if($res2==TRUE){
          $_SESSION['change-pwd']="<div class='error'>PASSWORD CHANGED. </div>";

          header('location:'.SITEURL.'admin/manage.admin.php');
        
        }else{

          $_SESSION['change-pwd']="<div class='error'>failed to change. </div>";

      header('location:'.SITEURL.'admin/manage.admin.php');
        }



      }else{
        $_SESSION['pwd-not-match']="<div class='error'>PASSWORD DID NOT MATCH. </div>";

      header('location:'.SITEURL.'admin/manage.admin.php');
      }
    }else{
      // echo "user not found";

      $_SESSION['user-not-found']="<div class='error'>user not found. </div>";

      header('location:'.SITEURL.'admin/manage.admin.php');
    }

    }
    

  }else{
    // echo "not clicked";
  }



?>


<?php include('partials/footer.php'); ?>


