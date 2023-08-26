

<?php include('front-partials/header.php');?>



    <section id="herosection">
        <div class="container container1">
            <div class="row">
                <div class="col-md-3 home-text">
                    <h1>
                        Fresh & Delicious
                    </h1>
                    <p>Taste it now with our online order!
                    </p>
                    <a href="menu.html"> <button type="button" class="btn button1">ORDER</button></a>

                </div>
                <div class="col-md-9">
                    <img src="images/homepizza1.jpg" alt="pizza">
                </div>
            </div>
        </div>
    </section>

    <section id="herosection2">
        <div class="container">

        <?php
         $sql = "SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' " ;

         $res = mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $cid = $row['id'];
                    $title = $row['title'];

                    ?>

                        <h1><?php echo $title?></h1>

                    <?php
                     $sql2 = "SELECT * FROM tbl_food WHERE active ='yes' AND featured='yes' ";
                     $res2 = mysqli_query($conn, $sql2);

                     $count2 = mysqli_num_rows($res2);

                   if($count2>0)
                   {
                   ?>
                    <div class="row card-row">



                    <?php
                      while($row=mysqli_fetch_assoc($res2))
                      {
                                    $fid = $row['id'];
                                    $title = $row['title'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    $foo_c_id = $row['category_id'];
                                ?>

                                <?php
                                
                                    if($foo_c_id == $cid)
                                    {
                                        ?>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <?php
                                                            if($image_name == "")
                                                            {
                                                                echo "<h5 style= color:red;>image Not available</h5>";
                                                            }
                                                            else
                                                            {
                                                                ?>

                                                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="card-img-top" alt="...">

                                                                <?php
                                                            }

                                                            ?>
                                                            <div class="card-body" data-name="<?php echo $title;?>" data-price="<?php echo $price;?>">
                                                                <h5 class="card-title"><?php echo $title;?></h5>
                                                                <p class="card-text"><?php echo $description; ?>
                                                                <div style="color: #4c4b16; font-weight: 700;">Rs <?php echo $price; ?></div>
                                                                </p>
                                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                   
                                                <?php } ?>
                                                <?php
                                            }
                                         ?>
                                        </div>
                                            <?php
                                         }
                                         else
                                         {
                                             echo "<h5 style= color:red;>Food Not Added</h5>";

                                         }

                                            ?>
                  


                                                       

                                            
                                            



                                    <?php
                                }

                            }
                            else
                            {
                                echo "<h5 style= color:red;>Category Not Added</h5>";
                            }

                        ?>
           
        </div>
    </section>



    <section id="strap">
        <div class="container strap">
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="div"><a href=""><i class="bi bi-cart3"></i></a>
                    </div>

                    <div class="payment d-flex">
                        <div>
                            <a href="menu.html">
                                <h2>PICK A DISH</h2>
                            </a>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="div"><a href=""><i class="bi bi-credit-card-fill"></i></a>
                    </div>

                    <div class="payment d-flex">
                        <div>
                            <a href="">
                                <h2>PAYMENT</h2>
                            </a>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="div"><a href=""><i class="bi bi-truck"></i></a>
                    </div>

                    <div class="payment d-flex">
                        <div>
                            <a href="cart.php">
                                <h2>RECEIVE YOUR FOOD</h2>
                            </a>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>



    <section id="herosection3">
        <div class="container">
            <h1>VEG ITEMS</h1>
            <div class="row">
                <div class="col">
                    <div id="carouselExample" class="carousel slide ">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/pasta.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Pasta" data-price="129">
                                                <h5 class="card-title">PASTA</h5>
                                                <p class="card-text">Italian style best pasta ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 129</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/panner.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Paneer" data-price="99">
                                                <h5 class="card-title">PAANEER</h5>
                                                <p class="card-text">Best paneer in Indian style ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 99</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/pulau.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Pulav" data-price="199">
                                                <h5 class="card-title">PULAV</h5>
                                                <p class="card-text">Eat Delicious pulav ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 199</div>
                                                </p>

                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/Chole Bhature.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Chola_Puri" data-price="59">
                                                <h5 class="card-title">CHOLA PURI</h5>
                                                <p class="card-text">Wow Spicy Chola Puri ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 59</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/panner.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Paneer" data-price="99">
                                                <h5 class="card-title">PAANEER</h5>
                                                <p class="card-text">Best paneer in Indian style ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 99</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/pulau.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Pulav" data-price="199">
                                                <h5 class="card-title">PULAV</h5>
                                                <p class="card-text">Eat Delicious pulav ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 199</div>
                                                </p>

                                                <a href="#" class="btn  button1"><i class="bi bi-cart3"></i> | Add
                                                    to Cart</a>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/pasta.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Pasta" data-price="129">
                                                <h5 class="card-title">PASTA</h5>
                                                <p class="card-text">Italian style best pasta ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 129</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/Chole Bhature.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Chola_Puri" data-price="59">
                                                <h5 class="card-title">CHOLA PURI</h5>
                                                <p class="card-text">Wow Spicy Chola Puri ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 59</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" style="width: 20rem;">
                                            <img src="images/panner.jpg" class="card-img-top" alt="...">
                                            <div class="card-body" data-name="Paneer" data-price="99">
                                                <h5 class="card-title">PAANEER</h5>
                                                <p class="card-text">Best paneer in Indian style ! just at
                                                <div style="color: #4c4b16; font-weight: 700;">Rs 99</div>
                                                </p>
                                                <button class="btn  button1"><i class="bi bi-cart3"></i> | Add to Cart</button>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>
    <section id="herosection4">
        <div class="container">
            <div class="row">
                <div class="col-md-5 test-col">

                    <div class="rating mb-3" style="color: #e7b10a;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <div class="text-h1 mb-3">

                        <h1>The best food <span><br></span>in Nepal!</h1>
                    </div>
                    <div class="text-p">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sunt minus, nulla error
                        nihil quam quibusdam praesentium b quaerat
                        veritatis sed, ab ex impedit animi commodi.
                        Velit rem iure aperiam natus. Voluptatum?

                    </div>
                    <div class="testimonials">
                        <div class="test-1">
                            <div class="bg1">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <h3>it is amazing felling to my belly!</h3>
                            </div>
                            <div class="test-img">
                                <img src="images/saroj.jpg" alt="">
                                <p>Sawrowz Dhakal <span style="opacity: 0.5;">Google</span></p>
                            </div>
                        </div>
                        <div class="test-2">

                        </div>
                    </div>

                    <div class="testimonials ">
                        <div class="test-1">
                            <div class="bg1" style="background-color: #898121; color: white;">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <h3>Wow i love this Quzine wonderful!</h3>
                            </div>
                            <div class="test-img">
                                <img src="images/manohar.jpg" alt="">
                                <p>Manohar Pulami <span style="opacity: 0.5;">Microsoft</span></p>
                            </div>
                        </div>
                        <div class="test-2">

                        </div>
                    </div>

                </div>

            </div>
    </section>
    <hr>



    <section id="herosection5">
        <div class="container accordian-section">
            <div class="row">
                <h1 style=" font-size: 50px; font-family: Raleway, sans-serif; text-align: center;">FAQ</h1>
                <div class="col-md-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Can you deliver with in 15 min?
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    first item's accordion body.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    second item's accordion body. Let's imagine this being filled with some actual
                                    content.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    third item's accordion body. Nothing more exciting happening here in terms of
                                    content, but just filling up the space to make it look, at least at first
                                    glance, a bit more representative of how this would look in a real-world
                                    application.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include('front-partials/footer.php');?>

