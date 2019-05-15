<?php

include 'testing.php';
include 'uploadHotelImage.php';

$input_data = $error_fields =
	array('hotelname' => '',
	 	  'hotellocation' => '', 
	 	  'hoteladdress' => '', 
	 	  'hoteldescription' => '',
	 	  'hotelimage');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['hotelname']))
		$error_fields['hotelname'] = 'Name is Required!';
	else {
		$input_data['hotelname'] = test_input($_POST['hotelname']);
		if (!preg_match("/^[a-zA-Z ]*$/", $input_data['hotelname']))
			$error_fields['hotelname'] = 'Only letters and white space allowed!';
	}
	if (empty($_POST['hotellocation']))
		$error_fields['hotellocation'] = 'Location is Required!';
	else {
			/*$input_data['hotellocation'] = test_input($_POST['hotellocation']);
			if (!filter_var($input_data['email'], FILTER_VALIDATE_EMAIL))
				$error_fields['email'] = 'Invalid email format!';
				*/
	}
	if (empty($_POST['hoteladdress'])) {
		$error_fields['hoteladdress'] = 'Address is Required!';
	}
	else {
		$input_data['hoteladdress'] = test_input($_POST['hoteladdress']);
		if (!preg_match("/^[a-zA-Z ]*$/", 
				$input_data['hoteladdress']))
			$error_fields['hoteladdress'] = 'Invalid address!';
	}
	if (!empty($_POST['hoteldescription']))
		$input_data['hoteldescription'] = test_input($_POST['hoteldescription']);
	if (isset($_POST['hotelimage'])) {
		if (full_image_validation())
			$input_data['hotelimage'] = $_POST['submit'];
		else
			$error_fields['hotelimage'] = 'Image couldnt be uploaded.';
	}
}

//var_dump($input_data);
if (no_errors($error_fields)) {
	//header("Location: viewHotel.php");
}

?>