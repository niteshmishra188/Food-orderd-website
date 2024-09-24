<?php include('partials/menu.php'); ?>


<div class="main_content"> 
    <div class="wrapper">
     <table class="tbl-full">
                <tr>
                    <th>S.NO</th>
                    <th>full name</th>
                    <th>email</th>
                    <th>phone no</th>
                    <th>Action</th>
                </tr>

                <?php

                error_reporting(0);

                   $sql= "SELECT * FROM contact";

                     $res=mysqli_query($conn,$sql);

                    if($res==TRUE){

                       $count=mysqli_num_rows($res);

                        $sn=1;

                      if($count>0){

                      while($rows=mysqli_fetch_assoc($res)){


                        $id=$rows['id'];
                       $fullname=$rows['fullname'];
                         $email=$rows['email'];
                         $phone_no=$rows['phone_no'];
                      }

                      ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $fullname; ?> </td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone_no; ?></td>
                    <td>
                        <a href="#" >UPDATE
                    </td>
                </tr>



                     <?php 
                    }
                }


                         ?>
      
                
                
                
                
               
       <table>
    </div>
</div>











