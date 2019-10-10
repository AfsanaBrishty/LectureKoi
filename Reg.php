<?php
  session_start();
  /*Connect To Database*/
  $db=mysqli_connect("localhost","root","","lecturekoi");
  if(isset($_POST['reg']))
  {
	  //session_start();
	  $name=mysqli_real_escape_string($db,$_POST['name']);
	  $stuid=mysqli_real_escape_string($db,$_POST['stuid']);
	  $email=mysqli_real_escape_string($db,$_POST['email']);
	  $uniname=mysqli_real_escape_string($db,$_POST['uniname']);
	  $department=mysqli_real_escape_string($db,$_POST['department']);
	  $pass=mysqli_real_escape_string($db,$_POST['pass']);
	  $cpass=mysqli_real_escape_string($db,$_POST['cpass']);
	  if($pass==$cpass)
	  {
		  $pass=md5($pass);
		  $sql="INSERT INTO users(UserName,StudentID,Email,UniversityName,Department,Password,Status) VALUES('$name','$stuid','$email','$uniname','$department','$pass',0)";
	      mysqli_query($db,$sql);
		  $_SESSION['message']="You are logged in";
		  $_SESSION['name']=$name;
		  header("location: Home.php");
	  }else
	  {
		  $_SESSION['message']="The two passwords do not match";
	  }
  }
  if(isset($_POST['back']))
  {
    header("location: Login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/Reg.css"/>
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
       <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="card" style="margin-top:1%">
              <div class="card-title">
			     <div>
				 <center> 
                     <a href="#"><div class="btn btn-primary">Sign up</div></a>
					 <a href="Login.php"><input class="btn btn-default" name="back" type="submit" id="button" value="Sign in"></input></a>
                 </center> 
				 </div>
                <h1 class="text-center py-2">Sign up for free</h1>
                <hr>
                <div>
                  <div class="card-body" style="margin-top:1%">
                    <form action ="Reg.php" method="POST">
					  
                       
						 <input type="text" class="form-control" name="name"  id="form" placeholder="Enter your name" required></input>
						 <input type="text" class="form-control" name="stuid"  id="form" placeholder="Enter your student ID" required></input>
                         <input type="text" class="form-control" name="email"  id="form" placeholder="Enter your email"required></input>
						 <input type="text" class="form-control" name="uniname"  id="form" placeholder="Enter your University name"required></input>
						 <input type="text" class="form-control" name="department"  id="form" placeholder="Enter your department name"required></input>
						 <input type="password" class="form-control" name="pass" id="form" placeholder="Enter your password" required></input>
						 <input type="password" class="form-control" name="cpass" id="form" placeholder="Confirm your password" required></input>
						 <center>
						 <input class="btn btn-info" name="reg" type="submit" id="button" value="Sign up now!"></input>
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