<?php
    //user login 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = '<h2 style="color:red">Please login to Access Admin Pannel</h2>';
        header("location:".SITEURL.'admin/login.php');
        
    }

?>