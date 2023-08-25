<?php 
ob_start(); 
include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST" >
            <table class="admin-tbl">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"> </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td> <input type="text" name="username" placeholder="Your Username"> </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td> <input type="password" name="password" placeholder="Enter Password"> </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Admin" class="add-admin">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>





<?php include('partials/footer.php'); ?>
<?php
    //save value in database

    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            // echo "Data Insert Succefully";
            $_SESSION['add'] = '<div style="color:green">Admin Added Successfully</div>';
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add'] = '<div style="color:green">Failed to Add Admin</div>';
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
    ob_end_flush(); // Flush the buffered output

?>