<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LectureKoi-Semester</title>
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
            <h1>Semester</h1>
        </div>
    </div>



    <!-- select semester -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Select Semester</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 hero_box_col">
                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <?php $link = "lectures_download.php?semester=1 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">1st year 2nd semester</h2></a>                    </div>
                </div>


                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <?php $link = "lectures_download.php?semester=2 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">1st year 2nd semester</h2></a>
                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <?php $link = "lectures_download.php?semester=3 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">2nd year 1st semester</h2></a>
                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">
                        <?php $link = "lectures_download.php?semester=4 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">2nd year 2nd semester</h2></a>
                    </div>
                </div>


                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <?php $link = "lectures_download.php?semester=5 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">3rd year 1st semester</h2></a>
                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <?php $link = "lectures_download.php?semester=6 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">3rd year 2nd semester</h2></a>
                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <?php $link = "lectures_download.php?semester=7 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">4 th year 1st semester</h2></a>
                    </div>
                </div>

                <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                    <img src="images/university.png"  alt="">
                    <div class="hero_box_content">

                        <?php $link = "lectures_download.php?semester=8 & dept_name=".$_GET["dept_name"]." & varsity_name=".$_GET["varsity_name"]; ?>
                        <a href="<?php echo $link; ?>" > <h2 class="hero_box_title">4 th year 2nd semester</h2></a>
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