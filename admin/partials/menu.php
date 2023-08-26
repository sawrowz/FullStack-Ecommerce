<?php include('../config/constants.php') ;
include('login-check.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanna Bhoja-Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Pangolin&family=Poppins&family=Raleway:wght@100&family=Righteous&family=Roboto+Slab:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="partials/admin.css">

</head>
<body>
    <div class="menu text-center">
        <div class="wrapper">
            <div class="img">
                <img src="../images/logo.png" alt="" width="70px">

            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Log Out</a>
            <?php
            if(isset($_SESSION['user']))
            {
                echo $_SESSION['user'];
            }
            ?></li>


            </ul>
        </div>
    </div>
