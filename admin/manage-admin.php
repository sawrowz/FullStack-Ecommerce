<?php
ob_start();
include('partials/menu.php'); ?>

    <div class="main-content">
         <div class="wrapper">
            <h1>
                MANAGE ADMIN
            </h1><br>
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
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
            ?>
            <br>
                <br>
           <a href="add-admin.php"> <button class="add-admin">Add Admin</button></a>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $sn = 1;
                        $count = mysqli_num_rows($res);
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];


                                ?>
                                 <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                       <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>"><button style="background-color: rgb(59, 83, 190);" class="admin-update">Change Password</button></a> 
                                       <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>"><button class="admin-update">Update Admin</button></a> 
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>"><button class="admin-delete">Delete Admin</button></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else{

                        }
                    }
                ?>
                
            </table>
        </div>
    </div>


    <?php 
ob_end_flush(); // Flush the buffered output
include('partials/footer.php'); ?>