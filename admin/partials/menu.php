<?php include('../config/constants.php') ;
include('login-check.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
