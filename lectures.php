<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Universities</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>  Lecture Koi  </span>
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

				<div class="menu_copyright menu_mm">All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/high-tech.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Lectures</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Popular Universities</h1>

					</div>
				</div>
			</div>

			<div class="row course_boxes">
				
				<!-- Popular Universities  -->
				<div class="col-lg-4 course_box">
					<div class="card">

						<!-- all the images must be 690 X 520 resolution -->


						<img class="card-img-top" src="images/varsity/aust.jpg" alt="" >
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=aust">AUST</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Rain <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/Buet.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=buet">BUET</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name"> Tawkat <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/CUET.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=cuet">CUET</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Nishan Paul <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/kuet.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=kuet">KUET</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Abrar <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/JU.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=ju">Jahangirnagar University</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name"> Joy <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/DU.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=du">Dhaka University</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Ifti Aunim <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/DMC.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=dmc">Dhaka Medical</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Anwar Islam <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>


				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/ruet.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=ruet">RUET</a></div>
						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name">Arnab <span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
						</div>
					</div>
				</div>

				<!-- Popular Course Item -->
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="images/varsity/SUST.jpg" alt="">
						<div class="card-body text-center">
							<div class="card-title"><a href="lectures_department.php?varsity_name=sust">SUST</a></div>

						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
								<img src="images/author.jpg" alt="">
							</div>
							<div class="course_author_name"> shakil chowdhury<span>Author</span></div>
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span></span></div>
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
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>

<!-- <script src="js/courses_custom.js"></script> -->

</body>
</html>