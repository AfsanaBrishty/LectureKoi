<?php
session_start();
include ("custom_functions.php");

if (isset($_POST['submit'])) {
    //require ("config.php");
    $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

    $id = $_POST["id"];
    $varsity=$_POST["varsity_name"];
    $dept = $_POST["department"];
    $semester = $_POST["semester"];
    $session = $_POST["session"];
    $lecture_link = $_POST["lecture_link"];
    $video_link = $_POST["video_link"];
    $message = $_POST["message"];

    if(empty($id) || empty($dept) || empty($semester) || empty($session)  || empty($lecture_link) || empty($varsity)) {
        $error="Please fillup the necessary information";
    }


    //if admin insert the data then it will store info in 'lectureupload' table otherwise it will upload lecture
    // in 'crowd_sourcing _system' table
    if(strcmp($id,"1111")==0)
    {
        if(!empty($id) && !empty($varsity) && !empty($dept) && !empty($semester) && !empty($session) && !empty($lecture_link)) {
            $query = "INSERT INTO lectureupload(StudentId,varsity_name, department, semester, session, fileUrl,video_url,message) 
                        VALUES ('$id','$varsity','$dept','$semester','$session','$lecture_link','$video_link','$message')";
            $result = mysqli_query($con, $query);
            if ($result) {
                $error="data inserted successfully";
                //phpalert('Data inserted successfully');
            } else {
                $error="data insertion failed";
               // phpalert('Data insertion failed');
            }
        }
    }
    else
    {
        if(!empty($id) && !empty($varsity) && !empty($dept) && !empty($semester) && !empty($session) && !empty($lecture_link)) {
            $query = "INSERT INTO lectureupload_crowd_source_system(StudentId,varsity_name, department, semester, session, fileUrl,video_url,message,status) 
                        VALUES ('$id','$varsity','$dept','$semester','$session','$lecture_link','$video_link','$message',0)";

            $result = mysqli_query($con, $query);
            if ($result) {
                $error="data inserted successfully";
            } else {
                $error="data insertion failed";
            }
        }
    }

}
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
            <h1 class="text-center" style="color: crimson">Uploading lectures </h1>
            <br />
          <div class="row">
                  <div class="col-md-3">

                  </div>

                        <div class="d-inline-flex p-2 col-md-6" style="background-color: rgba(245, 245, 245, 0.1) !important;">

                                <div  style="margin:0 auto; float:none;">


                                    <form action ="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Enter Id</label>
                                            <input type="text" name="id" class="form-control" placeholder="Enter id" required="required" data-error="Please fillup this field" />
                                        </div>


                                        <div class="form-group">
                                            <label>Select University Name</label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="varsity_name">
                                                    <option value="null">Select University</option>
                                                    <option value="aust">AUST</option>
                                                    <option value="buet">BUET</option>
                                                    <option value="cuet">CUET</option>
                                                    <option value="kuet">KUET</option>
                                                    <option value="ruet">RUET</option>
                                                    <option value="sust">SUST</option>
                                                    <option value="du">DU</option>
                                                    <option value="ju">JU</option>
                                                    <option value="dmc">DMC</option>

                                                </select>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label>Select Department</label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="department">
                                                    <option value="null">Select department</option>
                                                    <option value="cse">CSE</option>
                                                    <option value="eee">EEE</option>
                                                    <option value="ipe">IPE</option>
                                                    <option value="me">Mechanical</option>
                                                    <option value="te">Textile</option>
                                                    <option value="ce">Civil</option>
                                                    <option value="bba">BBA</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Semester</label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="semester">
                                                    <option value="null">Select Semester</option>
                                                    <option value="1">1.1</option>
                                                    <option value="2">1.2</option>
                                                    <option value="3">2.1</option>
                                                    <option value="4">2.2</option>
                                                    <option value="5">3.1</option>
                                                    <option value="6">3.2</option>
                                                    <option value="7">4.1</option>
                                                    <option value="8">4.2</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Session</label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="session">
                                                    <option value="null">Select Session</option>
                                                    <option value="1801">Spring 18</option>
                                                    <option value="1802">Fall 18</option>
                                                    <option value="1901">Spring 19</option>
                                                    <option value="1902">Fall 19</option>
                                                    <option value="2001">Spring 20</option>
                                                    <option value="2002">Fall 20</option>
                                                    <option value="2101">Spring 21</option>
                                                    <option value="2102">Fall 21</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label >Lecture drive link</label>
                                            <textarea name="lecture_link" class="form-control" placeholder="Enter lecture drive link" required="required" data-error="Please fillup this field"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label >video tutorial regarding the lecture (Optional)</label>
                                            <textarea name="video_link" class="form-control" placeholder="Enter video link(if any) "></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label >Message</label>
                                            <textarea name="message" class="form-control" placeholder="Enter a message"></textarea>
                                        </div>



                                        <!--  <input type="file" name="file[]" id="fileToUpload" multiple>  -->

                                        <div class="form-group" align="center">
                                            <?php
                                                $error='';
                                                echo $error."</br>"
                                            ?>
                                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
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
                        <h1 class="text-center text-danger"> Please Log In to Upload the Lectures</h1>

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
<script src="js/custom.js"></script>

    </body>
</html>
