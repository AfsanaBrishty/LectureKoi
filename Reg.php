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
<html>
<head>
<title>Registration</title>
<h1>Register Now!!</h1>
</head>
<body>
<?php
  if(isset($_SESSION['message']))
  {
	  echo "<div>" .$_SESSION['message']. "</div>";
	  unset($_SESSION['message']);
  }
?>
  <form action="Reg.php" method="POST">
   <label>User Name</label>
   <br>
   <input name="name" type="text" id="form" placeholder="Enter your name" required></input>
   <br>
   <label>Student ID</label>
   <br>
   <input name="stuid" type="text" id="form" placeholder="Enter your student ID" required></input>
   <br>
   <label>Email</label>
   <br>
   <input name="email" type="text" id="form" placeholder="Enter your email"required></input>
   <br>
   <label>University Name</label>
   <br>
   <input name="uniname" type="text" id="form" placeholder="Enter your University name"required></input>
   <br>
   <label>Department</label>
   <br>
   <input name="department" type="text" id="form" placeholder="Enter your department name"required></input>
   <br>
   <label>Password</label>
   <br>
   <input name="pass" type="password" id="form" placeholder="Enter your password" required></input>
   <br>
   <label>Confirm Password</label>
   <br>
   <input name="cpass" type="password" id="form" placeholder="Confirm your password" required></input>
   <br>
   <br>
   <input name="reg" type="submit" id="button" value="Sign-Up"></input>
   <br>
   <br>
   </form>
   <a href="Login.php"><input name="back" type="submit" id="button" value="Back to Log-in"></input>
</body>
</html>
