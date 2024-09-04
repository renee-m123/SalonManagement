<?php
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

	if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			
			$sql = "DELETE FROM reviews WHERE id = '$id' ";
			$run_sql = mysqli_query($con, $sql);
			if ($run_sql) {
				echo "<script> alert('feedback deleted') </script>" ;
				echo "<script> location = 'new-feedback.php' </script>";
			}else{
				echo "<script> alert('Can not delete from feedback, Please try again!') </script>";
			}
		}
  
}
?>
