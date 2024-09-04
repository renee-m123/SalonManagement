<?php
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else {
  // Fetch the data before displaying the form
  $cid = $_GET['editid'];
  $ret = mysqli_query($con,"select * from tblservices where ID='$cid'");
  $row = mysqli_fetch_array($ret);

  if(isset($_POST['submit'])) {
    $sername = $_POST['sername'];
    $cost = $_POST['cost'];
    $description = $_POST['description'];
    $eid = $_GET['editid'];
    
    $query = mysqli_query($con, "update tblservices set ServiceName='$sername', Cost='$cost', description='$description' where ID='$eid'");
    
    if ($query) {
      $msg = "Service has been Updated.";
      header("location: manage-services.php");
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
  }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Update Services</title>

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
					<h3 class="title1">Update Services</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Parlour Services:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  		 <div class="form-group">
							  <label for="exampleInputEmail1">Service Nameless</label>
							  <input type="text" class="form-control" id="sername" name="sername" placeholder="Service Name" value="<?php  echo $row['ServiceName'];?>" required="true"> 
							</div> 
							<div class="form-group"> 
								<label for="exampleInputPassword1">Cost</label> 
								<input type="text" id="cost" name="cost" class="form-control" placeholder="Cost" value="<?php  echo $row['Cost'];?>" required="true"> 
							</div>
							<div class="form-group"> 
								<label for="description">Description</label> 
								<input type="text" id="description" name="description" class="form-control" placeholder="Cost" value="<?php  echo $row['description'];?>" required="true"> 
							</div>
							 <?php ?>
							  <button type="submit" name="submit" class="btn btn-default">Update</button> 
							</form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
  <?php
 $cid=$_GET['editid'];
 $ret=mysqli_query($con,"select * from  tblservices where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 

  
					
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
<?php } ?>