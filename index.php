<?php

session_start();
include ("custom_functions.php");

$con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

        // The nested array to hold all the arrays
        $recently_added_lecture_item = [];

        $sql="SELECT varsity_name,department,semester,session FROM lectureupload ";

        if ($result=mysqli_query($con,$sql))
        {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result))
            {
                // printf ("%s (%s)\n",$row[0],$row[1]);
                $recently_added_lecture_item[]=$row;
            }
            // Free result set
            mysqli_free_result($result);
        }

        mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>LectureKoi</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>


        /*Now the styles*/
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background: #ccc;
            font-family: arial, verdana, tahoma;
        }

        /*Time to apply widths for accordian to work
        Width of image = 640px
        total images = 5
        so width of hovered image = 640px
        width of un-hovered image = 40px - you can set this to anything
        so total container width = 640 + 40*4 = 800px;
        default width = 800/5 = 160px;
        */

        .accordian {
            width: 805px; height: 320px;
            overflow: hidden;

            /*Time for some styling*/
            margin: 100px auto;
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
            -webkit-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
            -moz-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
        }

        /*A small hack to prevent flickering on some browsers*/
        .accordian ul {
            width: 1200px;
            /*This will give ample space to the last item to move
            instead of falling down/flickering during hovers.*/
        }

        .accordian li {
            position: relative;
            display: block;
            width: 160px;
            float: left;

            border-left: 1px solid #888;

            box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
            -moz-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);

            /*Transitions to give animation effect*/
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            /*If you hover on the images now you should be able to
            see the basic accordian*/
        }

        /*Reduce with of un-hovered elements*/
        .accordian ul:hover li {width: 40px;}
        /*Lets apply hover effects now*/
        /*The LI hover style should override the UL hover style*/
        .accordian ul li:hover {width: 640px;}


        .accordian li img {
            display: block;
            z-index: 0;
        }

        /*Image title styles*/
        .image_title {
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            left: 0; bottom: 0;
            width: 640px;
            z-index: 9;
        }
        .image_title h2,h3,h4,h5,h6 {
            display: block;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>

</head>
<body>

<div class="super_container" style="background-color: white">

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
		<!--these icons will be shown in smaller devices  -->
		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="main_nav_item"><a href="index.php">home</a></li>
					<li class="main_nav_item"><a href="contributors.php">about us</a></li>
					<li class="main_nav_item"><a href="lectures.php">lectures</a></li>
					<li class="main_nav_item"><a href="contact.php">contact</a></li>
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
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>

					</ul>
				</div>

				<div class="menu_copyright menu_mm"> All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/high-tech.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/high-tech_1.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/high-tech_2.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
						</div>
					</div>
				</div>



			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">


              <a href="lecture_upload.php" >
				<div class="col-lg-6 hero_box_col">

						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/university.png"  alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Upload the lectures</h2>
								<a href="lecture_upload.php" class="hero_box_link">view more</a>
							</div>
						</div>

				</div>
              </a>


               <a href="contributors.php" >
					<div class="col-lg-6 hero_box_col">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/professor.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Our Contributors</h2>
								<a href="contributors.php" class="hero_box_link">view more</a>
							</div>
						</div>
					</div>
               </a>



				</div>
			</div>
		</div>
	</div>

	<!-- Recently added lectures -->


    <div class="section_title text-center" style="background-color: white">
        <h1>Recently Added Lectures </h1>

        <!-- We will make a simple accordian with hover effects
        The markup will have a list with images and the titles-->
        <div class="accordian">
            <ul>

                <?php
                foreach ($recently_added_lecture_item as  $value) :
                    $sem=codeToSemester($value[2]);
                    $ses=codeToSession($value[3]);
                    ?>
                    <li>
                        <div class="image_title">

                            <h2><?php echo ucfirst($value[0]) ?></h2>
                            <h4><?php echo ucfirst($value[1]) ?></h4>
                            <h5><?php echo "Semester: ". $sem ?></h5>
                            <h6><?php echo "Session: ". $ses ?></h6>
                        </div>
                        <div style="width: 850px;height: 320px">
                            <img src="<?php echo getvarsityImagePath($value[0]) ?> " alt=""/>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

    </div>





    <!-- Services -->

	<div class="services page_section" style="background-image: url(images/backgroundimage1.jpg); background-repeat: no-repeat; background-size: cover;z-index: 1; margin-bottom: 100px ;">
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Our Services</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start p-2" style="background-color: rgba(245, 245, 245, 0.1) !important;">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/books.svg" alt="">
					</div>
					<h3>Amazing Library</h3>
					<p>Here You can find the class lectures,Assignments,quiz questions & solutions,semester final questions & solutions (PDF/Images/doc)
						and their corresponding video lectures(if possible). </p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start p-2"  style="background-color: rgba(245, 245, 245, 0.1) !important;">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/earth-globe.svg" alt="">
					</div>
					<h3>Crowd Sourcing</h3>
					<p>Any students of Universities can collaborate with us by signing up and upload their lecture/ video contents. </p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start p-2" style="background-color: rgba(245, 245, 245, 0.1) !important;">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/exam.svg" alt="">
					</div>
					<h3>Online Courses</h3>
					<p>This section is not activated yet.But in future we will have amazing tutorials on the lectures</p>
				</div>

			</div>
		</div>
	</div>




	<!-- Testimonials -->

	<div class="testimonials page_section">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/testimonials_background.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>What our students say</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							
							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">empor nermentum.</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/testimonials_user.jpg" alt="">
										</div>
										<div class="testimonial_name">james cooper</div>
										<div class="testimonial_title">Graduate Student</div>
									</div>
								</div>
							</div>

                            <!-- Testimonials Item -->
                            <div class="owl-item">
                                <div class="testimonials_item text-center">
                                    <div class="quote">“</div>
                                    <p class="testimonials_text">empor nermentum.</p>
                                    <div class="testimonial_user">
                                        <div class="testimonial_image mx-auto">
                                            <img src="images/testimonials_user.jpg" alt="">
                                        </div>
                                        <div class="testimonial_name">james cooper</div>
                                        <div class="testimonial_title">Graduate Student</div>
                                    </div>
                                </div>
                            </div>




						</div>

					</div>
				</div>
			</div>

		</div>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>