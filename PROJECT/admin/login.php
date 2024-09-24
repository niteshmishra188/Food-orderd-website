 
<?php
 include('config/constants.php'); 
 ?>
 
 <html>
    <head>
      
        <title>LOGIN</title>
    </head>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="login.css">
    <body class="v">

     <div class="login">

     <marquee width="60%" direction="left" height="100px" scrollamout="1">
<h1 class="h">LOGIN</h1></marquee>

        <?php

     if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
 }
 if(isset($_SESSION['no-login-message'])){
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}

           ?>

        <form action="" method="POST" class="text-center">
             
             <h4 class="deco"><b>USERNAME</b></h4>
             <br>
            <input type="text" name="username" placeholder="ENTER YOUR USERNAME"  class="in">
            <br>
            <br>
             
           <h4 class="deco"> <b>PASSWORD</b> </h4> 
            <br>
            <input type="password" name="password" placeholder="ENTER YOUR PASSWORD"  class="in">

            <br>
            <br>

            <input type="submit" name="submit" value="LOGIN"class="btn-primary">
        </form>

        <marquee width="60%" direction="right" height="100px" scrollamout="1"><P class="h">CREATED BY :- <a href="#">Nitesh Mishra</a></P></marquee>
     </div>
    </body>
</html>

<?php
  
  if(isset($_POST['submit'])){
    // echo "button clicked";

     $username=$_POST['username'];
     $password=$_POST['password'];

     $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";

     $res=mysqli_query($conn,$sql);

     $count=mysqli_num_rows($res);

     if($count==1){
        
        $_SESSION['login']="<div class='error'>successfull </div>";

        $_SESSION['user']= $username;

        header('location:'.SITEURL.'admin/');

     }else{

        $_SESSION['login']="<div class='error'>USER NAME OR PASSWORD DID NOT MATCHED </div>";

        header('location:'.SITEURL.'admin/login.php');
     }
  }else{
    // echo "not clicked";
  } 

?> 