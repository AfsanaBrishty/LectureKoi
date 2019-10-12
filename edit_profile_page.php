<?php
session_start();

    $label='';
    if(isset($_GET['edit_username']))
    {
        $label='Username';
    }
    if(isset($_GET['edit_id']))
    {
        $label='StudentId';
    }
    if(isset($_GET['edit_email']))
    {
        $label='Email';
    }
    if(isset($_GET['edit_varsity']))
    {
        $label='UniversityName';
    }
    if(isset($_GET['edit_dept']))
    {
        $label='Department';
    }
    if(isset($_GET['edit_pass']))
    {
        $label='Password';
    }
    $column_name=strtolower($label);

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
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">


    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .profile label{
            color: white;
        }

    </style>
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
                        $email=$_SESSION['email'];


                        ?>

                        <p style="color: black"><i> <?php echo $email ?></i> </p>


                        <?php
                    } ?>
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
            <h1>Lecture Upload </h1>
        </div>
    </div>

    <?php

    if(isset($_SESSION['loggedIn']))
    {
        ?>


        <!-- Form of uploading lectures  -->
        <div class="container-fluid" style="background-image: url(images/backgroundimage1.jpg); background-size: cover" >
            <h1 class="text-center" style="color: crimson">User Profile </h1>
            <br />
            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="d-inline-flex p-2 col-md-6" style="background-color: rgba(245, 245, 245, 0.1) !important;">

                    <div  style="margin:0 auto; float:none;">

                        <form action ="" method="POST" enctype="multipart/form-data">

                            <!--Change Field-->
                            <div class="form-group">
                                <label><?php echo $label ?></label>
                                <input type="text" name="edit_field" class="form-control" />
                                <div class="d-flex flex-row align-items-center pt-2">
                                    <input type="submit" name="change" class="btn btn-dark" value="Save Change" />
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


                <div class="col-md-3">

                </div>
            </div>
        </div>

    <?php }
    else
    {
        ?>
        <div class="container-fluid" style="height: 200px">
            <h1 class="text-center text-danger"> Please Log In to View your information</h1>

        </div>

        <?php
    }
    ?>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>


<!--<script src="js/custom.js"></script>-->



</body>
</html>
<?php
include ("custom_functions.php");

    if(isset($_POST['change']))
    {
        $value=$_POST['edit_field'];

        $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

        if(!empty($value))
        {
            //echo $value."<br>";
            //echo $column_name."<br>";
            //echo $_SESSION['email'];

            $sql="UPDATE users SET ".$column_name." = '".$value."' WHERE email = '".$_SESSION['email']."' ";

            $result = mysqli_query($con, $sql);
            if ($result) {
                //$error="data inserted successfully";
                phpalert('Information changed successfully');
            } else {
                //$error="data insertion failed";
                 phpalert('Information change failed');
            }
        }
        mysqli_close($con);
    }


?>