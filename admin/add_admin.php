<?php
// Start the session
session_start();
require_once('conn.php');
if (isset($_POST['UserName']) && isset($_POST['MobileNumber']) && isset($_POST['Email']) && isset($_POST['Password'])) {
	$uname = $con->real_escape_string($_POST['UserName']);
	$mobno = $con->real_escape_string($_POST['MobileNumber']);
	$email = $con->real_escape_string($_POST['Email']);
	$password = $con->real_escape_string($_POST['Password']);
	$date = date('Y-m-d H:i:s'); // Assuming you want to set the date to the current date and time
   

	$sql = "INSERT INTO tbladmin (UserName, MobileNumber, Email, Password, AdminRegDate) VALUES ('$uname', '$mobno', '$email', '$password', '$date')";

    if ($con->query($sql) === TRUE) {
		echo "<script> alert('successull') </script>";
		echo "<script> location = 'add-services.php' </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "All fields are required.";
}

// Close connection
$con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #343a40;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #495057;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

.form-group .help-block {
    color: #dc3545;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.btn-primary {
    background-color: #007bff;
    color: #ffffff;
}

.btn-default {
    background-color: #6c757d;
    color: #ffffff;
    margin-left: 10px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-default:hover {
    background-color: #5a6268;
}

    </style>

</head>
<body>
    <div class="container">
        <h2>Add New Admin</h2>
        <form action="" method="post">
           
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="UserName" required>
            </div>
            <div class="form-group">
                <label for="MobileNumber">Mobile Number:</label>
                <input type="tel" id="MobileNumber" name="MobileNumber" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Admin"><br><br><br><br>
                <a href="add-service.php" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
