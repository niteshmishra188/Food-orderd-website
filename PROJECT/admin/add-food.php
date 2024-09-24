<?php  include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>ADD FOOD</h1>
              <br><br>
              <?php
              if(isset($_SESSION['UPLOAD'])){

              echo $_SESSION['UPLOAD']; 
           unset($_SESSION['UPLOAD']);
                  }

                  ?>


              
        <form action="" method="post"  enctype="multipart/form-data">
            
            <table class="tbl-30"></table>

            <tr>
                <td><b>Tittle</b></td>
                <br><br>
                <td>
                    <input type="text" name="title" placeholder="enter your title">
                </td>
            </tr>
                   <br><br>
            <tr>
                <td><b>description :</b></td>
                <br><br>
                <td>
                   <textarea name="description" cols="30" rows="10" placeholder="add your description"></textarea>
                </td>
            </tr>
            <br><br>
            <tr>
                <td><b>price :</b></td>
                <br><br>
                <td>
                    <input type="number" name="price" >
                </td>
            </tr>

            <br><br>
            <tr>
                <td><b>Select image</b></td>
                <br><br>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>
            <br><br>


            <tr>
                <td><b>Category</b></td>
                <br><br>
                <td>
                    <select name="category">


                    <?php
                    $sql="SELECT * FROM category WHERE active='yes'";

                    $res=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($res);

                    if($count>0){
                      while($row=mysqli_fetch_assoc($res)){

                        $id=$row['id'];
                        $title=$row['title'];
                        ?>

                        <option value="<?php echo $id;?>"> <?php echo $title; ?> </option>
                        <?php
                      }

                    }else{
                        ?>
                        <option value="0">no category found</option>
                        <?php

                    }

                    
                    ?>
                        <!-- <option value="1">FOOD</option>
                        <option value="2">pizaa</option>
                        <option value="3">burger</option> -->
                     </select>
                </td>
         </tr>


            
               <br><br>
            <tr>
                <td><b>featured</b></td>
                <br><br>
                <td>
                    <input type="radio"  name="featured" value="yes">yes
                    <input type="radio"  name="featured" value="no">no
                </td>
            </tr>
              <br><br>
            <tr>
                <td><b>active</b></td>
                <br><br>
                <td>
                    <input type="radio"  name="active" value="yes">yes
                    <input type="radio"  name="active" value="no">no
                </td>
            </tr>
               <br><br>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="add-food" class="btn-primary">
                </td>
            </tr>

        </form>

        <br><br>
    </div>
</div>


<?php
if(isset($_POST['submit'])){

    echo "clicked";

    $title=$_POST['title'];

    $description=$_POST['description'];

    $price=$_POST['price'];

    $category=$_POST['category'];

    if(isset($_POST['featured'])){
   
    
        $featured=$_POST['featured'];
    }else{
        $featured="no";
    }
    if(isset($_POST['active'])){
   
    
        $active=$_POST['active'];
    }else{
        $active="no";

    }


    if(isset($_FILES['image']['name'])){
          
        // if($img_name!=""){

       
        $img_name=$_FILES['image']['name'];

        if($img_name!=""){

    
        $ext=end(explode('.',$img_name));

        $img_name="food".rand(000,999).'.'.$ext;


        $source_path= $_FILES['image']['tmp_name'];

        $destination_path="../admin/images/".$img_name;

        $upload= move_uploaded_file($source_path, $destination_path);

        
        if($upload==FALSE){

          $_SESSION['UPLOAD']="<div class='error'> failed to upload </div>";
          header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }

        }

    }else{

        $_image_name="";
    }


    $sql2="INSERT INTO food  SET title='$title', description='$description',price= $price, img_name='$img_name',category_id=$category,
    featured='$featured',active='$active'";

    $res2=mysqli_query($conn,$sql2);

    if($res2==TRUE){
      
        $_SESSION['ADDDD']="<div class='sucesss'> added successfully. </div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }else{
      
        $_SESSION['ADDDD']="<div class='error'> failed to add </div>";
        header('location:'.SITEURL.'admin/manage-food.php');


    }
}


?>


<?php  include('partials/footer.php'); ?>