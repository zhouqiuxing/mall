<?php 

//update your database connection details here
$hostname = "localhost";
$dbuser = "zhangyanxi";
$dbpass = "yanxi312";
$dbname = "demo_cart_db";
	
$con = new mysqli($hostname, $dbuser, $dbpass, $dbname);

if($con->connect_error){
die("Error connrrr55ect to db");
}

?>
