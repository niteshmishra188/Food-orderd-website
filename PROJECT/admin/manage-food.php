<?php include ('partials/menu.php'); ?>
 

<div class="main_content">
    <div class= "wrapper"> 
 <h1>Manage food</h1>
   

 <?php
   if(isset($_SESSION['ADDDD'])){

    echo  $_SESSION['ADDDD'];
    unset($_SESSION['ADDDD']);
   }
    
   if(isset($_SESSION['REMOVE'])){

    echo  $_SESSION['REMOVE'];
    unset($_SESSION['REMOVE']);
   }
   if(isset($_SESSION['DEL'])){

    echo  $_SESSION['DEL'];
    unset($_SESSION['DEL']);
   }
   if(isset($_SESSION['update-c'])){

    echo  $_SESSION['update-c'];
    unset($_SESSION['update-c']);
   }


 
 ?>
    
     <br>
    <br>

     <a href ="<?php echo  SITEURL; ?>admin/add-food.php" class="btn-primary">Add food <a/>
  <br>
  <br>
<table class="tbl-full">
    <tr>
        <th>S.NO</th>
        <th>title</th>
        <th>price</th>
        <th>image</th>
        <th>featured</th>
        <th>active</th>
        <th>action</th>
    </tr>

    <?php 

    $sn=1;

    $sql="SELECT * FROM  food ";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count>0){
        while($row=mysqli_fetch_assoc($res)){

            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $img_name=$row['img_name'];
            $featured=$row['featured'];
            $active=$row['active'];

            ?>
                        

                        
    <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $title; ?></td>
        <td><?php echo $price; ?></td>
        <td>
        <?php if($img_name!=""){
                 

                 ?>
                 
                 <img src="<?php echo SITEURL; ?>admin/images/<?php echo $img_name; ?>"width="50px"
                 <?php
                  
                  
 
 
                 
             }else{
 
                 echo "<div class='er'>IMAGE NOT ADDED</div>";
             }
             
             
             ?>
        </td>
        <td><?php echo $featured; ?></td>
        <td><?php echo $active; ?></td>
       
        <td>
            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary" > UPDATE<a/>
            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>" class="btn-danger" > DELETE<a/>
            
        </td>
    </tr>
              

           
            <?php 
        }


    }else{

      echo "<tr><td class='error' colspan='2'> food not added yet.</td></tr>";
    }
    
    
    
    
    ?>

   
</table>
 
</div>
</div>


<?php include ('partials/footer.php'); ?>
