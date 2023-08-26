<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper order">
        <h1 class="m-h1">MANAGE ORDER</h1><br>



        
        <br>
        <?php
         if(isset($_SESSION['food-update']))
         {
             echo $_SESSION['food-update'];
             unset($_SESSION['food-update']);
         }
        ?>
            <br>
            <table class="tbl-full t1">
                <tr>
                    <th>SN</th>
                    <th>FOOD</th>
                    <th>TOTAL</th>
                    <th>ORDER DATE</th>
                    <th>STATUS</th>
                    <th>Cust_NAME</th>
                    <th>Cust_CONTACT</th>
                    <th>Cust_EMAIL</th>
                    <th>Cust_ADDRESS</th>
                    <th>ACTION</th>


                </tr>
                <?php
                    $sql= "SELECT * FROM tbl_order ORDER BY id DESC";

                    $res =mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        $sn=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $fname=$row['food'];
                            $total=$row['total'];
                            $order_date=$row['order_date'];
                            $status=$row['status'];
                            $cname=$row['customer_name'];
                            $c_contact=$row['customer_contact'];
                            $c_email=$row['customer_email'];
                            $c_address=$row['customer_address'];

                            ?>
                       <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $fname;?></td>
                            <td><?php echo $total;?></td>

                            <td>     <?php echo $order_date;?>   </td>
                            <td>
                                <?php
                                if($status=="Ordered")
                                {

                                    echo "<p style='background-color:skyblue; padding:6px; font-size:10px; color:white;' class='status'>$status</p>";
                                }
                               elseif($status=="On Delivery")
                                {

                                    echo "<p style='background-color:orange; padding:16px; font-size:10px;  color:white;' class='status'>$status</p>";
                                }
                                elseif($status=="Delivered")
                                {

                                    echo "<p style='background-color:green; padding:6px; font-size:10px; color:white;' class='status'>$status</p>";
                                }
                                else
                                {

                                    echo "<p style='background-color:red; padding:6px; font-size:10px; color:white;' class='status'>$status</p>";
                                }
                                ?>
                            </td>
                            <td><?php echo $cname;?></td>
                            <td><?php echo $c_contact;?></td>
                            <td><?php echo $c_email;?></td>
                            <td><?php echo $c_address;?></td>

                            
                            

                        
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>"><button class="admin-update"><i class="bi bi-pencil-square"></i></button></a> 
                            </td>
                      </tr>
                            <?php

                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspan="6"> <div style="color:red"> No Food added</div></td>
                            </tr>
                        <?php
                    }
                ?>
               
</table>
    </div>
</div>

<?php include('partials/footer.php') ?>