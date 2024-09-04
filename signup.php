<?php
    session_start();

    include("conn.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "insert into signuptbl (fullName, email, phoneNo, password, cpassword) values ('$fullName', '$email', '$phoneNo', '$password','$cpassword')";


            mysqli_query($con, $query);
            //redirect to file.php
            header("Location: file.php");
            exit();
            
        }
        else
        {
            echo "<script type='text/javascript'> alert ('Enter valid information!')</script>";
        }
    }
?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="signup.css">
        </head>
        
<body>
    <div class="center">
        <div class="container">
            <div class="text"> Register Here</div>
            <form method= "post">
                <div class="data">
                    <label for="name">Enter your Full Name</label>
                    <input type="text" id="name" name="fullName" required>
                </div>
                <div class="data">
                    <label for="email">Enter your email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="data">
                    <label>Enter your Phone No</label>
                    <input type="tel" id="tel" name="phoneNo" required>
                </div>
                <div class="data">
                    <label>Enter your password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="data">
                    <label for="cpassword">Confirm password</label>
                    <input type="password" id="cpassword" name="cpassword" required>
                </div>
                
                <div class="forgot-pass"><a href="#">Forgot password?</a></div>
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit">Sign Up</button>
                </div>
                <div class="signup">Already registered?  <a href="login.php">Login</a><div>
            </form>
        </div>
    </div>
    
   
            
</body>
    
</html>