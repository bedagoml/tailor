<?php
session_start();
include_once 'dbconnect.php';

// if (!isset($_SESSION['userSession'])) {
// 	header("Location: login.php");
// }

// $query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
// $userRow=$query->fetch_array();

$query1 = $DBcon->query("SELECT * FROM tbl_users ");
// var_dump($users);
$DBcon->close();


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Tailor's Profiles</title>		
		<!-- Meta Description -->
        <meta name="description" content="tailors profile">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Bedah">
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS
		================================================== -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/slit-slider.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body">

		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
                <div class="battery"></div>
            </div>
        </div> 
		<!-- end preloader -->

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="index.php">E-Tailor profiles</a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul  class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <!--  <li><a href="#about">About</a></li> -->
                        
                        <li><a href="read.php" class="dropdown-toggle" data-toggle="dropdown">Tailor Account</a>
						<ul class="dropdown-menu">
							<li><a href="#">Choose an option</a></li>
							<li><a href="register.php">Tailor register</a></li>
							<li><a href="login.php">Tailor login</a></li>
						</ul></li>
                         
                        
                        <li><a href="view.php">Browse Tailors Profile</a></li>
                        
                        <li><a href="#footer">Contact</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		<main class="site-content" role="main">

			

		
        <!--
        Home Slider
        ==================================== -->
		
		
			
			<!-- portfolio section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>REGISTERED TAILORS</h2>
							<p>Check out the most featured tailors works</p>
						</div>
						<ul class="project-wrapper wow animated fadeInUp">
						<?php
					while ($user=$query1->fetch_array()) {?>
							<li class="portfolio-item">
								<img src="user_images/<?php echo $user['file'];?>" class="img-responsive" alt="<?php echo $user['publicinfo'];  ?>" >
								<figcaption class="mask">
									<h3><?php echo $user['name']; ?></h3>
									<p><?php echo $user['publicinfo']; ?> 
                                  
									 </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="<?php echo $user['name']; ?>" data-fancybox-group="works" href="user_images/<?php echo $user['file'];?>"><i class="fa fa-eye"></i></a></li>
									<li><a href=""><i class="fa fa-thumbs-up"></i></a></li>
								</ul>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</section>
			<!-- end portfolio section -->
			

		</main>
		
		<footer id="footer">
			<div class="container">
				<div class="row text-center">
					<div class="footer-content">
						<div class="wow animated fadeInDown">
							<p>Contact Us on our social platform</p>
							<p>Get Cool Stuff!</p>
						</div>
						<form action="#" method="post" class="subscribe-form wow animated fadeInUp">
							<!-- <div class="input-field">
								<input type="email" class="subscribe form-control" placeholder="Enter Your Email..." required="">
								<button type="submit" class="submit-icon">
									<i class="fa fa-paper-plane fa-lg"></i>
								</button>
							</div> -->
						</form>
						<div class="footer-social">
							<ul>
								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-dribbble fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="https://www.youtube.com/channel/UC4yzoGuKkCL_8FzI-B-x83A"><i class="fa fa-youtube fa-3x"></i></a></li>
							</ul>
						</div>
						
						<p>E-Tailor &copy; Copyright 2018. Design and Developed By<a href=""> Bedah Graffix</a> </p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- Google Map API -->
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="js/jquery.slitslider.js"></script>
        <script src="js/jquery.ba-cond.min.js"></script>
		<!-- onscroll animation -->
        <script src="js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="js/main.js"></script>
   
   
    <script src="assets/parsley.min.js"></script>
    <script src="assets/modal.js"></script> 

    </body>
</html> 