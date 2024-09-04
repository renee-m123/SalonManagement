<?php
session_start();
error_reporting(0);
require_once('conn.php');
// Fetch data from the database
$sql = "SELECT id, ServiceName, Cost, Description FROM tblservices";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            background-color:#627988d8;
            margin: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1em;
            margin-bottom: 20px;
        }
        .card-price {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
            //   echo '<img src="'  . htmlspecialchars($row["ServiceName"]) . '">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">' . htmlspecialchars($row["ServiceName"]) . '</h2>';
                echo '<p class="card-text">' . htmlspecialchars($row["Description"]) . '</p>';
                echo '<p class="card-price">$' . htmlspecialchars($row["Cost"]) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No services available.</p>';
        }
        $con->close();
        ?>
    </div>
</body>
</html>