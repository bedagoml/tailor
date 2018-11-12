<?php
session_start();
error_reporting( ~E_NOTICE );
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
// $DBcon->close();




if(isset($_POST['btn-submit'])) {
  
  $name = strip_tags($_POST['name']);
  $phone = strip_tags($_POST['phone']);
  $publicinfo = strip_tags($_POST['publicinfo']);
  $facebook = strip_tags($_POST['facebook']);
  $twitter = strip_tags($_POST['twitter']);
  
  $name = $DBcon->real_escape_string($name);
  $phone = $DBcon->real_escape_string($phone);
  $publicinfo = $DBcon->real_escape_string($publicinfo);
  $facebook = $DBcon->real_escape_string($facebook);
  $twitter = $DBcon->real_escape_string($twitter);

$file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $folder="user_images/";
  
  // new file size in KB
  $new_size = $file_size/1024;  
  // new file size in KB
  
  // make file name in lower case
  $new_file_name = strtolower($file);
  // make file name in lower case
  
  $final_file=str_replace(' ','-',$new_file_name);
  
  
  if(move_uploaded_file($file_loc,$folder.$final_file))
  {
  //  $check_img = $DBcon->query("SELECT file FROM tbl_users WHERE user_id='$_SESSION[userSession]'");
  // $count=$check_img->num_rows;
  
  // if ($count==0) {
  
  
  $query1 = "UPDATE tbl_users SET name='$name', phone='$phone', publicinfo='$publicinfo', facebook='$facebook', twitter='$twitter', file='$file' WHERE user_id='$_SESSION[userSession]'";
    
    // $query = "UPDATE tbl_users(name,phone,publicinfo,facebook,twitter) VALUES('$name','$phone','$publicinfo','$facebook','$twitter') WHERE user_id='.$_SESSION[userSession].'";

    if ($DBcon->query($query1)) {
      $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Profile successfully Submitted !
          </div>";
    }else {
      $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while submitting your profile, please try again !
          </div>";
    }
    
  } 
}
 
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
        <meta name="description" content="Blue One Page Creative Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Muhammad Morshed">
    
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
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 

    <!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>
  
    <body id="body">

    <!-- preloader -->
    <!-- <div id="preloader">
            <div class="loder-box">
                <div class="battery"></div>
            </div>
        </div>  -->
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
                        <li><a href="home.php">Profile</a></li>
                        <li><a href="read.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a>
            <ul class="dropdown-menu">
              <li><a href="#">Choose an option</a></li>
              <li><a href="update.php"><span class="glyphicon glyphicon-user"></span>Update Profile</a></li>
              <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
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
    
    
      
      <!-- Testimonial section -->
      <section id="testimonials" class="parallax">
        <div class="overlay">
          <div class="container">
            <div class="row">
            
              <div class="sec-title text-center white wow animated fadeInDown">
                <br><br><br><br>
                <h2>Welcome tailor <?php echo $userRow['username']; ?> </h2>
                <?php if (isset($msg)){ echo $msg;} ?>
              </div>

              
                <div class="row" >
                    <div class="col-md-6">
                        <form method="POST" style="align-content: center;" enctype="multipart/form-data" >
                              
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Full Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="Full Name..." class="form-control here" required="required" type="text"value="<?php echo $userRow['name']; ?>" >
                                </div>
                              </div>
                             
                              <div class="form-group row">
                                <label for="phone" class="col-4 col-form-label">Phone Number</label> 
                                <div class="col-8">
                                  <input id="phone" name="phone" placeholder="Enter Phone Number..." class="form-control here" required="required" type="text" value="<?php echo $userRow['phone']; ?>">
                                </div>
                              </div>
                             
                             
                              
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label> 
                                <div class="col-6">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control" required="required"><?php echo $userRow['publicinfo']; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="facebook" class="col-4 col-form-label">Facebook URL</label> 
                                <div class="col-8">
                                  <input id="facebook" name="facebook" placeholder="Enter your facebook URL..." class="form-control here" required="required" type="text" value="<?php echo $userRow['facebook']; ?>" >
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="twitter" class="col-4 col-form-label">Twitter URL</label> 
                                <div class="col-8">
                                  <input id="twitter" name="twitter" placeholder="Enter your Twitter URL..." class="form-control here" required="required" type="text"value="<?php echo $userRow['twitter']; ?>" >
                                </div>
                              </div> 
                                 <div class="text-center">
        <img src="user_images/<?php echo $userRow['file']?> class="" alt="<?php echo $userRow['name']?>">
        <h6 style="text-align: center;">Update profile picture...</h6>
        <input type="file" name="file" id="file" class="text-center center-block file-upload" accept="image/*">
      </div></hr><br>
                              <div class="form-group row">
                                <div class="offset-4 col-6">
                                  <button name="btn-submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>
            
            </div>
          </div>
        </div>
      </section>
    
      
      <!-- Social section -->
      <section id="social" class="parallax">
        <div class="overlay">
          <div class="container">
            <div class="row">
            
              <div class="sec-title text-center white wow animated fadeInDown">
                <h2>FOLLOW US</h2>
                <p>Beautifully simple follow buttons to help you get followers on</p>
              </div>
              
              <ul class="social-button">
                <li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-2x"></i></a></li>
                <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>             
              </ul>
              
            </div>
          </div>
        </div>
      </section>
    
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