<?php
ob_start();
include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE CATEGORY</h1><br>
       <br>
<?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT *FROM tbl_category WHERE id=$id";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title= $row['title'];
                $current_image=$row['image_name'];
                $featured = $row['featured'];
                $active=$row['active'];
            }
            else{
                $_SESSION['no-category-found']="<div style='color:red'> Category Not Found</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }
        else
        {
        header('location:'.SITEURL.'admin/manage-category.php');

        }

?>
       <br>
       <form action="" method="post" enctype="multipart/form-data">
            <table class="admin-tbl" >
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>" placeholder="Category title"></td>

                </tr>
                <tr>
                    <td>
                        Current Image
                    </td>
                    <td>
                        <?php
                            if($current_image!="")
                            {
                                ?>
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image?>" alt="" width="100px">

                                <?php
                            }
                            else{
                                echo '<h5 style="color:red">Image Not Added</h5>';
                            }
                        ?>
                </td>
                </tr>
                <tr>
                    <td>
                        New Image
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="yes"){echo "checked";}?> type="radio" name="featured" value="yes">Yes
                        <input <?php if($featured=="no"){echo "checked";}?> type="radio" name="featured" value="no">No

                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">Yes
                        <input <?php if($active=="no"){echo "checked";}?> type="radio" name="active" value="no">No

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image?>">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Category" class="admin-password">
                    </td>
                </tr>

            </table>
       </form>

       <?php
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $title = $_POST['title'];
                $current_image =$_POST['current_image'];
                $featured =$_POST['featured'];
                $active = $_POST['active'];


                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    
                    if($image_name!="")
                    {
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination = "../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination);

                        if($upload==false)
                        {
                            $_SESSION['upload'] ='<div style="color:red">Failed to Upload Image<?div>';
                            header("location:".SITEURL.'admin/manage-category.php');
                            die();
                        }

                        if($current_image!="")
                        {
                            
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
                            
                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] ='<div style="color:red">Failed to remove Current Image<?div>';
                                header("location:".SITEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                    }
                    else{
                        $image_name = $current_image;
                    }

                }
                else
                {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name= '$image_name',
                    featured ='$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update']="<div style='color:green'> Category Updated</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update']="<div style='color:red'> Category Update Failed</div>";
                     header('location:'.SITEURL.'admin/manage-category.php');
                }
                
            }
       ?>
</div>
</div>

<?php 
ob_end_flush(); // Flush the buffered output
include('partials/footer.php');?>
