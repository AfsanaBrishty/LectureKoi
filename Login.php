<?php
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
		  $_SESSION['name']=$name;
		  header("location: Home.php");
	  }else
	  {
		  $_SESSION['message']="Incorrect email or password";
	  }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<h1>Log-In</h1>
</head>
<body>
<?php
  if(isset($_SESSION['message']))
  {
	  echo "<div>" .$_SESSION['message']. "</div>";
	  unset($_SESSION['message']);
  }
?>
  <form action="Login.php" method="POST">
   <label>Email</label>
   <br>
   <input name="email" type="text" id="form" placeholder="Enter your email" required></input>
   <br>
   <label>Password</label>
   <br>
   <input name="pass" type="password" id="form" placeholder="Enter your password" required></input>
   <br>
   <br>
   <input name="login" type="submit" id="button" value="Log-In"></input>
   <br>
   <br>
   </form>
   <a href="Reg.php"><input name="registration" type="submit" id="button" value="Registration"></input>
  

</body>
</html>
