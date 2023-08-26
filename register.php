<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
            width: 600px;
            height:710px;
        }

        

        label {
            display: block;
            /* margin-bottom: 0.5rem; */
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-weight: 700;
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
        p{
            font-weight:700;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Registration</h2>
        <br>
        <?php
             if(isset($_SESSION['add-user']))
             {
                 echo $_SESSION['add-user'];
                 unset($_SESSION['add-user']);
             }

        ?>

        <br>
        <form id="registrationForm" onsubmit="return validateForm()" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span class="message" id="passwordMessage"></span>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3"  required></textarea>
            </div>
             <input type="submit" name="submit" value="Register" class="button">
             <br>
            <p>Don't have an account? <a href="login.php">Click here to Login</a></p>

        </form>
        <?php
    //save value in database

    if(isset($_POST['submit']))
    {
        $fname = $_POST['fullName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $address = $_POST['address'];


        $sql = "INSERT INTO tbl_user SET
            full_name='$fname',
            username='$username',
            email='$email',
            phone=$phone,
            password='$password',
            address='$address'
        ";
        
        $res = mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            // echo "Data Insert Succefully";
            $_SESSION['add-user'] = '<div style="color:green">User Added Successfully</div>';
            header("location:".SITEURL.'login.php');
        }
        else{
            $_SESSION['add-user'] = '<div style="color:green">Failed to Add User</div>';
            header("location:".SITEURL.'register.php');
        }
    }
    

?>
    </div>
    <script>
        function validateForm() {
            const form = document.getElementById("registrationForm");
            const phoneRegex = /^[0-9]{10}$/;
            const password = form.password.value;
            const confirmPassword = form.confirmPassword.value;

            if (!phoneRegex.test(form.phone.value)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== confirmPassword) {
                document.getElementById("passwordMessage").textContent = "Passwords do not match.";
                return false;
            }

            return true;
        }
        
    </script>
</body>

</html>