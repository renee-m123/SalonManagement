<?php
session_start();
error_reporting(0);
include('conn.php');
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>services </title>
        <link rel="stylesheet" href="services.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css'>
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/venobox.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/chosen.css" rel="stylesheet">
        <link href="css/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="css/notifIt.css" rel="stylesheet">
        <link href="css/datepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/font-awesome.min.css"> 
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
<body background="img/img21.jpg">
<?php include_once('includes/nav.php');?>
    
    
    <section class="section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2><span>Our Services</span></h2>
                        <p>Our product is fully personalized and well balanced for all age of customers or adults.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item wow fadeIn">
                        <div class="thumb">
                            <a href= "services.php"><img src ="img/services/hair.webp" alt=""></a>
                        </div>
                        <div class="service-info text-center">
                            <h3><a href="service-single.html">Hair services</a></h3>
                            <p>Discover the perfect look with our expert hair services. From stylish cuts and vibrant coloring to luxurious treatments, we create stunning results tailored just for you. Book your appointment today for a fresh, fabulous transformation!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item wow fadeIn">
                        <div class="thumb">
                            <a href= "services.php"><img src="img/services/makeup.jfif" alt=""></a>
                        </div>
                        <div class="service-info text-center">
                            <h3><a href=" ">MakeUp</a></h3>
                            <p>Makes your face look sophisticated, chic, and beautiful. Bridal make-up is also a specialty of the salon.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item wow fadeIn">
                        <div class="thumb">
                            <a href="services.php"><img src="img/services/images.jpg" alt=""></a>
                        </div>
                        <div class="service-info text-center">
                            <h3><a href="service-single.html">Facial</a></h3>
                            <p>Cleanses, exfoliates, and moisturizes your face skin. Specific products, manual manipulation (massage), and in some cases heat or steam are applied, as needed.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="servicedisplay.php" class="btn btn-primary">All Services</a><br><br><br>
                    <a href="viewappointments.php" class="btn btn-primary">View my Appointments</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end services -->
    <section class="section-spacing " id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <p>Our product is fully personalized and well balanced for all age of customers or adults.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/bridal.jfif" class="venobox" data-gall="gallery">
                            <img src="img/gallery/download.jfif" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Facial Massage</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/services/bridal-makeup.jpg" class="venobox" data-gall="gallery">
                            <img src="img/gallery/mani.jfif" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Mani&&Pedi</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/gallery/hair treatment.jpg" class="venobox" data-gall="gallery">
                            <img src="img/gallery/braid.jfif" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Hair Treatment</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/massage-room.jpg" class="venobox" data-gall="gallery">
                            <img src="img/gallery/masageroom.jpg" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Massage Room</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/gallery/body massage.jpg" class="venobox" data-gall="gallery">
                            <img src="img/gallery/body.jfif" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Body Massage</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="gallery-item wow fadeIn">
                        <a href="img/cosmetics.jpg" class="venobox" data-gall="gallery">
                            <img src="img/cosmetics.jpg" alt="">
                            <div class="gallery-caption text-center">
                                <i class="fa fa-heart-o"></i>
                                <h3>Salon Cosmetics</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!--home appointment-->
    <section class="section-spacing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="appoinment-text wow fadeIn">
                        <h2>Make Home Appointment?</h2>
                         <p> If you are in <strong>Nairobi or Kajiado</strong> then fill the form for appointment.</p>
						 <p>We are giving you home service. If you have any concern, feel free to call us in the following number</p>
                         <p><strong>Call us : 0705228475</strong> or fill out our online booking & equiry form and we’ll contact you.</p>
                        <a href="bookingform.php" style="border: 15px solid #213025 ; background:#213025; color:bisque;text-decoration:none ;">Make Home Appointment</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="appoinment-img text-md-right text-center wow fadeIn">
                        <img class="tilt-img rounded" src="img/img15.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <!-- end appointment --> 
    <!--Preload-->
    <?php include_once('includes/footer.php');?>
    <!-- end nav -->
    <!-- end banner -->
      
</body>
    </head>
</html>