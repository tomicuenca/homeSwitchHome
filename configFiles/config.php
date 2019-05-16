<?php

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "MyKey";
$DB_DATABASE = "homeSwitchdb";
$dbConnect = mysqli_connect($DB_SERVER, 
							$DB_USERNAME, 
							$DB_PASSWORD, 
							$DB_DATABASE);

/*function check_connection($db) {
	if (!$db) {
		die("Connection failed: ".mysqli_connect_error());
	}
	else
		echo "Connection done!";
}
*/
?>