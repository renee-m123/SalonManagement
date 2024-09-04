<?php
     session_start();

     include("conn.php");
     
     /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string($_POST['password']);
    
        // Validate user credentials
        $sql = "SELECT * FROM signuptbl WHERE email='$email' AND password=MD5('$password')";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            // User is authenticated
            $_SESSION['email'] = $email;
            header("Location: file.php"); // Redirect to home
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Invalid email or password!');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Error: " . $con->error . "');</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Please enter email and password.');</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
        $email =  $con->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "SELECT * FROM signuptbl WHERE email='$email' AND password=MD5('$password')";

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
}

    $con->close();

   
        /* Prepare and bind
        $stmt = $con->prepare("SELECT * FROM signuptbl WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct
                $_SESSION['email'] = $email;
                header("Location: file.php"); // Redirect to the desired page
                exit();
            } else {
                // Invalid password
                echo "<script type='text/javascript'> alert ('Invalid username or password!')</script>";
            }
        } else {
            // Invalid email
            echo "<script type='text/javascript'> alert ('Enter valid information!')</script>";
        }

        
    } else {
        echo "Please enter username and password.";
    }
}

$con->close();*/
if (isset($_POST['email']) && ($_POST['password'])) 
	{
        $email = $con->real_escape_string($_POST['email']);
	    $password = $con->real_escape_string($_POST['password']);
        $query = mysqli_query($con, "select ID from signuptbl where email='$email' && password='$password' ");
        $ret = mysqli_fetch_array($query);
  
        if ($ret>0) {
        $_SESSION['bpmsaid'] = $ret['ID'];
        header('location:file.php');
    } else {
        $msg = "Invalid Details.";
    }
    
}

    ?>


<html>
    <head>
        <title>login</title>
        <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
        <link rel="stylesheet" href="login.css">
    </head>
<body>
    <div class="center">
        <div class="container">
            <div class="text"> Login page</div>

            <form action="login.php" method="post">
                <div class="data">
                    <label>Enter your email</label>
                    <input type="text"  id="email"  name="email" required>
                </div>
                <div class="data">
                    <label>Enter your password</label>
                    <input type="password"  id="password" name="password" required>
                </div>
                <div class="forgot-pass"><a href="forgot-password.php">Forgot password?</a></div>
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit">login</button>
                </div>
                <div class="signup">Not registered yet?<a href="signup.php">Sign up</a><br><br>
                
                  
                    <div>
            </form>
        </div>
    </div>
    
</body>
  
</html>