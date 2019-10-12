<?php
   session_start();
   session_destroy();
   unset($_SESSION['loggedIn']);
   unset($_SESSION['email']);
   unset($_SESSION['password']);

$_SESSION['message']="You are now logged out";
   header("location: Login.php");


   ?>
