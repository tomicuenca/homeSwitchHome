<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

include 'hotelInformation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	list_hotels($_POST["hotelname"]);
}

?>
<h2>Modify a Hotel</h2>
<h3>Search hotel:</h3>
<form form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	Hotel name: <input type="text" name="hotelname" placeholder="Hotel name">

	<input type="submit" value="Search" name="search">
		
</form>

</body>
</html>