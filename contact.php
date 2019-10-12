<?php
    session_start();
    include ("custom_functions.php");


    if(isset($_POST['submit']))
    {
        include ("config.php");

        $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");



        $name=$_POST['name'];
        $from=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];



        $query = "INSERT INTO contact_us(name,from_email,subject,message) 
                   VALUES ('$name','$from','$subject','$message')";
        $result = mysqli_query($con, $query);
        if ($result) {
           // $error="data inserted successfully";
            phpalert('Data inserted successfully');
        } else {
            //$error="data insertion failed";
            phpalert('Data insertion failed');

            unset($_POST['submit']);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>LectureKoi-Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<style>

    .map-container{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }
    .map-container iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
</style>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>LectureKoi</span>
				</div>
                <div>
                    <?php
                    if(isset($_SESSION['loggedIn'])) {
                        $email= $_SESSION['email'];

                        ?>

                        <b> <p style="color: black"><i> <?php echo $email ?></i> </p> </b>

                    <?php }?>
                </div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
                        <li class="main_nav_item"><a href="index.php">home</a></li>
                        <li class="main_nav_item"><a href="contributors.php">about us</a></li>
                        <li class="main_nav_item"><a href="lectures.php">lectures</a></li>
                        <li class="main_nav_item"><a href="contact.php">contact</a></li>
                        <li class="main_nav_item"><a href="profile_page.php">Profile</a></li>
                        <?php
                        if(!isset($_SESSION['loggedIn'])) { ?>
                            <li class="main_nav_item"><a href="Login.php">Sign In</a></li>
                        <?php }
                        else { ?>
                            <li class="main_nav_item"><a href="Logout.php">Log Out</a></li>

                        <?php } ?>

                    </ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="images/phone-call.svg" alt="">
			<span>+43 4566 7788 2457</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
                    <li class="main_nav_item"><a href="index.php">home</a></li>
                    <li class="main_nav_item"><a href="contributors.php">about us</a></li>
                    <li class="main_nav_item"><a href="lectures.php">lectures</a></li>
                    <li class="main_nav_item"><a href="contact.php">contact</a></li>
                    <li class="main_nav_item"><a href="profile_page.php">Profile</a></li>
                    <?php
                    if(!isset($_SESSION['loggedIn'])) { ?>
                        <li class="main_nav_item"><a href="Login.php">Sign In</a></li>
                    <?php }
                    else { ?>
                        <li class="main_nav_item"><a href="Logout.php">Log Out</a></li>

                    <?php } ?>

				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm"> All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Contact</h1>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					
					<!-- Contact Form -->
					<div class="contact_form">
						<div class="contact_title">Get in touch</div>

						<div class="contact_form_container">
							<form   action ="contact.php" method="POST" enctype="multipart/form-data">
								<input  class="input_field contact_form_name" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
								<input  class="input_field contact_form_email" type="email" name="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
                                <input  class="input_field contact_form_email" type="text" name="subject" placeholder="Subject" required="required" data-error="Valid subject is required.">
                                <textarea class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
								<input type="submit" name="submit" class="btn btn-primary" value="Submit" >
							</form>
						</div>
					</div>
						
				</div>

				<div class="col-lg-4">
					<div class="about">
						<div class="about_title">Contribute in LectureKoi</div>
						<p class="about_text"> If you face any problems downloading/uploading the lectures, have any suggestions to improve any of our
                                                systems you can contact us .</p>

						<div class="contact_info">
							<ul>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="images/placeholder.svg" alt="">
									</div>
									Niketon 205/4 Road no. 8 Block C
								</li>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									01535155114
								</li>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>sajidahmed696@gmail.com
								</li>
							</ul>
						</div>

					</div>
				</div>

			</div>


            <!--Google map-->
            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px;width: 100% ;">
                <iframe src="https://www.google.com/maps/@23.7733246,90.4068246,16z" frameborder="0"
                        style="border:0" allowfullscreen></iframe>
            </div>


	<!-- Footer -->

	<footer class="footer">
		<div class="container">

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span>
							Copyright @Sajid Ahmed
					</span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/contact_custom.js"></script>

</body>
</html>