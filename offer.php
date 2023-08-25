<?php 
ob_start();
include('front-partials/header.php');?>



    <section>
        <div class="container offer-home-container">
            <div class="row">
                <div class="col-md-12 offer-menu-home">
                    <h1>Special Offers!!!</h1>
                    <p>Grab your opportunity, eat Delicious</p>
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








    <br><br>
    <?php 
ob_end_flush(); // Flush the buffered output
include('front-partials/footer.php');?>
