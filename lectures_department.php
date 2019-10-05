<?php

include ("custom_functions.php");

setVarsityName($_GET['varsity_name']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>LectureKoi-Departments</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">


    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">


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
            </div>

            <!-- Main Navigation -->
            <nav class="main_nav_container">
                <div class="main_nav">
                    <ul class="main_nav_list">
                        <li class="main_nav_item"><a href="index.php">home</a></li>
                        <li class="main_nav_item"><a href="contributors.php">about us</a></li>
                        <li class="main_nav_item"><a href="lectures.php">lectures</a></li>
                        <li class="main_nav_item"><a href="#">Sign In</a></li>
                        <li class="main_nav_item"><a href="contact.php">contact</a></li>
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
                    <li class="main_nav_item"><a href="#">Sign In</a></li>
                    <li class="main_nav_item"><a href="contact.php">contact</a></li>
                </ul>

                <!-- Menu Social -->

                <div class="menu_social_container menu_mm">
                    <ul class="menu_social menu_mm">
                        <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
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
            <h1>Departments</h1>
        </div>
    </div>


    <!-- select department segment -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Select Department</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 hero_box_col">
                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <a href="lectures_semester.php?dept_name=cse" > <h2 class="hero_box_title">CSE</h2></a>
                    </div>
                </div>


                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <a href="lectures_semester.php?dept_name=eee" > <h2 class="hero_box_title">EEE</h2></a>

                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <a href="lectures_semester.php?dept_name=mechanical" > <h2 class="hero_box_title">Mechanical</h2></a>

                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <a href="lectures_semester.php?dept_name=civil" > <h2 class="hero_box_title">Civil</h2></a>

                    </div>
                </div>


                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <a href="lectures_semester.php?dept_name=ipe" > <h2 class="hero_box_title">IPE</h2></a>

                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <a href="lectures_semester.php?dept_name=textile" > <h2 class="hero_box_title">Textiles</h2></a>

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
                        <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
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
<script src="js/courses_custom.js"></script>
</body>
</html>