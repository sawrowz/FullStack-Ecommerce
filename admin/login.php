<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Admin Login</h2>
            <br>
            <?php
                 if(isset($_SESSION['login']))
                 {
                     echo $_SESSION['login'];
                     unset($_SESSION['login']);
                 }
                 if(isset($_SESSION['no-login-message']))
                 {
                     echo $_SESSION['no-login-message'];
                     unset($_SESSION['no-login-message']);
                 }
            ?>
            
        </div>
        <form class="login-form" action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="submit" value="Log In" class="login-button">
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']));

      $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

      $res = mysqli_query($conn, $sql);
      
      $count = mysqli_num_rows($res);
      if($count==1){
        $_SESSION['login'] ='<div style="color:green">Login Successful</div>';
        $_SESSION['user'] = $username;
        header("location:".SITEURL.'admin/');
      }
      else{
        $_SESSION['login'] ='<div style="color:red">Enter Correct Username or Password</div>';
        header("location:".SITEURL.'admin/login.php');
      }

    }

?>
