
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
   


</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg home-nav-bar">
            <div class="container-fluid">
                <a class="navbar-brand nav-logo" href=""><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">MENU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">OFFERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">CONTACT</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ABOUT
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">ABOUT US</a></li>
                                <li><a class="dropdown-item" href="">SERVICES</a></li>
                                <li><a class="dropdown-item" href="">GALLERY</a></li>
                                <li><a class="dropdown-item" href="">REVIEWS</a></li>
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="register.php"><button class="order" type="button"
                            class="btn btn-outline-secondary">REGISTER FOR NEW ACCOUNT</button></a>
                    <div class="cart d-flex">
                        <a href=""><i class="bi bi-cart3"></i> | Cart</a>
                    </div>
                   
                </div>
            </div>
        </nav>
    </header>
    <section id="herosection">
        <div class="container container1">
            <div class="row">
                <div class="col-md-3 home-text">
                    <h1>
                        Fresh & Delicious
                    </h1>
                    <p>Taste it now with our online order!
                    </p>
                    <a href="login.php"> <button type="button" class="btn button1">LOGIN | Regester for new Account</button></a>

                </div>
                <div class="col-md-9">
                    <img src="images/homepizza1.jpg" alt="pizza">
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </section>
</body>
</html>