<?php include('partials/menu.php'); ?>

    <div class="main-content dashboard">
         <div class="wrapper">
            <h1>
                DASHBOARD
            </h1>
            <?php
                 if(isset($_SESSION['login']))
                 {
                     echo $_SESSION['login'];
                     unset($_SESSION['login']);
                 }
            ?>
            <br>
            <div class="col-4">
                <div class="name">

                    <?php
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count?></h1><br>
                CATEGORIES
                </div>
                <div class="icon">
                    <i class="bi bi-list-columns"></i>
                </div>
            </div>
            <div class="col-4">
                <div class="name">

                    <?php
                $sql2 = "SELECT * FROM tbl_food";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2?></h1><br>
                FOODS
            </div>
            <div class="icon">
                
                <i class="bi bi-egg-fried"></i>
            </div>
            </div>
            <div class="col-4">
                <div class="name">

                    <?php
                $sql3 = "SELECT * FROM tbl_order WHERE status='Ordered'";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3?></h1><br>
                ORDERS
            </div>
            <div class="icon">

                <i class="bi bi-bag-check-fill"></i>
            </div>
            </div>
            <div class="col-4">
                <div class="name">

                    <?php
                $sql4 = "SELECT sum(total) AS total FROM tbl_order WHERE status='Delivered'";
                $res4 = mysqli_query($conn, $sql4);
                
                $row4 = mysqli_fetch_assoc($res4);
                
                $total_rev = $row4['total'];
                
                ?>
                <h1>Rs- <?php echo $total_rev?></h1><br>
                TOTAL REVENUE
            </div>
            <div class="icon">

                <i class="bi bi-cash-coin"></i>
            </div>
            </div>
            <div class="col-4">
                <div class="name">

                    <?php
                     $sql5 = "SELECT * FROM tbl_admin";
                     $res5 = mysqli_query($conn, $sql5);
                     $count5 = mysqli_num_rows($res5);
                     ?>
                     <h1><?php echo $count5?></h1><br>
                     
                     
                     ADMINS
                    </div>
                    <div class="icon">

                        <i class="bi bi-person-circle"></i>
                    </div>
            </div>
            <div class="col-4">
                <div class="name">

                    <?php
                     $sql6 = "SELECT * FROM tbl_user";
                     $res6 = mysqli_query($conn, $sql6);
                     $count6= mysqli_num_rows($res6);
                     ?>
                     <h1><?php echo $count6 ?> </h1><br>
                     
                     
                     USERS
                    </div>
                    <div class="icon">

                        <i class="bi bi-people-fill"></i>        
                    </div>
                </div>

            <div class="clearfix"></div>
        </div>
    </div>


<?php include('partials/footer.php'); ?>