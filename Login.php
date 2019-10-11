<?php
	$error='';
  session_start();
  /*Connect To Database*/
  $db=mysqli_connect("localhost","root","","lecturekoi");
  if(isset($_POST['login']))
  {
	  //session_start();
	  $email=mysqli_real_escape_string($db,$_POST['email']);
	  $pass=mysqli_real_escape_string($db,$_POST['pass']);
	  
	  $pass=md5($pass);
	  $sql="SELECT * FROM users WHERE Email='$email' AND Password='$pass'";
	  $result=mysqli_query($db,$sql);
	  
	  if(mysqli_num_rows($result) ==1 )
	  {
		  $_SESSION['message']="You are now logged in";
		  $_SESSION['email']=$email;
		  $_SESSION['loggedIn']=true;
		  header("location: index.php");
	  }else
	  {
		  $_SESSION['message']="Incorrect email or password";
		  $error="Incorrect email or password";
	  }
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="styles/Login.css"/>



    <!-- for nav -->

    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body class="SignIn_background">
<?php
    if(isset($_SESSION['message']))
    {
        echo "<div>" .$_SESSION['message']. "</div>";
        unset($_SESSION['message']);
    }
?>
<div class="container">

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
                        <li class="main_nav_item"><a href="Login.php">Sign In</a></li>
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
                    <li class="main_nav_item"><a href="Login.php">Sign In</a></li>
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



       <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="card" style="margin-top: 15%">
              <div class="card-title">
			     <div>
				 <center> 
					 <a href="Reg.php"><input class="btn btn-primary" name="registration" type="submit" id="button" value="Sign up"></a>
					 <a href="Login.php"><input class="btn btn-default" name="back" type="submit" id="button" value="Sign in"></a>
                 </center> 
				 </div>
                <h1 class="text-center py-2">Sign In</h1>
                <hr>
                <div>
                  <div class="card-body" style="margin-top:1%">
				  <?php echo $error ?>
                    <form action ="" method="POST" enctype="multipart/form-data">
					
					     <input type="text" class="form-control" name="email" type="text" id="form" placeholder="Enter your email" required>
						 <input type="password" class="form-control" name="pass" type="password" id="form" placeholder="Enter your password" required>
						 <center>
						 <input class="btn btn-info" name="login" type="submit" id="button" value="Log-In">
						 </center>
						 </form>

                  </div>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>