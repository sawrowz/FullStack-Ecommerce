<?php 

    include('../config/constants.php');

    if(isset($_GET) AND isset($_GET['image_name']))
    {

        $id = $_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            $path="../images/food/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload']="<div style='color:red'> Image Remove failed</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
               
                die();
            }
        }
        $sql ="DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete']="<div style='color:green'> Food Delete Successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
            
        }
        else{
            $_SESSION['delete']="<div style='color:red'> Food Remove failed</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        // else
        // {

        // }
    }
    else{
        $_SESSION['unauth']="<div style='color:red'> Unauthorize Access</div>";

        header('location:'.SITEURL.'admin/manage-food.php');
    }


?>