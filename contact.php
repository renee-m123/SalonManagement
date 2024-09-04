<?php include('conn.php'); ?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>contact</title>
        <link rel="stylesheet" href="contact.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css'>
        <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- font CSS -->
        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet">
       
<body background="img/img22.webp">
     
<?php include_once('includes/nav.php');?>
     <section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-phone-square"></i>
						<h3>Make a Call</h3>
						<p><a href="">0705228475 </a><br><a href="">0756478392</a></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-envelope-open-o"></i>
						<h3>Send a Mail</h3>
						<p><a href="">laneyparlor@gmail.com</a><br><a href="">laneyparlor@gmail.com</a></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-map-marker"></i>
						<h3>Find Us</h3>
						<p>Great Wide Mall, Ongata Rongai<br>Kajiado</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Leave a Review</span></h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-lg-8 offset-lg-2">
				    <form action="service_feedback.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input placeholder="First Name" id="fname" class="form-control" name="fname" type="text" required data-error="Please enter your first name">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input placeholder="Last Name" id="lname" class="form-control" name="lname" type="text">
								</div>
							</div>
						</div>
						<div class="form-group">
							<input placeholder="Email Address" id="email" class="form-control" name="email" type="email" required data-error="Please enter your valid email address">
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<textarea placeholder="Your Comments" id="comment" cols="20" rows="8" class="form-control" name="comment"  required data-error="Please enter your comment"></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="text-center">
							<input value="Send Message" name="submit" class="btn btn-primary" type="submit">
							<div id="msgSubmit" class="hidden"></div>
						</div>
					</form>
				</div>

			</div>

		</div>
	</section>
	<section class="ftco-section row ftco-no-pb text-center">
            <div class="container">
                <div class="row">
                    <div style="margin: 0 auto;" class="col-8">
                        <h3 class="ml-5">Customer's feedback (for services):</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th colspan="2" scope="col">Comment</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
	  $comsql = mysqli_query($con, "SELECT * FROM reviews WHERE 1 ");
	  $count = 1;
	  while ($comrow = mysqli_fetch_assoc($comsql)) {
	?>
                                <tr>
                                    <th scope="row"><?= $count ;?></th>
                                    <td><?= $comrow['fname'] ;?></td>
                                    <td><?= $comrow['lname'] ;?></td>
                                    <td colspan="2"><?= $comrow['comment'] ;?></td>
                                    <td><?= $comrow['date'] ;?></td>
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
        </section>
	
   
     <?php include_once('includes/footer.php');?>
    
    
</body>
    </head>
</html>