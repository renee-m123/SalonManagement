<?php 
include('conn.php');
session_start();
error_reporting(0);

// Fetch data from the database
$sql = "SELECT id, ServiceName, Cost, description FROM tblservices";
$result = $con->query($sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display services</title>
    <meta name="description" content="">
    <meta name="author" content="">
        <title>Service display</title>
        <link rel="stylesheet" href="display.css">
        <link href="css/style.css" rel='stylesheet' type='text/css'>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all service cards
        var serviceCards = document.querySelectorAll('.card');
        
        // Add click event listener to each card
        serviceCards.forEach(function(card) {
            card.addEventListener('click', function() {
                // Get the booking URL from the data attribute
                var bookingUrl = card.getAttribute('data-booking-url');
                
                // Redirect to the booking page
                window.location.href = "bookingform.php";
            });
        });
    });
</script>
        
        <?php include_once('includes/nav.php');?>
</head>
<body>
<div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
              //S echo '<img src="'  . htmlspecialchars($row["ServiceName"]) . '">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">' . htmlspecialchars($row["ServiceName"]) . '</h2>';
                echo '<p class="card-price">KSH' . htmlspecialchars($row["Cost"]) . '</p>';
                echo '<p class="card-text">' . htmlspecialchars($row["description"]) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No services available.</p>';
        }
        $con->close();
        ?>
    </div>
    
<!--section class="ftco-section row ftco-no-pb text-center">
            <div class="container">
                <div class="row">
                    <div style="margin: 0 auto;" class="col-8">
                        <h3 class="ml-5">Services Details:</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php  
	  $comsql = mysqli_query($con, "SELECT * FROM tblservices WHERE 1 ");
	  $count = 1;
	  while ($comrow = mysqli_fetch_assoc($comsql)) {
	?>
                                <tr>
                                    <th scope="row"><?= $count ;?></th>
                                    <td><?= $comrow['ServiceName'] ;?></td>
                                    <td><?= $comrow['Cost'] ;?></td>
                                   
                                </tr>
                                <?php  
	  $count++;
	}
	?>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>

        </section><br><br><br><br><br>
        <button type="button" style="display: block; margin: auto;" onclick="window.location.href='services.php';">Go Back</button><br><br><br><br-->

       
</body>
</html>