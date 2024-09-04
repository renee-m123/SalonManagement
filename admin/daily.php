<?php
session_start();
//error_reporting(0);
include('conn.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else{
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Reports</title>

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
<link href="css/animateF.css" rel="stylesheet" type="text/css" media="all">
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
					<h3 class="title1">Reports</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Daily reports:</h4>
						</div>
						<div class="form-body">
							<table class="table table-bordered">
								<thead> 
									<tr> 
										<th>#</th> 
										<th>Date</th> 
										<th>Total Services</th> 
										<th>Total Amount</th>
										<th>Total Received</th>
									</tr> 
								</thead> 
								<tbody>
								<?php
									$ret = mysqli_query($con, "SELECT * FROM tblappointments GROUP BY AptDate ");
									$total_tcost = $total_paid = 0;
									$sl = 1;
									while($row=mysqli_fetch_array($ret)) {
										$tCost = 0;
										$fDate = date("Y-m-d", strtotime($row['AptDate']));
										$a_inDay = $con->query("SELECT * FROM tblappointments WHERE AptDate = '{$row['AptDate']}'");
										while($ainDayInfo = $a_inDay->fetch_assoc()) $tCost += $ainDayInfo['Cost'];
										$pinDayInfo = $con->query("SELECT SUM(paid_amount) AS tPaid FROM tblpayments WHERE date_of_pmnt LIKE '{$fDate}%'")->fetch_assoc();
										$tPaid = $pinDayInfo['tPaid'] ? $pinDayInfo['tPaid'] : 0;
								?>	<tr> 
										<th scope="row"><?= $sl ?></th> 
										<td><?= $row['AptDate'] ?></td>
										<td><?= $a_inDay->num_rows ?></td>
										<td>ksh<?= $tCost ?></td>
										<td>ksh<?= $tPaid ?></td>
									</tr><?php
										$sl++;
										$total_tcost += $tCost;
										$total_paid += $tPaid;
									}
								?>
								</tbody> 
								<tfoot>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td>ksh<?php echo $total_tcost ;?></td>
										<td>ksh<?php echo $total_paid ;?></td>
									</tr>
								</tfoot>
							</table>
						</div>
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
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>