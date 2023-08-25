<?php
ob_start(); // Flush the buffered output

include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>ADD FOOD</h1><br>
       <br>
        <?php
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
                    <td><input type="text" name="title" id="" placeholder="Food title"></td>

                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Add Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price">
                    </td>
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
                    <td>Category:</td>
                    <td>
                        <select name="category" id="">
                            <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='yes'";
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                            <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                        <?php
                                    }

                                }
                                else{
                                    ?>
                                        <option value="0">No Category Available</option>

                                    <?php

                                }
                            ?>

                        </select>
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
                        <input type="submit" name="submit" value="Add Food" class="admin-password">
                    </td>
                </tr>

            </table>
       </form>


<?php

       if(isset($_POST['submit']))
        {
            $title=$_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category=$_POST['category'];
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

                        
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] ='<div style="color:red">Failed to Upload Image</div>';
                            header("location:".SITEURL.'admin/add-food.php');
                            die();
                        }
                }
            }
            else
            {
                $image_name= "";
            }

            $sql2 = "INSERT INTO tbl_food SET
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                category_id=$category,
                featured='$featured',
                active='$active'
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==true)
            {
                $_SESSION['add'] ='<div style="color:green">Food Added Successful</div>';
                header("location:".SITEURL.'admin/manage-food.php');
              }
              else{
                $_SESSION['add'] ='<div style="color:red">Failed to Add Food</div>';
                header("location:".SITEURL.'admin/manage-food.php');
              }

        }

?>
</div>
</div>
<?php
ob_end_flush(); // Flush the buffered output

include('partials/footer.php');?>
