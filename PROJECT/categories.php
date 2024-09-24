<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            $sql="SELECT * FROM category WHERE active='yes' AND featured='yes' ";

            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);

            if($count>0){

                while($row=mysqli_fetch_assoc($res)){
                   

                    $id=$row['id'];
                    $title=$row['title'];
                    $img_name=$row['img_name'];

                    ?>

               <a href="<?php echo SITEURL; ?>category-foods.php">
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


<?php include('partials-front/footer.php'); ?>