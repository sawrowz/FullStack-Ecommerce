<?php 
ob_start();
include('front-partials/header.php');?>

        <!-- 2nd nav bar for menu -->
        <section>
            <nav class="navbar navbar-expand-lg sec-navbar">
                <a href="" id="home"></a>
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navigate Menu Items</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php 
                        $sql="SELECT * FROM tbl_category";
                        $run=mysqli_query($conn,$sql);
                        foreach($run as $value){
                        
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#food<?=$value['id']?>"><?php echo $value['title'];?></a>
                            </li>
                          <?php }?>
                        </ul>

                    </div>
                </div>
            </nav>
        </section>
    </header>
    <!-- header ends --> <br>
<!-- <header> -->
    <section>
        <div class="container home-container">
            <div class="row">
                <div class="col-md-12 menu-home">
                    <h1>Menu Grid</h1>
                    <p>Some informations about our resturant</p>
                   
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container third-container">
            <div class="row">
                <div class="col-md-12 image-col">

                        <?php
                            //create sql query
                            $sql = "SELECT * FROM tbl_category WHERE active='yes' AND featured='no' " ;

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $cid = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    ?>
                                    <a href="" id="food<?=$row['id']?>"></a>
                                     <!-- pizza menu -->
                                     <?php
                                        if($image_name=="")
                                        {
                                            echo "<h5 style= color:red;>Image Not Available</h5>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="">
                                            <?php

                                        }
                                     ?>
                                      

                                            <h1><?php echo $title;?></h1>
                                            <?php
                                           
                                           $sql2 = "SELECT * FROM tbl_food WHERE active ='yes' AND featured='no' ";
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

                                                          if($foo_c_id == $cid)
                                                          {

                                                          
                                                ?>
                                           <!-- <div class="row card-row"> -->
                                                         
                                                            <div class="col-md-4">
                                                                <div class="card menu-card">
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
                                                                        <h5 class="card-title"><?php echo $title; ?></h5>
                                                                        <p class="card-text"><?php echo $description?>
                                                                        <a href="" id="<?php $cid; ?>"></a>
                                                                        <div style="color: #4c4b16; font-weight: 700;">Rs <?php echo $price?></div>
                                                                        </p>
                                                                        <button class="btn  button1"><i class="bi bi-cart3"></i> | Add
                                                                            to Cart</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            
                                                        
                                                    <?php } ?>
                                                <?php
                                            }
                                            ?>
                                        </div> <br>
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
            </div>
        </div>
    </section>
    <br><br>
  

    <script src="<?php echo SITEURL;?>/js/app.js">
       

    </script>
    <?php 
ob_end_flush(); // Flush the buffered output
include('front-partials/footer.php');?>


