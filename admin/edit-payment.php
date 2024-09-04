<?php
	session_start();
	include('conn.php');
	if(!strlen($_SESSION['bpmsaid'])) {
		header('location:logout.php');
	} else {
		$pid = $con->real_escape_string($_GET['id']);
		$pmntInfo = $con->query("SELECT * FROM tblpayments WHERE id = '{$pid}'")->fetch_assoc();
		if(isset($_POST['update-payment'])) {
			$method		= $con->real_escape_string($_POST['pmnt_method']);
			$paid_amount	= $con->real_escape_string($_POST['paid_amount']);

			$qSql = "UPDATE tblpayments SET method= '{$method}', paid_amount = '{$paid_amount}' ";
			$qSql.= "WHERE id ='{$pmntInfo['id']}' ";
			$query = mysqli_query($con, $qSql);
			if($query) {
				echo "<script>alert('Payment successfully updated.');</script>";
				echo "<script>window.location.href = 'payments.php'</script>";
			} else echo "<script>alert('". $con->error ."');</script>";
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>New Payment</title>

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
					<h3 class="title1">Payments</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Payment:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<input type="hidden" name="update-payment" />
								<p style="font-size:16px; color:red" align="center"><?php if(isset($msg))echo $msg;?> </p>
								
								<div class="form-group">
									<label>Payment method</label>
									<input type="text" class="form-control" value="<?= $pmntInfo['method'] ?>" name="pmnt_method" required="true">
								</div>
								
								<div class="form-group">
									<label>Paid Amount</label>
									<input type="number" class="form-control" value="<?= $pmntInfo['paid_amount'] ?>" name="paid_amount" required="true">
								</div>
								
								<button type="submit" name="submit" class="btn btn-default">Update</button>
							</form> 
						</div>
					</div>
				</div>
			</div>
		 <?php include_once('includes/footer.php');?>
		</div>
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
	<script>
		$(document).ready(function() {
			rr_row = $('#rep-row').html();
			$('#rr-btn').on('click', function(){
				$('#rep-row').append(rr_row);
				$('#lrd-btn').show();
			});
			$('#lrd-btn').on('click', function(){
				$('#rep-row tr').last().remove();
				if($('#rep-row tr').length == 1) $('#lrd-btn').hide();
			});
			$(document).on("change", '.service-select', function(){
				var service_price = $(this).find("option:selected").data("spr");
				$(this).closest("tr").find(".service-price").val(service_price);
			});
		});
	</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>