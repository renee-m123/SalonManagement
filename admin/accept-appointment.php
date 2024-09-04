<?php
session_start();
include('conn.php');

// Check if the admin is logged in
if (!isset($_SESSION['bpmsaid'])) {
    header('Location: logout.php');
    exit();
}

// Check if the appointment ID is provided via GET request
if (!empty($_GET['id'])) {
    $id = intval($_GET['id']); 

    // Prepare the SQL UPDATE statement
    $sql = "UPDATE tblappointments SET Status = '1' WHERE id = ?";

    // Initialize a prepared statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind the parameter to the SQL query
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the appointments page with a success message
            header("Location: accepted-appointment.php?message=Appointment+accepted");
            exit();
        } else {
            echo "Error: Could not execute the update query.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare the update query.";
    }
} else {
    echo "No appointment ID provided.";
}

 //Close the database connection
mysqli_close($con);
?>
