<?php

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "MyKey";
$DB_DATABASE = "db1";
$dbConnect = mysqli_connect($DB_SERVER, 
							$DB_USERNAME, 
							$DB_PASSWORD, 
							$DB_DATABASE);
function check_connection($db) {
	if (!$db) {
		die("Connection failed: ".mysqli_connect_error());
	}
	else
		echo "Connection done!";
}
check_connection($dbConnect);
$mySql = "CREATE TABLE Hotel (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	province VARCHAR(30) NOT NULL,
	city VARCHAR(30) NOT NULL,
	address VARCHAR(30) NOT NULL,
	description VARCHAR(50),
	photo VARCHAR(100)
	reg_date TIMESTAMP
)"

?>