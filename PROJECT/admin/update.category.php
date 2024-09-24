<?php include('partials/menu.php'); ?>

<br>

<div class="main-content">
    <div class="wrapper">

    <h1>UPDATE CATEGORY</h1>

    <?php 
    if(isset($_GET['id'])){
      
        // echo "got it";
        $id=$_GET['id'];

        // echo $id;

        $sql="SELECT * FROM  category WHERE id=$id";

        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1){

            $row=mysqli_fetch_assoc($res);

            $title=$row['title'];
            $current_image=$row['img_name'];
            $featured=$row['featured'];
            $active=$row['active'];
        }else{
    
            $_SESSION['nothing-found']="<div class='error'>no category found</div>";

            header('location:'.SITEURL.'admin/manage-category.php');
        }


    }else{

header('location:'.SITEURL.'admin/manage-category.php');
    }
    
    ?>

 <br><br>
 <form action="" method="POST"  enctype="multipart/form-data">
            
            <table class="tbl-30"></table>

            <tr>
                <td><b>Tittle</b></td>
                <br><br>
                <td>
                    <input type="text" name="title" placeholder="enter your title" value="<?php echo $title; ?>" >
                </td>
            </tr>
                   <br><br>
            <tr>
                <td><b>current image</b></td>
                <br><br>
                <td>
                    <!-- <input type="file" name="image" placeholder="select your file"> -->

                    <?php 
                    if($current_image!=""){
                        
                        ?>
                          <img src="<?php echo SITEURL;?>admin/images/<?php echo $current_image; ?>" width="100px">
                        <?php
                    }else{

                        echo "<div class='error'> Image not added.</div>";
                    }
                    
                    
                    ?>


                </td>
            </tr>
            
                   <br><br>
                   <tr>
                <td><b>NEW IMAGE</b></td>
                <br><br>
                <td>
                    <input type="file" name="image" placeholder="select your file">

                    
                </td>
            </tr>
            <br><br>
            <tr>
                <td><b>featured</b></td>
                <br><br>
                <td>
                    <input <?php if($featured=="yes"){ echo "checked"; } ?> type="radio"  name="featured" value="yes">yes
                    <input <?php if($featured=="no"){ echo "checked"; }?> type="radio"  name="featured" value="no">no
                </td>
            </tr>
              <br><br>
            <tr>
                <td><b>active</b></td>
                <br><br>
                <td>
                    <input <?php if($active=="yes"){ echo "checked"; }?> type="radio"  name="active" value="yes">yes
                    <input <?php if($active=="no"){ echo "checked"; }?> type="radio"  name="active" value="no">no
                </td>
            </tr>
               <br><br>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="update-category" class="btn-primary">
                </td>
            </tr>

        </form>
    </div>
</div>

<br>
<?php
if(isset($_POST['submit'])){

    echo "button clicked";


    //  $id = $_GET['id'];
    
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    if(isset($_FILES['image']['name'])){
       
        $img_name=$_FILES['image']['name'];

        if($img_name!=""){
          
            $ext=end(explode('.',$img_name));

            $img_name="category".rand(000,999).'.'.$ext;
    
    
            $source_path= $_FILES['image']['tmp_name'];
    
            $destination_path="../admin/images/".$img_name;
    
            $upload= move_uploaded_file($source_path, $destination_path);
    
            
            if($upload==FALSE){
    
                echo "failed to upload image";
                die();
            }
             
            if($current_image!=""){

           
            $remove_path="../admin/images/".$current_image;
            $remove=unlink($remove_path);
        

            if($remove==false){

                echo "failed to remove";
                die();
            }

        }

        }else{

             $img_name=$current_image;
        }

    }else{

        $img_name=$current_image;

    }

    $sql2 = "UPDATE `category` SET  `title` = '$title', `featured` = '$featured', `img_name`='$img_name', `active` = '$active' WHERE `id` = '$id' ";


    $res2 = mysqli_query($conn, $sql2);

    if($res2==TRUE){

        $_SESSION['update-c']="<div class='success'>category updated</div>";

        header('location:'.SITEURL.'admin/manage-category.php');

    }else{

        $_SESSION['update-c']="<div class='error'>failed to update</div>";

        header('location:'.SITEURL.'admin/manage-category.php');
    }
}
else{
    echo "not clicked";
}


?>
<?php include('partials/footer.php'); ?>

