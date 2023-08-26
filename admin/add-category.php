<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>ADD CATEGORY</h1><br>
       <br>

       <?php
         if(isset($_SESSION['add']))
         {
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         if(isset($_SESSION['upload']))
         {
             echo $_SESSION['upload'];
             unset($_SESSION['upload']);
         }
        ?>
       <br>
       <form action="" method="post" enctype="multipart/form-data">
            <table class="admin-tbl" >
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" id="" placeholder="Category title"></td>

                </tr>
                <tr>
                    <td>
                        Upload Image
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No

                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Category" class="admin-password">
                    </td>
                </tr>

            </table>
       </form>
       <?php
        if(isset($_POST['submit']))
        {
            $title=$_POST['title'];
            if(isset($_POST['featured']))
            {

                $featured=$_POST['featured'];
            }
            else
            {
                $featured="No";
            }
            if(isset($_POST['active']))
            {

                $active=$_POST['active'];
            }
            else
            {
                $active="No";
            }
            if(isset($_FILES['image']['name']))
            {
                $image_name=$_FILES['image']['name'];
                // $ext = end(explode('.',$image_name));
                if($image_name!="")
                {

                        
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination = "../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination);

                        if($upload==false)
                        {
                            $_SESSION['upload'] ='<div style="color:red">Failed to Upload Image<?div>';
                            header("location:".SITEURL.'admin/add-category.php');
                            die();
                        }
                }
            }
            else
            {
                $image_name= "";
            }

            $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
            ";

            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                $_SESSION['add'] ='<div style="color:green">Category Added Successful<?div>';
                header("location:".SITEURL.'admin/manage-category.php');
              }
              else{
                $_SESSION['add'] ='<div style="color:red">Failed to Add Category<?div>';
                header("location:".SITEURL.'admin/manage-category.php');
              }

        }

?>
    </div>
</div>

<?php include('partials/footer.php') ?>