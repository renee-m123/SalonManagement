<?php
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
  	if (!empty($_GET['id'])) {
  		$id = $_GET['id'];
  		$sql = "UPDATE tblappointments SET Status = 'Rejected' WHERE ID = '$id' ";
  		$run_sql = mysqli_query($con, $sql);
  		echo "<script> location = 'rejected-appointment.php' </script>";
  	}

}
  ?>