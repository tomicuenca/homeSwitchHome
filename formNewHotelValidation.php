<?php
include 'configFiles/cacheClearing.php';
include 'testing.php';
include 'hotelInformation.php';
include 'uploadHotelImage.php';

$input_data = $error_fields =
	array('hotelcode' => '',
		  'hotelname' => '',
	 	  'hotelprovince' => '',
	 	  'hotelcity' => '',
	 	  'hotelnumberaddr' => '', 
	 	  'hoteladdress' => '', 
	 	  'hoteldescription' => '',
	 	  'hotelimage');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['hotelcode']))
		$error_fields['hotelcode'] = 'Code is Required!';
	else {
		$input_data['hotelcode'] = test_input($_POST['hotelcode']);
		if (!preg_match("/^[0-9 ]*$/", $input_data['hotelcode']))
			$error_fields['hotelcode'] = 'Only digits allowed for code!';
		else
			if (hotel_id_inDB($input_data['hotelcode']))
				$error_fields['hotelcode'] = 'Hotel id already exists!';
	}
	if (empty($_POST['hotelname']))
		$error_fields['hotelname'] = 'Name is Required!';
	else {
		$input_data['hotelname']= test_input($_POST['hotelname']);
		if (!preg_match("/^[a-zA-Z ]*$/", $input_data['hotelname']))
			$error_fields['hotelname'] = 'Only letters and white space allowed!';	
	}
	if (empty($_POST['hotelprovince']))
		$error_fields['hotelprovince'] = 'Province/State is Required!';
	else
		$input_data['hotelprovince'] = test_input($_POST['hotelprovince']);
	if (empty($_POST['hotelcity']))
		$error_fields['hotelcity'] = 'City is Required!';
	else
		$input_data['hotelcity'] = test_input($_POST['hotelcity']);
	if (!empty($_POST['hoteladdress']) && !empty($_POST['hotelnumberaddr'])){
		$input_data['hoteladdress'] = test_input($_POST['hoteladdress']);
		$input_data['hotelnumberaddr'] = 
				test_input($_POST['hotelnumberaddr']);
		if (!preg_match("/^[0-9]*$/", 
				$input_data['hotelnumberaddr']))
			$error_fields['hotelnumberaddr'] = 'Invalid number address!';
	}
	else
		$error_fields['hoteladdress'] = 'Full address is Required!';
	if (!empty($_POST['hoteldescription']))
		$input_data['hoteldescription'] = test_input($_POST['hoteldescription']);
	if (isset($_POST['hotelimage'])) {
		if (full_image_validation())
			$input_data['hotelimage'] = get_file_to_upload();
		else
			$error_fields['hotelimage'] = 'Image couldnt be uploaded.';
	}
	if (no_errors($error_fields)) {
		save_hotel($input_data);
		echo "Successfully added new hotel!";
		//header("Location: viewHotel.php");
	}
}

?>