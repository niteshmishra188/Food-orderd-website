 <?php include('partials/menu.php'); ?>

    
 <div class="main_content">
        <div class="wrapper">
            <!-- <strong>DASHBOARD</strong> -->
            <h1  class="deco text-center">DASHBOARD</h1>


            <?php 

            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            
            
            
            ?>

            <div class="col-4 text-center">


            <?php 
            $sql="SELECT * FROM category";

            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            
            
            
            ?>
                <h1><?php echo $count; ?></h1>
                <br>
                 CATEGORIES
            </div>
            <div class="col-4 text-center">
                
            <?php 
            $sql2="SELECT * FROM food";

            $res2=mysqli_query($conn,$sql2);

            $count2=mysqli_num_rows($res2);
            
            
            
            ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                 FOODS
            </div>
            <div class="col-4 text-center">
                
            <?php 
            $sql3="SELECT * FROM tbl_order";

            $res3=mysqli_query($conn,$sql3);

            $count3=mysqli_num_rows($res3);
            
            
            
            ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                 TOTAL ORDERS
            </div>
            <div class="col-4 text-center">
                <?php 

                error_reporting(0);

                $sql4="SELECT SUM(total) AS total  FROM  tbl_order";

                $res4=mysqli_query($conn,$sql4);


                $row4=mysqli_fetch_assoc($res4);

                  
                $total= $row4['total'];
                
                
                ?>
                <h1><?php echo "₹". $total; ?></h1>
                <br>
                 REVENUE GENERATED
            </div>
            <div class="clear-fix"></div>
        </div>
          
    </div>

    </div>

<?php include ('partials/footer.php');  ?>