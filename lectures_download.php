<?php
        session_start();
        $varsity_name = $_GET["varsity_name"];
        $dept_name = $_GET["dept_name"];
        $semester = $_GET["semester"];



        $session_list = array("spring 17"=>"1701", "fall 17"=>"1702", "spring 18"=>"1801","fall 18"=>"1802","spring 19"=>"1901","fall 19"=>"1902",
                        "spring 20"=>"2001","fall 20"=>"2002");


        function fetch_download_info($x_value)
        {
            global $varsity_name,$dept_name,$semester;

            $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

            // The nested array to hold all the arrays
            $lectures_holder = [];


            $sql = "SELECT department,fileurl,video_url,message FROM lectureupload WHERE session='".$x_value."' AND varsity_name='".$varsity_name."' 
                    AND department='".$dept_name."' AND semester='".$semester."' ";

            if ($result=mysqli_query($con,$sql))
            {
                // Fetch one and one row
                while ($row=mysqli_fetch_row($result))
                {
                    // printf ("%s (%s)\n",$row[0],$row[1]);
                    $lectures_holder=$row;
                }
                // Free result set
                mysqli_free_result($result);
            }
            mysqli_close($con);


            return $lectures_holder;
        }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>LectureKoi-Lectures</title>
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
            <h1>Sessions</h1>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Download the lectures from google drive link</h1>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 hero_box_col">

                <?php
                foreach($session_list as $x => $x_value) {

                    $lectures_holder = fetch_download_info($x_value);

                        ?>
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="images/university.png" alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title"> <?php echo $x; ?> </h2>
                                <div>
                                        <?php  if (!empty($lectures_holder)) {
                                            $lec_link = $lectures_holder[1];
                                            $video_link = $lectures_holder[2];
                                                ?>
                                             <a href="<?php echo $lec_link ?>"><?php echo "Department: ". $lectures_holder[0] ?></a><br>
                                            <a href="<?php echo $lec_link ?>">Lecture Link </a>
                                            <?php  if (!empty($video_link)) { ?>
                                            <a href="<?php echo  $video_link ?>">Video Link</a>
                                            <?php } ?>
                                            <?php  if (!empty( $lectures_holder[3])) { ?>
                                            <p><?php echo $lectures_holder[3] ?></p>
                                            <?php } ?>

                                            <?php }?>
                                </div>
                            </div>
                        </div>


                    <?php }
                    ?>





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

</body>
</html>