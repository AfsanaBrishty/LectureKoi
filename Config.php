<?php
/*
$host_name='localhost';
$name='root';
$pass='';
$db='lecturekoi';

$con=mysqli_connect($host_name,$name,$pass) or die('Database error !');
mysqli_select_db($con,$db);

?>
*/

 function phpalert($msg)
    {
        echo ' <script type="text/javascript">alert("'.$msg.' ")</script>';
    }

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lecturekoi');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
else {
    phpAlert(   "Connected"   );
}
?>