<?php include('partials-front/menu.php'); ?>

<?php 

if(isset($_GET['id'])){

    $food_id=$_GET['id'];

    $sql="SELECT * FROM food WHERE id=$food_id";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
        
        
            $row=mysqli_fetch_assoc($res);
            
            $title=$row['title'];
            $price=$row['price'];
            $img_name=$row['img_name'];


        }else{
            header('location:'.SITEURL);

        }

    }else{

    header('location:'.SITEURL);
    }

// else{

//     header('location:'.SITEURL);
// }






?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">

                    <?php  
                    
                    if($img_name==""){

                        echo "<div class='error'>IMAGE IS NOT AVAILABLE</div>";
                    }

                    else{

                        ?>
                       
                        <img src="<?php echo SITEURL; ?>admin/images/<?php echo $img_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                        <?php

                    }
                    
                    
                    
                    ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?>e</h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price">₹<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Nitesh Mishra" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9525xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. example@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <?php
    
    if(isset($_POST['submit'])){

        // echo "button clicked";

    

        $food=$_POST['food'];
        $price=$_POST['price'];
        $qty= $_POST['qty'];
        $total=$price*$qty;

        $order_date=date("y-m-d-h:i:sa");

        $status="ordered";

        $customer_name=$_POST['full-name'];

        $custome_contact=$_POST['contact'];

        $customer_email=$_POST['email'];

        $address=$_POST['address'];



        $sql2="INSERT INTO tbl_order SET 

        food='$food',
        price=$price,
        qty=$qty,
        total='$total',
        order_date='$order_date',
        status='$status',
        customer_name='$customer_name',
        custome_contact='$custome_contact',
        customer_email='$customer_email',
        customer_address='$address'
  ";

        $res2=mysqli_query($conn,$sql2);

        if($res2==TRUE){

            // $_SESSION['ORDER']="<div class='deco'> ORDER PLACED it's on the way.....</div>";
            header('location:'.SITEURL.'order-next.php');
        }
        else{
            
            // $_SESSION['ORDER']="<div class='deco'> UNABLE TO PLACED ORDER</div>";
            header('location:'.SITEURL);

            die();
             
        }

    }
    
    
    ?>

    <?php include('partials-front/footer.php'); ?>