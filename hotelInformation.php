<?php

$hotel = array('name' => '',
			   'location' => '',
			   'address' => '',
			   'description' => '' );

function findHotelAtDB($id) {
	# code...
}

function initialize_dummy_hotel() {
	$newHotel['name'] = 'Grand Hotel';
	$newHotel['location'] = 'Earth, La Palta';
	$newHotel['address'] = '20, e/ 22 y 23';
	$newHotel['description'] = 'This is a test.';
	return $newHotel;
}

?>