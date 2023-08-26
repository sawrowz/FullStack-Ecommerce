<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Pangolin&family=Poppins&family=Raleway:wght@100&family=Righteous&family=Roboto+Slab:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Raleway, sans-serif;
            background: linear-gradient(#f7f1e5, #252509);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #f7f1e5;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .head {
            display: flex;
            justify-content: space-between;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-weight:700;
        }

        .message {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.2rem;
        }

        .button {
            background-color: #363b15;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 3px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #52582a;
        }

        p {
            font-weight: 700;
        }
    </style>
</head>

<body>


    <!-- Login Form -->
    <div class="container">
        <div class="head">

            <h1>User Login</h1>
           
            <img src="images/logo (2).png" alt="" width="100px">
        </div>
        <br>
            <?php
             if(isset($_SESSION['add-user']))
             {
                 echo $_SESSION['add-user'];
                 unset($_SESSION['add-user']);
             }
             if(isset($_SESSION['login']))
             {
                 echo $_SESSION['login'];
                 unset($_SESSION['login']);
             }
             if(isset($_SESSION['no-user-login']))
             {
                 echo $_SESSION['no-user-login'];
                 unset($_SESSION['no-user-login']);
             }

        ?>
           
        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="username" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="password" required>
            </div>
            <input type="submit" name="submit" value="Login" class="button">
            <p>Don't have an account? <a href="register.php">Create an account</a></p>
        </form>
    </div>

    <script>
  // ... (previous JavaScript code for registration form validation) ...
    </script>
</body>

</html>
<?php
    if(isset($_POST['submit']))
    {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
      $res = mysqli_query($conn, $sql);
      
      $count = mysqli_num_rows($res);
      if($count==1){
        $data=mysqli_fetch_assoc($res);
        $_SESSION['id'] = $data['id'];
        $_SESSION['login'] ='<h5 style="font-weight:700; color:green">Login Successful</h5>';
        $_SESSION['userf'] = $username."<i class='bi bi-person-circle'></i>";
        header("location:".SITEURL.'home.php');
      }
      else{
        $_SESSION['login'] ='<h5 style="font-weight:700; color:red">Enter Correct Username or Password</h5>';
        header("location:".SITEURL.'login.php');
      }

    }

?>