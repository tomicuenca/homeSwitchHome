<?php

function no_errors($posibleErrors) {
	$error_collector = array(count($posibleErrors));
	$found = '';
	$i = 1;
	foreach ($posibleErrors as $key => $value)
		$error_collector[$i++] = $value;
	while($i < count($error_collector) && $found == '')
		$found = $error_collector[$i++];
	if ($found != '')
		return 0;
	return 1;
}

function isType($file_type, $current_type)	{
	return $file_type == $current_type;
}

function isValidImage($file, $type)	{
	switch ($file) {
		//Limits duplicates.
		case file_exists($file):
			echo "	> Sorry, file already exists.<br>";
			return 0;
		//Limits file size.
		case ($_FILES["fileToUpload"]["size"] > 500000):
			echo "	> Sorry, your file is too big.<br>";
			return 0;
		//Limits types.
		case (!isType($type,"jpg") && !isType($type,"png") && 
			  !isType($type,"jpeg") && !isType($type,"gif")):
			echo "	> Sorry, only JPG, JPEG, PNG, and GIF files allowed.<br>";
			return 0;
		case file_exists($file):
			echo "	> Sorry, file already exists.<br>";
			return 0;
	}
	return 1;
}

/* Deletes unnecesary chars(/, \n, \t) */
function test_input($input_str) {
	$input_str = trim($input_str);
	$input_str = stripslashes($input_str);
	$input_str = htmlspecialchars($input_str);
	return $input_str;
}

?>