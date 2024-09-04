<?php
session_start();
require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $con->real_escape_string($_POST['Email']);
    $password = $con->real_escape_string($_POST['Password']);

    // Fetch admin details from the database
    $query = "SELECT * FROM tbladmin WHERE Email = '$email'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['Password'])) {
            // Password is correct, start session
            $_SESSION['admin_email'] = $email;
            header("Location: about.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_admin</title>
</head>
<link rel="stylesheet" href="login.css">
<body>
    <div class="center">
        <div class="container">
            <div class="text"> Login page</div>
            <form action="post">
                <div class="data">
                    <label>Enter your email</label>
                    <input type="text" name="Email" required>
                </div>
                <div class="data">
                    <label>Enter your password</label>
                    <input type="password" name="Password" required>
                </div>
                <div class="forgot-pass"><a href="#">Forgot password?</a></div>
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit">login</button>
                </div>
                <div class="signup">Not registered yet?<a href="signup.html">Sign up</a><br><br>
                    Log in as a client <a href="login.php">Log In</a>
                    Log in as a staff <a href="stafflogin.php">Log In</a>
                    <div>
            </form>
        </div>
    </div>
    
   
            
</body>
</html>