<?php

$access_code = "123456";
$input_code = "";
$error_input = "";

//Deletes unnecesary chars (/, \n).
function test_input($input_str){
	$input_str = trim($input_str);
	$input_str = stripslashes($input_str);
	$input_str = htmlspecialchars($input_str);
	return $input_str;
}

function validate_code($input, $access) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST['code'])) {
			$input = test_input($_POST['code']);
			if ($input == $access)
				return 1;
			else 
				return 0;
		}
		else
			return 0;
	}
}

if (validate_code($input_code, $access_code))
	header('Location: welcome.php');


?>