<?php include('config/constants.php'); 
    include('userlogin-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Pangolin&family=Poppins&family=Raleway:wght@100&family=Righteous&family=Roboto+Slab:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/offer.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/service.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/cart.css">





</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg home-nav-bar">
            <div class="container-fluid">
                <a class="navbar-brand nav-logo" href="home.php"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">MENU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="offer.php">OFFERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">CONTACT</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ABOUT
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="aboutus.php">ABOUT US</a></li>
                                <li><a class="dropdown-item" href="service.php">SERVICES</a></li>
                                <li><a class="dropdown-item" href="gallery.php">GALLERY</a></li>
                                <li><a class="dropdown-item" href="review.php">REVIEWS</a></li>
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="menu.php"><button class="order" type="button"
                            class="btn btn-outline-secondary">ORDER</button></a>
                    <div class="cart d-flex">
                        <a href="cart.php"><i class="bi bi-cart3"></i> | Cart</a>
                    </div>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                        <a href="logout.php" class="logout" style=" background-color: #3b3b2f; color: #f7f4ee;text-decoration: none; padding: 0.3rem; border-radius:10px; font-size:10px; margin-right:2px;">LOG OUT <i class="bi bi-box-arrow-in-right"></i></a>       
                      
                            <?php
                              if(isset($_SESSION['userf']))
                              {
                                  echo $_SESSION['userf'];
                                  //  echo  $_SESSION['id'];
                                  
                                }
                                
                                
                                
                                ?>
                              

                </div>
            </div>
        </nav>
    </header>