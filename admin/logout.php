<?php
ob_start();

    include('../config/constants.php');

    //destroying session
    session_destroy();
    

    header("location:".SITEURL.'admin/login.php');
    
    ob_end_flush(); // Flush the buffered output

?>