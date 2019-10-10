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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/Login.css"/>
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
            <div class="card" style="margin-top: 15%">
              <div class="card-title">
			     <div>
				 <center> 
					 <a href="Reg.php"><input class="btn btn-primary" name="registration" type="submit" id="button" value="Sign up"></input></a>
					 <a href="Login.php"><input class="btn btn-default" name="back" type="submit" id="button" value="Sign in"></input></a>
                 </center> 
				 </div>
                <h1 class="text-center py-2">Sign up for free</h1>
                <hr>
                <div>
                  <div class="card-body" style="margin-top:1%">
                    <form action ="" method="POST" enctype="multipart/form-data">
					
					     <input type="text" class="form-control" name="email" type="text" id="form" placeholder="Enter your email" required></input>
						 <input type="password" class="form-control" name="pass" type="password" id="form" placeholder="Enter your password" required></input>
						 <center>
						 <input class="btn btn-info" name="login" type="submit" id="button" value="Log-In"></input>
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