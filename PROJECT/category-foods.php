<?php include('partials-front/menu.php'); ?>


<?php 
 if(isset($_GET['category_id'])){

    $category_id=$_GET['category_id'];

    $sql="SELECT title FROM category WHERE id=$category_id";
    
    $res=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($res);

    $category_title=$row['title'];

 }else{

    header('location:'.SITEURL);
 }
?>  

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
             $sql2="SELECT * FROM food WHERE category_id=$category_id";

             $res2=mysqli_query($conn,$sql2);

             $count=mysqli_num_rows($res2);

             if($count>0){
                while($row2=mysqli_fetch_assoc($res2)){
                  
                    $title= $row2['title'];
                    $price= $row2['price'];
                    $description= $row2['description'];
                    $img_name= $row2['img_name'];

                    ?>
 
               <div class="food-menu-box">
                   <div class="food-menu-img">
                    <?php 
                    if($img_name==""){

                        echo "image is   not available";

                    }
                    else{

                        ?>

                        <img src="<?php echo SITEURL;?>admin/images/<?php echo $img_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <?php 
                    }
                    
                    
                    ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                   <?php  

                }
             }
            
            
            ?>

          

          


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
<?php include('partials-front/footer.php'); ?>