<?php
include 'Config.php';



if(isset($_POST["registration"]))
 {
	 header('Location:Reg.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<h1>Log-In</h1>
</head>
<body>
  <form action="Login.php" method="POST">
   <label>Email</label>
   <br>
   <input name="email" type="text" id="form" placeholder="Enter your email"></input>
   <br>
   <label>Password</label>
   <br>
   <input name="pass" type="password" id="form" placeholder="Enter your password"></input>
   <br>
   <br>
   <input name="login" type="submit" id="button" value="Log-In"></input>
   <br>
   <br>
   <a href="Reg.php"><input name="registration" type="submit" id="button" value="Registration"></input>
   </form>
  

</body>
</html>
