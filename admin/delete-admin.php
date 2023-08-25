<?php
ob_start(); // Flush the buffered output

    include('../config/constants.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = '<div style="color:green">Admin Delete Successfully</div>';
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = '<div style="color:green">Admin Delete Failed</div>';
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
ob_end_flush(); // Flush the buffered output

?>