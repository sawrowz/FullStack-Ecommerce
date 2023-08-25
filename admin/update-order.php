<?php 
ob_start();
include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ORDER</h1>
        <br>
        <br>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql = "SELECT *FROM tbl_order WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count==1){

                $row = mysqli_fetch_assoc($res);
                $food = $row['food'];
                $total =$row['total'];
                $status = $row['status'];

            }
            else{
            header('location:'.SITEURL.'admin/manage-order.php');

            }
        }
        else{
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        ?>
        <form action="" method="post">
            <table class="tbl-full" border="1" cellspacing="0">
                <tr>
                    <td>Food name</td>
                    <td><h4><?php echo $food?></h4></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><b>Rs <?php echo $total?></b></td>

                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="" style="padding:1rem; font-size:17px;">
                        <option <?php if($status=="Ordered") echo "selected";?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery") echo "selected";?> value="On Delivery">On Delivery</option>
                        <option  <?php if($status=="Delivered") echo "selected";?> value="Delivered">Deliverd</option>
                        <option <?php if($status=="Cancelled") echo "selected";?> value="Cancelled">Cancelled</option>
                        </select>

                      
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">

                        <input type="submit" name="submit" value="Update Order" class="admin-password">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $status =$_POST['status'];
                

                $sql2 = "UPDATE tbl_order SET
                    status = '$status'
                    WHERE id = $id
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2==true)
                {
                    $_SESSION['food-update'] ='<div style="color:green">Update Food sucess</div>';
                                header('location:'.SITEURL.'admin/manage-order.php');
                                die();
                }
                else
                {
                    $_SESSION['food-update'] ='<div style="color:red">Update Food failed</div>';
                                header('location:'.SITEURL.'admin/manage-order.php');
                                die();
                }
            }

?>
    </div>
</div>



<?php
ob_end_flush(); // Flush the buffered output
include('partials/footer.php');?>
