<?php
include ("custom_functions.php");
include ("config.php");

$con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

if (isset($_POST['submit'])) {

    $id = $_POST["id"];
    $dept = $_POST["department"];
    $semester = $_POST["semester"];
    $course = $_POST["course"];
    $theory_lab = $_POST["theory_lab"];
    $course_teacher_name = $_POST["course_teacher"];
    $lecture_link = $_POST["lecture_link"];
    $video_link = $_POST["video_link"];
    $message = $_POST["message"];

    /*
    echo "the Value selected is </br> ".$id ."</br>";
    echo "".$dept ."</br>";
    echo "".$semester ."</br>";
    echo "".$course ."</br>";
    echo "".$theory_lab ."</br>";
    echo "".$course_teacher_name."</br>";
    echo "".$lecture_link ."</br>";
    echo "".$video_link ."</br>";
    echo "".$message ."</br>";
*/



    echo $varsity_names['1'];


    //if admin insert the data then it will store info in 'lectureupload' table otherwise it will upload lecture
    // in 'crowd_sourcing _system' table
    if(strcmp($id,"1111"))
    {
        $query="INSERT INTO aust_lectureupload(StudentId, department, semester, theory_lab, course, fileUrl,video_url, course_teacher,message) 
                VALUES ('$id','$dept','$semester','$theory_lab','$course','$lecture_link','$video_link','$course_teacher_name','$message')";
        $result=mysqli_query($con,$query);
        if($result)
        {
            phpalert('Data inserted successfully');
        }
        else{
            phpalert('Data insertion failed');
        }
    }
    else
    {
        $query="INSERT INTO aust_lectureupload_crowd_source_system(StudentId, department, semester, theory_lab, course, fileUrl,video_url, course_teacher,message) 
                VALUES ('$id','$dept','$semester','$theory_lab','$course','$lecture_link','$video_link','$course_teacher_name','$message')";
        $result=mysqli_query($con,$query);
        if($result)
        {
            phpalert('Data inserted successfully');
        }
        else{
            phpalert('Data insertion failed');
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
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="index.html">home</a></li>
                            <li class="main_nav_item"><a href="contributors.html">about us</a></li>
                            <li class="main_nav_item"><a href="lectures.html">lectures</a></li>
                            <li class="main_nav_item"><a href="#">Sign In</a></li>
                            <li class="main_nav_item"><a href="contact.html">contact</a></li>
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
                        <li class="main_nav_item"><a href="index.html">home</a></li>
                        <li class="main_nav_item"><a href="contributors.html">about us</a></li>
                        <li class="main_nav_item"><a href="lectures.html">lectures</a></li>
                        <li class="main_nav_item"><a href="#">Sign In</a></li>
                        <li class="main_nav_item"><a href="contact.html">contact</a></li>
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

        <h2 align="center"  >Uploading lectures </h2>
        <br />
        <!-- Form of uploading lectures  -->
        <div class="container-fluid" >
          <div class="row">
                  <div class="col-md-3">

                  </div>

                        <div class="d-inline-flex p-2 bg-dark col-md-6">

                                <div  style="margin:0 auto; float:none;">


                                    <form action ="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Enter Id</label>
                                            <input type="text" name="id" class="form-control" placeholder="Enter id" />
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
                                            <label>Select Course </label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="course">
                                                    <option value="null">Select Course</option>
                                                    <option value="C">C programming</option>
                                                    <option value="java">Java OOP</option>
                                                    <option value="DS">Data Structure</option>
                                                    <option value="algorithm">Algorithm</option>
                                                    <option value="java_sd">Java Software development</option>
                                                    <option value="android_sd">Android development</option>
                                                    <option value="mechanical_fundamental">Mechanical Fundamental</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Theory/Lab </label>
                                            <div class="dropdown" >

                                                <select class="form-control" name="theory_lab">
                                                    <option value="null">Theory/Lab</option>
                                                    <option value="theory">Theory</option>
                                                    <option value="lab">Lab</option>

                                                </select>

                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label>Enter Course Teacher</label>
                                            <input type="text" name="course_teacher" class="form-control" placeholder="Enter Course Teacher Name" value="" />
                                        </div>

                                        <div class="form-group">
                                            <label >Lecture drive link</label>
                                            <textarea name="lecture_link" class="form-control" placeholder="Enter lecture drive link"></textarea>
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
                                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                                        </div>

                                    </form>
                                </div>
                            </div>


              <div class="col-md-3">

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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

    </body>
</html>