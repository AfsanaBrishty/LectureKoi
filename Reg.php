<?php
 include 'Config.php';
if(isset($_POST["back"]))
 {
	 header('Location:Login.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<h1>Register Now!!</h1>
</head>
<body>
  <form action="Reg.php" method="POST">
   <label>User Name</label>
   <br>
   <input name="name" type="text" id="form" placeholder="Enter your name"></input>
   <br>
   <label>Student ID</label>
   <br>
   <input name="stuid" type="text" id="form" placeholder="Enter your student ID"></input>
   <br>
   <label>Email</label>
   <br>
   <input name="email" type="text" id="form" placeholder="Enter your email"></input>
   <br>
   <label>University Name</label>
   <br>
   <input name="uniname" type="text" id="form" placeholder="Enter your University name"></input>
   <br>
   <label>Department</label>
   <br>
   <input name="department" type="text" id="form" placeholder="Enter your department name"></input>
   <br>
   <label>Password</label>
   <br>
   <input name="pass" type="password" id="form" placeholder="Enter your password"></input>
   <br>
   <label>Confirm Password</label>
   <br>
   <input name="cpass" type="password" id="form" placeholder="Confirm your password"></input>
   <br>
   <br>
   <input name="reg" type="submit" id="button" value="Sign-Up"></input>
   <br>
   <br>
   <a href="Login.php"><input name="back" type="submit" id="button" value="Back to Log-in"></input>
   </form>
   
<?php
   if(isset($_POST['reg']))
   {
	      $con=mysqli_connect("localhost","root","","lecturekoi") or die("Unable to connect Database");
		  
	   $name=$_POST['name'];
	   $stuid=$_POST['stuid'];
	   $email=$_POST['email'];
	   $uniname=$_POST['uniname'];
	   $department=$_POST['department'];
	   $pass=$_POST['pass'];
	   $cpass=$_POST['cpass'];
	   
	   if($pass==$cpass)
	   {
		 $query="Select * From users where email='".$email."'";  
		 $query_check=mysqli_query($con,$query);
		 
		 if($query_check)
		 {
			 if(mysqli_num_rows($query_check)>0)
			 {
				 echo"
				 <script>
				  alert('Email Already In Use');
				  window.location.href='Login.php';
				 </script>
				 ";
			 }else{
				 $insertion="insert into users(UserName,StudentID,UniversityName,Department,Password,Status) values('$name','$stuid','$email','$uniname','$department','$pass',0)";
				 $run=mysqli_query($con,$insertion);
				 if($run)
				 {
					 echo"
				     <script>
				     alert('You are successfully Registered');
				     window.location.href='Home.php';
				     </script>
				     ";
				 }else{
					 echo"
				     <script>
				     alert('Connection Failed');
				     window.location.href='Reg.php';
				     </script>
				     ";
				 }
			 }
			 
		 }else{
			         echo"
				     <script>
				     alert('Database Error');
				     window.location.href='Reg.php';
				     </script>
				     ";
		 }
		 
	   }else{
		             echo"
				     <script>
				     alert('Password & Confirm Password doesn't match');
				     window.location.href='Reg.php';
				     </script>
				     ";  
	   }
   }else
   {
   }
?>   
</body>
</html>
