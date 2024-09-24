<?php include('partials/menu.php'); ?>
<HTML>
<BODY>
  <div class="main-content">
  <div class="wrapper">  
     <h1>ADD ADMIN</h1> 
     
     <br>
     <br>

     <?php
             if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
            ?>
     
    <form action="#" method="POST">
         <table class="tbl-30">
            <tr>
                <td>FULL NAME </td>
                <td><input type="text" name="full_name" placeholder="enter your full name" required> </td>
            </tr>
            <tr>
                <td>USERNAME </td>
                <td><input type="text" name="username" placeholder="enter your user name" required> </td>
            </tr>
            
            <tr>
                <td>PASSWORD </td>
                <td><input type="password" name="password" placeholder="enter your password" required> </td>
            </tr>
            <tr>
                <td> 
                    <input type="submit" name="submit" value="ADD ADMIN" class="btn-primary">
                </td>
                
            </tr>
         </table>
     </form>
   </div>
</div>
</BODY>

</HTML>
<?php include('partials/footer.php'); ?>


<?php  

error_reporting(0);
// if(isset($_POST['submit'])){


    
//     echo "button clicked";

// }else{
//     echo "button not clicked";


    $fullname= $_POST['full_name'];
    $username= $_POST['username'];
    $password= ($_POST['password']);


    $sql= "INSERT INTO `admin` SET
      fullname ='$fullname',
      username= '$username',
      password='$password'
    ";
   

//    echo $sql;
    


   $res=mysqli_query($conn,$sql) or die(mqsqli_error());

   if($res==true){
    
    $_SESSION['add']= "ADMIN ADDED SUCCESSFULLY";

    header('location'.SITEURL.'admin/manage.admin.php');

   }else{
    // echo "fail to insert";
    $_SESSION['add']= "FAILED TO ADD";

    header('location'.SITEURL.'admin/add-admin.php');

   }
   



// }else{
//  echo "button not clicked";
// }


?>