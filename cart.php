<?php
ob_start(); // Start output buffering

include('front-partials/header.php');?>


    <section>
        <div class="container cart-home-container">
            <div class="row">
                <div class="col-md-12 cart-menu-home">
                    <h1>Cart |  <i class="bi bi-cart3"></i></h1>
                    <p>Grab your opportunity, eat Delicious</p>
                    <h2>
                        <b>
                        <?php
                    if(isset($_SESSION['order']))
                    {
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                    }
                    ?>
                    </b>
                </h2>
                    
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 cart-col">
                    <ul class="ul">
                        
                    </ul>
                    <h2 class="carth2">Total: Rs <span class="total"></span></h2>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM tbl_user ";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if($count>0){

                while($rows=mysqli_fetch_assoc($res))
                {
                    $u_id = $rows['id'];
                    $username = $rows['full_name'];
                    $email = $rows['email'];
                    $contact =$rows['phone'];
                    $address = $rows['address'];
                    if($_SESSION['id'] == $u_id)
                    {
                        ?>
                                <div class="row">
                                            <div class="col-md-12 form-col">
                                                <form action="" method="POST">
                                                    <input type="hidden" value="" name="selected_item" id="foodname" required>
                                                    <input type="hidden" value="" name="food_total" id="foodtotal" required>
                                                    <input type="date" value="" name="date" placeholder="Enter Date" required>
                                                    <input type="submit" value="Order Food" name="submit" class="odr" id="food_odr"> 
                                                  <br><button class="odr1">Clear Cart | <i class="bi bi-cart3"></i></button><br>
                                                    <input type="hidden" value="<?php echo $username;?>" name="username1" >
                                                    <input type="hidden" value="<?php echo $contact;?>" name="usercontact" >
                                                    <input type="hidden" value="<?php echo $email;?>" name="useremail" >
                                                    <input type="hidden" value="<?php echo $address;?>" name="useraddress" >


                                                </form>
                                            </div>
                                        </div>

                                        <?php

}

                }
            }
            

                ?>


                                    
                                          

                                  
                                  
                             
          
        </div>
    </section>
    <?php
        if(isset($_POST['submit']))
        {
            $foodname = $_POST['selected_item'];
            $total = $_POST['food_total'];
            $date = $_POST['date'];
            $status = "Ordered";
            $username1 = $_POST['username1'];
            $usercontact = $_POST['usercontact'];
            $useremail = $_POST['useremail'];
            $useraddress = $_POST['useraddress'];

            $sql2 = "INSERT INTO tbl_order SET
                food = '$foodname',
                total = $total,
                order_date ='$date',
                status = '$status',
                customer_name = '$username1',
                customer_contact = '$usercontact',
                customer_email = '$useremail',
                customer_address= '$useraddress'
            ";
            $res2 = mysqli_query($conn, $sql2);
            if($res2==true)
            {
              
                 $_SESSION['order'] ='<div style="color:green">Order Successful || Clear Cart and refresh the page</div>';
              header("location:".SITEURL.'cart.php');
      }
      else{
        $_SESSION['order'] ='<div style="color:red">Order Failed</div>';
        header("location:".SITEURL.'cart.php');
      }
        }
    ?>
    






<script src="<?php echo SITEURL;?>/js/app.js">

       

       </script>
       
    <?php 
    ob_end_flush(); // Flush the buffered output
    include('front-partials/footer.php');?>
