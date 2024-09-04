<?php
session_start();
error_reporting(0);
include('conn.php');
	if (!strlen($_SESSION['bpmsaid'])) {
		header('location:logout.php');
	} else {
		if(isset($_POST['update'])){
		   $id = $_POST['id'];
		   
		   // Getting data from the admin
		   $name = mysqli_escape_string($con, $_POST['name']);
		   $sfee = mysqli_escape_string($con, $_POST['sfee']);
		   $sql = "UPDATE tblappointment SET payment = '$name', service_fee= '$sfee' WHERE ID = '$id' ";
		   $run_sql = mysqli_query($con, $sql);
		   
		   // Checking if data inserted into database
		   if ($run_sql) {
			echo "<script> alert('Accepted Appointment updated into database') </script>";
			echo "<script> location = 'accepted-appointment.php' </script>";
		   } else{
			echo "<script> alert('Something went wrong, Please try again!!') </script>";
		   }
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Edit Category</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/styleF.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Edit Category</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title"></div>
						<div class="form-body">
							<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
							<?php
								$pid = $_GET['id'];  
								$sql = "SELECT * FROM tblappointment WHERE ID ='$pid' ";
								$run_psql = mysqli_query($con, $sql);
								$prow = mysqli_fetch_array($run_psql);
							?>
					            <label for="category_name">Payment</label>
    							<input name="name" type="text" class="form-control" id="category_name" value="<?php echo $prow['payment'] ;?>" required><br>
    							
								<label for="service_fee">Service Fee</label>
    							<input name="sfee" type="text" class="form-control" id="service_fee" value="<?php echo $prow['service_fee'] ;?>"><br>
								
								<input type="hidden" name="id" value="<?php echo $pid ?>">
    							<button class="btn btn-success" name="update" type="submit">UPDATE</button>
	        				</form> 
						</div>
					</div>
				</div>
			</div>
		<?php include_once('includes/footer.php');?>
		</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
