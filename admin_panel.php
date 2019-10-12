
<?php
session_start();
$_SESSION['loggedIn']=true;
$_SESSION['email']="admin";

        include ("custom_functions.php");


        $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");

        // The nested array to hold all the arrays
        $the_big_array = [];
        $the_big_array1 = [];
        $big_contact_array=[];

        $sql="SELECT studentId,varsity_name,department,semester,session ,fileurl,video_url,message,status FROM lectureupload_crowd_source_system ";
        $sql_1="SELECT studentId,varsity_name,department,semester,session ,fileurl,video_url,message FROM lectureupload ";
        $sql_2="SELECT name,from_email,subject,message FROM contact_us";

        if ($result=mysqli_query($con,$sql))
        {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result))
            {
               // printf ("%s (%s)\n",$row[0],$row[1]);
                $the_big_array[]=$row;
            }
            // Free result set
            mysqli_free_result($result);
        }
        if ($result=mysqli_query($con,$sql_1))
        {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result))
            {
                // printf ("%s (%s)\n",$row[0],$row[1]);
                $the_big_array1[]=$row;
            }
            // Free result set
            mysqli_free_result($result);
        }
        if ($result=mysqli_query($con,$sql_2))
        {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($result))
            {
                // printf ("%s (%s)\n",$row[0],$row[1]);
                $big_contact_array[]=$row;
            }
            // Free result set
            mysqli_free_result($result);
        }
        mysqli_close($con);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LectureKoi-Admin</title>
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



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


    <style>


        #table1 th, td {
            white-space: nowrap;
        }
        #table2 th, td {
            white-space: nowrap;
        }
        #table3 th, td {
            white-space: nowrap;
        }
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;



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
            <h1> Requests</h1>
        </div>
    </div>


    <h1 class="text-center m-5 ">All Lecture Upload Requests </h1>
    <div class="table-responsive" style="height: 300px">
        <table id="table1" class="table table-dark table-striped table-bordered"  >
            <thead>
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Student Id</th>
                    <th scope="col">Varsity Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Session</th>
                    <th scope="col">FileUrl</th>
                    <th scope="col">Video Url</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            foreach ($the_big_array as  $value) :
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value[0]; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><?php echo $value[4]; ?></td>
                    <td><?php echo $value[5]; ?></td>
                    <td><?php echo $value[6]; ?></td>
                    <td><?php echo $value[7]; ?></td>
                    <td><?php echo $value[8]; ?></td>
                    <td>
                        <?php $link="approve.php?id=".$value[0]." & varsity_name=".$value[1]." & department=".$value[2]." & semester=".$value[3]." & session=".$value[4]." & fileurl=".$value[5]." & video_url=".$value[6]." & message=".$value[7]." & status=".$value[8]."" ?>
                        <button class="btn btn-dark"><a href="<?php echo $link ?>">Approve</a></button>
                    </td>

                </tr>
            <?php endforeach; ?>



            </tbody>
        </table>
    </div>



    <h1 class="text-center m-5 ">All Approved Lectures </h1>
    <div class="table-responsive" style="height: 300px">
        <table class="table table-dark table-striped table-bordered" id="table2">
            <thead>
            <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Student Id</th>
                <th scope="col">Varsity Name</th>
                <th scope="col">Department</th>
                <th scope="col">Semester</th>
                <th scope="col">Session</th>
                <th scope="col">FileUrl</th>
                <th scope="col">Video Url</th>
                <th scope="col">Message</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            foreach ($the_big_array1 as  $value) :
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value[0]; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>
                    <td><?php echo $value[4]; ?></td>
                    <td><?php echo $value[5]; ?></td>
                    <td><?php echo $value[6]; ?></td>
                    <td><?php echo $value[7]; ?></td>

                    <td>

                    </td>

                </tr>
            <?php endforeach; ?>



            </tbody>
        </table>
    </div>


    <h1 class="text-center m-5 ">All User Contact Information  </h1>
    <div class="table-responsive" style="height: 300px">
        <table class="table table-dark table-striped table-bordered" id="table3">
            <thead>
            <tr >
                <th scope="col">Serial No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>


            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            foreach ($big_contact_array as  $value) :
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value[0]; ?></td>
                    <td><?php echo $value[1]; ?></td>
                    <td><?php echo $value[2]; ?></td>
                    <td><?php echo $value[3]; ?></td>

                </tr>
            <?php endforeach; ?>



            </tbody>
        </table>
    </div>




    <!-- Footer -->

    <footer class="footer">
        <div class="container mt-5">

            <!-- Footer Copyright -->

            <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
                <div class="footer_copyright">
					<span style="color: aliceblue">
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- DataTables CSS -->
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- DataTables JS -->
<script href="js/addons/datatables.min.js" rel="stylesheet"></script>

<!-- DataTables Select CSS -->
<link href="css/addons/datatables-select.min.css" rel="stylesheet">
<!-- DataTables Select JS -->
<script href="js/addons/datatables-select.min.js" rel="stylesheet"></script>




<script>
/*
    $('#table1 tr').click(function() {

        $(this).toggleClass('selected');
        var row = [];
        $('.selected').each(function(i, v) {
            row.push($(v).text());
        })

        $('#selectedRows').val(row);
        //alert(row);
        //window.location.href = "admin_panel.php";


    });

    $('#table2 tr').click(function() {

        $(this).toggleClass('selected');
        var row = [];
        $('.selected').each(function(i, v) {
            row.push($(v).text());
        })

        $('#selectedRows').val(row);
//        alert(row);

    });
*/

    $(document).ready(function () {
        $('#table1').DataTable({
            "scrollX": true,
            "scrollY": true,
            "searching": true
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $(document).ready(function () {
        $('#table2').DataTable({
            "scrollX": true,
            "scrollY": true,
            "searching": true
        });
        $('.dataTables_length').addClass('bs-select');
    });

</script>
</body>
</html>



