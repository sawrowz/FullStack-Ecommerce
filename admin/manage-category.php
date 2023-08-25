<?php
ob_start();
include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1><br>
        <?php
         if(isset($_SESSION['add']))
         {
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         if(isset($_SESSION['remove']))
         {
             echo $_SESSION['remove'];
             unset($_SESSION['remove']);
         }
         if(isset($_SESSION['delete']))
         {
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);
         }
         if(isset($_SESSION['no-category-found']))
         {
             echo $_SESSION['no-category-found'];
             unset($_SESSION['no-category-found']);
         }
         if(isset($_SESSION['update']))
         {
             echo $_SESSION['update'];
             unset($_SESSION['update']);
         }
         if(isset($_SESSION['upload']))
         {
             echo $_SESSION['upload'];
             unset($_SESSION['upload']);
         }
         if(isset($_SESSION['failed-remove']))
         {
             echo $_SESSION['failed-remove'];
             unset($_SESSION['failed-remove']);
         }
        ?>

        <br>
        <a href="<?php echo SITEURL;?>admin/add-category.php"> <button class="add-admin">Add Category</button></a>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $sql= "SELECT * FROM tbl_category";

                    $res =mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        $sn=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            ?>
                       <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $title;?></td>
                            <td>
                                <?php 
                                    if($image_name!="")
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name?>" alt="" width="100px">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "<div style='color:red'>Image Not added</div>";
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            
                            

                        
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>"><button class="admin-update">Update Category</button></a> 
                                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>"><button class="admin-delete">Delete Category</button></a>
                            </td>
                      </tr>
                            <?php

                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspan="6"> <div style="color:red"> No category added</div></td>
                            </tr>
                        <?php
                    }
                ?>
               
</table>
    </div>
</div>

<?php 
ob_end_flush(); // Flush the buffered output
include('partials/footer.php') ?>