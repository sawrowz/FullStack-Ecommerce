<?php

    include('../config/constants.php');

    //destroying session
    session_destroy();
    

    header("location:".SITEURL.'admin/login.php');
    

?>