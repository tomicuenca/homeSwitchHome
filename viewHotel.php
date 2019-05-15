<?php 
	include 'hotelInformation.php';
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<body>
<?php $hotel = initialize_dummy_hotel(); ?>
<h2><a href="<?php 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("Location: welcome.php"); 
?>"></a>Home Switch Home</h2>
<h2> <?php echo $hotel['name']; ?> </h2>
<?php

echo "Description: ".$hotel['description']."<br><br>";
echo "Location: ".$hotel['location']."<br><br>";
echo "Address: ".$hotel['address']."<br><br>";

?>

</body>
</html>