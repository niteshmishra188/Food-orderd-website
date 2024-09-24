<?php include('partials-front/menu.php'); ?>




<div class="main-content">
    <!-- <div class="s-content"> -->
        <form  action="#" method="POST" >
            <input type="text" name="fullname" placeholder="enter your fullname" class="formm" required >
            <br>
            <br>
            <input type="email" name="email" placeholder="enter your email-id eg-example@gmail.com" class="formm" required>
            <br>
            <br>
            <input type="text" name="phone-no" placeholder="enter your phone no 123456678 " MAX="10" MIN="10" class="formm" required>
            <br>
            <br>
            <input type="submit" name="submit" value="CONTACT US" class="formm">
            
        </form>



    <!-- </div> -->
</div>


<?php 

// echo "hey bro";

if(isset($_POST['submit'])){

    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone_no=$_POST['phone-no'];

    $sql="INSERT INTO contact SET fullname='$fullname',
    email='$email',
    phone_no='$phone_no'";

    $res=mysqli_query($conn,$sql);

    if($res==true){
       
        header('location:'.SITEURL.'contact-next.php');

    }else{

        header('location:'.SITEURL.'contact.php');

       
}
}





?>

<?php include('partials-front/footer.php'); ?>