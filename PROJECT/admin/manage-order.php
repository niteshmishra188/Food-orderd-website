<?php include ('partials/menu.php'); ?>
 

<div class="main_content">
    <div class= "wrapper"> 

    <?php

if(isset($_SESSION['UPD'])){

    echo  $_SESSION['UPD'];
    unset ($_SESSION['UPD']);
   }
    
    
    
    
    ?>
 
    <h1>Manage order</h1>
    <br>
    <br>
  <a href "#" class="btn-primary">Add FOOD <a/>
  <br>
  <br>
<table class="tbl-full">

    <tr>
        <th>S.NO</th>
        <th>food</th>
        <th>price</th>
        <th>qty</th>
        <th>total</th>
        <th>order date</th>
        <th>status</th>
        <th>customer name</th>
        <th>customer CONTACT</th>
        <th>customer ADDRESS</th>
        <th>customer EMAIL</th>
       
        <th>Action</th>
    </tr>

    <?php
    

    $sn=1;

    $sql="SELECT * FROM tbl_order  ORDER BY id DESC ";

    $res=mysqli_query($conn,$sql);


    $count=mysqli_num_rows($res);

    if($count>0) {

        while($row=mysqli_fetch_assoc($res)){

            $id=$row['id'];
            $food=$row['food'];
            $price=$row['price'];
            $qty=$row['qty'];
            $total=$row['total'];
            $order_date=$row['order_date'];
            $status=$row['status'];
            $customer_name=$row['customer_name'];
            $customer_contact=$row['custome_contact'];
            $address=$row['customer_address'];
            $customer_email=$row['customer_email'];

            ?>

<tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $food; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $qty; ?></td>
         <td><?php echo $total; ?></td>
         <td><?php echo $order_date; ?></td>
         <td><?php echo $status; ?></td>
         <td><?php echo $customer_name; ?></td>
         <td>+91<?php echo $customer_contact; ?></td>
         <td><?php echo $address; ?></td>
         <td><?php echo $customer_email; ?></td>



        <td>
        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary" > UPDATE<a/>
            <!-- <a href="#" class="btn-danger" > DELETE<a/> -->
        </td>
    </tr>

            <?php 

        }

    }

    else{

        echo "<tr><td>no data found </td> </tr>";
    }
    
    
    
    
    ?>

    
  
  
</table>
 
</div>
</div>


<?php include ('partials/footer.php'); ?>
