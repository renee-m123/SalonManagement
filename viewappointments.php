<?php
// Start the session
session_start();
include('conn.php');
if (!isset($_SESSION['bpmsaid'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['bpmsaid'];

 //Fetch the user's appointments from the database
$query = "select Services, AptDate, AptTime FROM tblappointments WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();
// Handle appointment cancellation
if (isset($_POST['cancel_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $cancel_query = "UPDATE tblappointments SET status='cancelled' WHERE id='$appointment_id' AND user_id='$user_id'";
    $con->query($cancel_query);
}

// Retrieve user's appointments
$query = "SELECT * FROM tblappointments WHERE user_id='$user_id' AND Status='1' ORDER BY AptDate DESC";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="viewapt.css">
    <link href="css/style.css" rel='stylesheet' type='text/css'>
    <?php include_once('includes/nav.php');?>
</head>
<body>
    <div class="container">
        <h1>My Appointments</h1>
        <?php if ($result->num_rows >0):?>
        <table>
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if the user has any appointments
                if ($result->num_rows > 0) {
                    // Loop through each appointment and display it
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                        <td><?= htmlspecialchars($row['Services']) ?></td>
                        <td><?= htmlspecialchars(date('Y-m-d H:i', strtotime($row['AptTime']))) ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="appointment_id" value="<?= $row['id'] ?>">
                                <button type="submit" name="cancel_appointment" onclick="return confirm('Are you sure you want to cancel this appointment?');">Cancel</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                    
            </tbody>
                    
        </table>
        <?php  }else; ?>
        <p>You have no scheduled appointments.</p>
    <?php endif; ?>
    </div>
    <br><br><br>
    <?php include_once('includes/footer.php');?>
</body>
</html>

<?php
// Close the database connection
$con->close();
?>
