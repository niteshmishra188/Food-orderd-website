<?php include ('partials/menu.php'); ?>
 

<div class="main_content">
    <div class= "wrapper"> 
 <h1>
    Manage Category</h1>
    <br>


   <a href ="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category <a/>
  <br>
  <br>

  <?php 
   if(isset($_SESSION['addd'])){

    echo $_SESSION['addd'];
    unset($_SESSION['addd']);
   }
   if(isset($_SESSION['REMOVE'])){

    echo $_SESSION['REMOVE'];
    unset($_SESSION['REMOVE']);
   }

if(isset($_SESSION['DEL'])){

 echo $_SESSION['DEL'];
 unset($_SESSION['DEL']);
}
if(isset($_SESSION['nothing-found'])){

    echo $_SESSION['nothing-found'];
    unset($_SESSION['nothing-found']);
   }

   if(isset($_SESSION['update-c'])){

    echo $_SESSION['update-c'];
    unset($_SESSION['update-c']);
   }
//    if(isset($_SESSION['update-c'])){

//     echo $_SESSION['update-c'];
//     unset($_SESSION['update-c']);
//    }
  
   
  
  ?>
<table class="tbl-full">
    <tr>
        <th>S.NO</th>
        <th>Title name</th>
        <th>Image</th>
         <th>featured</th>
         <th>active</th> 
        <th>Action</th>
    </tr>

   

    <?php 
      

      $sql="SELECT * FROM category ";

      $res=mysqli_query($conn,$sql);

      $count=mysqli_num_rows($res);

      $sn=1;

      if($count>0){

        while($row=mysqli_fetch_assoc($res)){

            $id=$row['id'];
            $title=$row['title'];
            $img_name=$row['img_name'];
            $featured=$row['featured'];
            $active=$row['active'];

            ?>



<tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $title; ?></td>
        <td>
            <?php 
            if($img_name!=""){
                 

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
            <a href="<?php echo SITEURL; ?>admin/update.category.php?id=<?php echo $id;?>" class="btn-secondary" > UPDATE CATEGORY<a/>
            <a href="<?php echo SITEURL; ?>admin/delete.category.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>" class="btn-danger" > DELETE CATEGORY<a/>
            
        </td>
    </tr>



            <?php 
        }
      } else{
       

        echo "we don't have data ";
    
    }

        ?>
    
</table>
 
</div>
</div>


<?php include ('partials/footer.php'); ?>
