   <?php include('partials-front/menu.php'); ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <!-- <?php
          
        //   if(isset($_SESSION['ORDER'])){

        //     echo $_SESSION['ORDER'];
        //     unset($_SESSION['ORDER']);
        //   }
        
        
        ?> -->
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            $sql="SELECT * FROM category WHERE active='yes' AND featured='yes' LIMIT 3";

            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);

            if($count>0){

                while($row=mysqli_fetch_assoc($res)){
                   

                    $id=$row['id'];
                    $title=$row['title'];
                    $img_name=$row['img_name'];

                    ?>

               <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
               <div class="box-3 float-container">

               <?php
                if($img_name==""){
                 

                      echo "<div class='error'>image not added yet</div>";
    
    
                    
                }else{
    
                    ?>
                      
                      <img src="<?php echo SITEURL; ?>admin/images/<?php echo $img_name; ?>" alt="Pizza" class="img-responsive img-curve">


                         <?php
                }
               
               
               ?>
                

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                    <?php 

                }
                 
            }else{
               
                echo "<div class='error'>category not added yet.</div>";

            }
            
            
            ?>

           


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
         $sql2="SELECT * FROM food WHERE active='yes' AND  featured='yes' LIMIT 8";

         $res2=mysqli_query($conn,$sql2);

         $count=mysqli_num_rows($res2);

         if($count>0){

            while($row=mysqli_fetch_assoc($res2)){

                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['description'];
                $img_name=$row['img_name'];

                ?>
                        
                        <div class="food-menu-box">
                <div class="food-menu-img">

                <?php 

                if($img_name==""){

                    echo "<div class='error'>image is not available.</div>";

                  
                }
                else{
                    ?>
                    <img src="<?php echo SITEURL;?>admin/images/<?php echo $img_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                  <?php
                }


                    ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ; ?></h4>
                    <p class="food-price">₹<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                 <?php 
            }
         }else{

            echo "<div class='error'> food is not available.</div>";
         }
            
            ?>

           
           

          

           

          

          


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>