

<?php
 if(!isset($_SESSION['userf']))
 {
    $_SESSION['no-user-login'] ='<h5 style="font-weight:700; color:red">Please Login to Access Food order Webpage</h5>';
    header("location:".SITEURL.'login.php');
 }


?>