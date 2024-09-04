<?php
session_start();
require_once "conn.php";

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['comment'])) {
	$fname = $con->real_escape_string($_POST['fname']);
	$lname = $con->real_escape_string($_POST['lname']);
	$email = $con->real_escape_string($_POST['email']);
	$comment = $con->real_escape_string($_POST['comment']);
	$date = date('Y-m-d H:i:s'); // Assuming you want to set the date to the current date and time
    $status = 'pending';

	$sql = "INSERT INTO reviews (fname, lname, email, comment, date, status) VALUES ('$fname', '$lname', '$email', '$comment', '$date', '$status')";

    if ($con->query($sql) === TRUE) {
		echo "<script> alert('Thank you for your feedback..!!!!') </script>";
		echo "<script> location = 'contact.php' </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "All fields are required.";
}

// Close connection
$con->close();
/*
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])  && isset($_POST['comment']) ) {
	// Get user ID from session
	$user_id = $_SESSION['bpmsaid'];

	$user_query = "SELECT fullName, phoneNo FROM signuptbl WHERE id = ?";
	 $stmt = $con->prepare($user_query);
	 $stmt->bind_param("i", $user_id);
	 $stmt->execute();
	 $user_result = $stmt->get_result();
	 $user_data = $user_result->fetch_assoc();

	 $comment = $con->real_escape_string($_POST['comment']);
	 $date = date('Y-m-d H:i:s'); // Assuming you want to set the date to the current date and time
	 $status = 'pending';

	 if ($user_data) {
		$name = $user_data['fullName'];
		$phone_number = $user_data['phoneNo'];
		$email = $user_data['email'];

		$appointment_query = "INSERT INTO reviews (user_id, fullName, phoneNo, email, comment, Status) VALUES (?, ?, ?, ?,?,  'pending')";
		$stmt = $con->prepare($feedback_query);
		$stmt->bind_param("isssss", $user_id, $name, $phone_number, $email, $service, $comment);
		if ($stmt->execute()) {
		echo "Thank you for your feedback.";
		} else {
		echo "erroe!!.";
		}
		} else {
		echo "User information not found.";
		}

		$stmt->close();
		$con->close();
		} else {
		//echo "Invalid request.";
		}
*/
?>

