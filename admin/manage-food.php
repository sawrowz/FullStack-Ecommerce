<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE FOOD</h1><br>
        <?php
         if(isset($_SESSION['add']))
         {
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         if(isset($_SESSION['delete']))
         {
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);
         }
         if(isset($_SESSION['upload']))
         {
             echo $_SESSION['upload'];
             unset($_SESSION['upload']);
         }
         if(isset($_SESSION['unauth']))
         {
             echo $_SESSION['unauth'];
             unset($_SESSION['unauth']);
         }
         if(isset($_SESSION['update']))
         {
             echo $_SESSION['update'];
             unset($_SESSION['update']);
         }
        ?>

        <br>
        <a href="<?php echo SITEURL;?>admin/add-food.php"> <button class="add-admin">Add Food</button></a>
            <br><br>
            <table class="tbl-full">
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $sql= "SELECT * FROM tbl_food";

                    $res =mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        $sn=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            ?>
                       <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $price;?></td>

                            <td>
                                <?php 
                                    if($image_name!="")
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name?>" alt="" width="100px">
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
                                <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>"><button class="admin-update"><i class="bi bi-pencil-square"></i></button></a> 
                                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>"><button class="admin-delete"><i class="bi bi-trash3-fill"></i></button></a>
                            </td>
                      </tr>
                            <?php

                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspan="6"> <div style="color:red"> No Food added</div></td>
                            </tr>
                        <?php
                    }
                ?>
               
</table>
    </div>
</div>

<?php include('partials/footer.php') ?>