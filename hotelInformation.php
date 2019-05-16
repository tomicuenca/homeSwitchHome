<?php

//Week type.
$week = array('startDate' => '' ,
			  'endDate' => '');
//Hotel type, with lots of possible weeks
$hotel = array('code' => '',
			   'name' => '',
			   'province' => '',
			   'city' => '',
			   'number' => '',
			   'address' => '',
			   'description' => '', 
			   'image',
			   'weeks');

function fetch_hotels_from_query($query) {
	$table = array('code' => '',
			   'name' => '',
			   'province' => '',
			   'city' => '',
			   'number' => '',
			   'address' => '',
			   'description' => '', 
			   'image',
			   'weeks');
	$i = 0;
	while ($row = mysqli_fetch_assoc($query)) {
		$table['code'] = $row['codigo'];
		$table['name'] = $row['titulo'];
		$table['province'] = $row['provincia'];
		$table['city'] = $row['ciudad'];
		$table['description'] = $row['descripcion'];
		$i++;
	}
	mysqli_close($dbConnect);
	return $table;
}

function search_hotel($name) {
	include 'configFiles/config.php';
	$query_sql = "SELECT * FROM hotel";
	$query_result = mysqli_query($dbConnect, $query_sql);
	mysqli_close($dbConnect);
	return $query_result;
}

function hotel_id_inDB($hotelId) {
	include 'configFiles/config.php';
	$query_sql = "SELECT hotel.codigo FROM hotel 
					WHERE '".$hotelId."' = hotel.codigo";
	$query_result = mysqli_query($dbConnect, $query_sql);
	if (mysqli_num_rows($query_result) > 0)
		return 1;
	else
		return 0;
	mysqli_close($dbConnect);
}

function save_hotel($input) {
	include 'configFiles/config.php';
	$sql = "INSERT INTO hotel(codigo, numero, calle, descripcion, titulo, provincia, ciudad, estrellas)
		VALUES ('".$input['hotelcode']."',
				'".$input['hotelnumberaddr']."',
				'".$input['hoteladdress']."', 
				'".$input['hoteldescription']."', 
				'".$input['hotelname']."', 
				'".$input['hotelprovince']."', 
				'".$input['hotelcity']."',
				 0);";
	if (mysqli_query($dbConnect, $sql))
		echo "Last id: ".mysqli_insert_id($dbConnect);
	else
		echo "Error: ".$sql."<br>".mysqli_error($dbConnect);
	mysqli_close($dbConnect);
}

//Aun falta terminar.
function list_hotels($hotelName) {
	$table = search_hotel($hotelName);
	while ($row = mysqli_fetch_assoc($table)) {
		echo $row['codigo']."<br>";
		echo $row['titulo']."<br>";
		echo $row['provincia']."<br>";
		echo $row['ciudad']."<br>";
		echo $row['descripcion']."<br>";
	}
	mysqli_close($dbConnect);
}

?>