<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>CHANGE PASSWORD</h1>



        <br>
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="post">
            <table class="admin-tbl">

                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                    <input type="password" name="new_password" placeholder="New Password">
                        
                    </td>

                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                        
                    </td>

                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>" >
                        <input type="submit" name="submit" value="Change Password" class="admin-password">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res==true){
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                if($new_password==$confirm_password)
                {
                    $sql2 = "UPDATE tbl_admin SET
                     password='$new_password'
                     WHERE id=$id
                    ";
                  $res2 = mysqli_query($conn, $sql2);
                  if($res2==true)
                  {
                    $_SESSION['change-pwd'] ='<div style="color:green">Password changed<?div>';
                     header("location:".SITEURL.'admin/manage-admin.php');
                  }
                  else
                  {
                    $_SESSION['change-pwd'] ='<div style="color:red"> Failed Password changed<?div>';
                    header("location:".SITEURL.'admin/manage-admin.php');
                  }

                }
                else
                {
                    $_SESSION['pwd-not-match'] = '<div style="color:red">Password Not Match</div>';
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['user-not-found'] ='<div style="color:red">User Not Found<?div>';
                header("location:".SITEURL.'admin/manage-admin.php');
                
            }
        }

    }

?>
<?php include('partials/footer.php'); ?>
