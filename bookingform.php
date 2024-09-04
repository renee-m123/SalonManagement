<?php
session_start();
error_reporting(0);
require_once('conn.php');
if (!isset($_SESSION['bpmsaid'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

if (isset($_POST['Services']) && isset($_POST['AptDate']) && isset($_POST['AptTime'])) {
       // Get user ID from session
       $user_id = $_SESSION['bpmsaid'];

       $user_query = "SELECT fullName, phoneNo, email FROM signuptbl WHERE id = ?";
        $stmt = $con->prepare($user_query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $user_result = $stmt->get_result();
        $user_data = $user_result->fetch_assoc();


        $service = $con->real_escape_string($_POST['Services']);
        $rdate = $con->real_escape_string($_POST['AptDate']);
        $rtime = $con->real_escape_string($_POST['AptTime']);

        // server side vslidstion
        $current_date = date('Y-m-d');
        $current_time = date('H:i');

        if ($rdate < $current_date) {
            echo "Invalid date. You cannot book for past dates.";
            exit();
        }
    
        // Check if the appointment is on a weekend
        $day_of_week = date('N', strtotime($rdate)); // 1 (Mon) - 7 (Sun)
        if ($day_of_week == 6 || $day_of_week == 7) {
            echo "Appointments cannot be booked on weekends.";
            exit();
        }
    
        // Check if the appointment time is within working hours
        $appointment_hour = (int)explode(':', $rtime)[0];
        if ($appointment_hour < 9 || $appointment_hour >= 17) {
            echo "Our working hours are between 9:00 AM and 5:00 PM.";
            exit();
        }

        if ($user_data) {
            $name = $user_data['fullName'];
            $phone_number = $user_data['phoneNo'];
            $email = $user_data['email'];

$appointment_query = "INSERT INTO tblappointments (user_id, fullName, phoneNo, Services, AptDate, AptTime, Status) VALUES (?, ?, ?, ?, ?, ?, '0')";
$stmt = $con->prepare($appointment_query);
$stmt->bind_param("isssss", $user_id, $name, $phone_number, $service, $rdate, $rtime);
if ($stmt->execute()) {
    echo "Appointment booked successfully.";
} else {
    echo "Failed to book appointment.";
}
} else {
echo "User information not found.";
}

$stmt->close();
$con->close();
} else {
//echo "Invalid request.";
}
//fetch services from tblservices
$sql = "SELECT id, ServiceName FROM tblservices";
$result = $con->query($sql);

if ($result === false) {
   die("Error fetching services: " . $con->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Appointment</title>
    <link rel="stylesheet" href="form.css">
    <link href="css/style.css" rel='stylesheet' type='text/css'>
        <link href="css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/font-awesome.min.css"> 
        <script>
        function setMinDate() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('reservation_date').setAttribute('min', today);

            document.getElementById('reservation_date').addEventListener('change', function() {
                const day = new Date(this.value).getUTCDay();
                if ([6, 0].includes(day)) { // 6 = Saturday, 0 = Sunday
                    alert('Not open on weekends.');
                    this.value = '';
                }
            });
        }

        function validateTime() {
            const timeInput = document.getElementById('reservation_time');
            const time = timeInput.value.split(':');
            const hour = parseInt(time[0], 10);

            if (hour < 9 || hour > 17 || (hour === 17 && time[1] !== '00')) {
                alert('Appointments can only be booked between 9:00 AM and 5:00 PM.');
                timeInput.value = '';
            }
        }
    </script>
        
</head>
<body onload="setMinDate()">
<?php include_once('includes/nav.php');?>
<div class="container">
        <h2>Book a Salon Appointment</h2>
        <form action="bookingform.php" method="post">
            <div class="form-group">
                <label for="service">Service:</label>
                <select id="service" name="Services" required>
                    <option value="">Select a service</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['ServiceName']) . '">' . htmlspecialchars($row['ServiceName']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="reservation_date">Reservation Date:</label>
                <input type="date" id="reservation_date" name="AptDate" required>
            </div>
            <div class="form-group">
                <label for="reservation_time">Reservation Time:</label>
                <input type="time" id="reservation_time" name="AptTime" required>
            </div>
            <div class="form-group">
                <button type="submit">Book Appointment</button><br><br><br>
                <button type="button" onclick="window.location.href='services.php';">Cancel</button>
            </div>
        </form>
    </div>
    <?php include_once('includes/footer.php');?>
</body>
</html>