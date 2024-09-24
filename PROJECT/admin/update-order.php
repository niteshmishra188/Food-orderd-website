

<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    
    <title>Document</title>

    <style>
    *{
        margin: 0;
        padding: 0;
    }
    
    .menu ul{
    list-style: none;
}

.menu ul li{
    display: inline;
    padding: 1%;
}

.menu ul li a{
    text-decoration: none;
    color: red;
    font-weight: bolder;
    
}

.menu{
    border: 2px solid black;
}









.wrapper{
    /* border: 1px solid black; */
    padding: 1%;
    width: 100%;
    margin: 0 auto;
  }
  .footer{
    background-color: black;
    color: white;
}
  
  .text-center{
    text-align: center;
    color: white
}
.btn-secondary{
    background-color: blue;
    padding: 2%;
    color: black;
    font-weight: bolder;
    height: 2.5px;
    width: 150px;

}


    </style>
</head>
<body>
    <div class="menu text-center">
        <div class="wrapper"> 
           <ul>
               <li><a href="index.php">HOME</a></li>
               <li><a href="manage.admin.php">ADMIN</a></li>
               <li><a href="manage-category.php">CATEGORY</a></li>
               <li><a href="manage-food.php">FOOD</a></li>
               <li><a href="manage-order.php">ORDER</a></li>
               <li><a href="logout.php">LOG-OUT</a></li>

           </ul>
        </div>
         
   </div>

   <div class="main_content">
    <div class="wrapper">
        <h1>UPDATE ORDER</h1>

        <?php 
        if(isset($_GET['id'])){
      
      // echo "got it";
      $id=$_GET['id'];

      // echo $id;

      $sql="SELECT * FROM  tbl_order WHERE id=$id";

      $res=mysqli_query($conn,$sql);

      $count=mysqli_num_rows($res);

      if($count==1){

          $row=mysqli_fetch_assoc($res);
          

          $food=$row['food'];
          $price=$row['price'];
          $qty=$row['qty'];

          $status=$row['status'];
          $customer_name=$row['customer_name'];
          $customer_contact=$row['custome_contact'];
          $customer_email=$row['customer_email'];
          $address=$row['customer_address'];
          
        
        
          
      }else{
  
          $_SESSION['nothing-found']="<div class='error'>no category found</div>";

          header('location:'.SITEURL.'admin/manage-order.php');
      }


  }else{

header('location:'.SITEURL.'admin/manage-order.php');
  }
  
  ?>
        



        
        <BR><BR>
        <form action="#" method="POST">
            <legend>
            <tr>
                <h3><b>food name<b></h3>
                <td><?php echo $food; ?></td>
            </tr>
            <br>
            <br>
            <tr>
                <h3><b>price<b></h3>
                <td>$<?php echo $price; ?></td>
            </tr>
            <br>
            <br>
        <tr>
            <h3> STATUS :</h3>
            <td>
                <input type="text" name="status" value="<?php echo $status; ?>" >
              
            </td>

        </tr>
        <BR><BR>
         <BR><BR>
        <tr>
        <h3> QTY :</h3>
            <td>
                <input type="number" name="qty" value="<?php echo $qty; ?>">
            </td>
        </tr>
        <br>
        <br>
        <tr>
        <h3> customer name :</h3>
            <td>
                <input type="text" name="customer_name" value="<?php echo  $customer_name; ?>">
            </td>
        </tr>
        <br>
        <br>
        <tr>
        <h3> customer contact :</h3>
            <td>
                <input type="text" name="customer_contact" value="<?php echo  $customer_contact; ?>">
            </td>
        </tr>
        <br>
        <br>
        <tr>
        <h3> customer email:</h3>
            <td>
                <input type="text" name="customer_email" value="<?php echo  $customer_email; ?>">
            </td>
        </tr>
        <br>
        <br>
        <tr>
        <h3> customer address:</h3>
            <td>
            <textarea name="address" rows="10"  required> <?php echo  $address; ?></textarea>
            </td>
        </tr>
        <br>
        <br>

        <tr colspan="6">
            <td>
                <input type="hidden" name="price" value=" <?php echo  $price; ?>">
                <input type="hidden" name="id" value=" <?php echo  $id; ?>">
                <input type="submit" name="submit" value="UPDATE"  class="btn-secondary">
            </td>
        </tr>
</legend>
</form>

    </div>
   </div>






   
<div class="footer">
         
    <div class="wrapper"> <p class="text-center"> 2023 All rights reserved. Designed By <a href="www.worldwild.website">Adarsh singh</a></p></div>
    
</div>

</div>
    
</body>


<?php
if(isset($_POST['submit'])){

    // $id=$_POST['id'];
    $price=$_POST['price'];
    

    $status=$_POST['status'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];

    $total=$price*$qty;

    // $customer_name=$_POST['customer_name'];
    // $customer_contact=$_POST['custome_contact'];
    // $customer_email=$_POST['customer_email'];
    // $address=$_POST['customer_address'];


    $sql2=" UPDATE `tbl_order` SET  
     status = '$status',
     qty=$qty, 
     total =$total 
     WHERE `id` = '$id' ";

    $res2=mysqli_query($conn,$sql2);

    
    if($res2==true){
        $_SESSION['UPD']="<div class='success'> THE DATA IS SUCCESSFULLY UPDATED.</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    else{
        $_SESSION['UPD']="<div class='success'> UNABLE TO UPDATE.</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }




}

// }else{

//     $_SESSION['updated']="<div class='success'> UNABLE TO UPDATE.</div>";
//     header('location:'.SITEURL.'admin/manage-order.php');

// }









?>
</html>




