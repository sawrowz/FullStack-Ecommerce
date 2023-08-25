<?php 
ob_start();
    include('../config/constants.php');

    if(isset($_GET) AND isset($_GET['image_name']))
    {

        $id = $_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            $path="../images/category/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove']="<div style='color:red'> Image Remove failed</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
               
                die();
            }
        }
        $sql ="DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete']="<div style='color:green'> Category Delete Successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
            
        }
        else{
            $_SESSION['delete']="<div style='color:red'> Category Remove failed</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        // else
        // {

        // }
    }
    else{
        header('location:'.SITEURL.'admin/manage-category.php');
    }

    ob_end_flush(); // Flush the buffered output

?>