<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>ADD CATEGORY</h1>
              <br><br>
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
                <td><b>Upload image</b></td>
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
                    <input type="submit" name="submit" value="add-category" class="btn-primary">
                </td>
            </tr>

        </form>

        <br><br>
    </div>
</div>


<?php 

if(isset($_POST['submit'])){
   
    
    $title=$_POST['title'];

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

        $img_name="category".rand(000,999).'.'.$ext;


        $source_path= $_FILES['image']['tmp_name'];

        $destination_path="../admin/images/".$img_name;

        $upload= move_uploaded_file($source_path, $destination_path);

        
        if($upload==FALSE){

            echo "failed to upload image";
            die();
        }

        }

    }else{

        $_image_name="";
    }

    // print_r($_FILES['image']);

    // die();

    $sql="INSERT INTO category SET title='$title',img_name='$img_name',featured='$featured', active='$active' " ;

    $res=mysqli_query($conn,$sql);

    // if($res==TRUE){

    //     echo "category added";
    //     $_SESSION['addd']= "category added succesfully";

    //     header("localhost".SITEURL.'admin/manage-category.php');
    // }else{

    //     $_SESSION['addd']= "failed to add";

    //     header("location:".SITEURL.'admin/manage-category.php');
    // }

    $_SESSION['addd']= "<div class'success'>category added succesfully</div>";

        header("location:".SITEURL.'admin/manage-category.php');
    
}

//     $_SESSION['addd']= "failed to add";

//     header("location:".SITEURL.'admin/add-category.php');
// }
?>

<?php include('partials/footer.php'); ?>