<?php
	include 'configFiles/cacheClearing.php';
?>
<!DOCTYPE html>
<html>
<body>
<?php include 'formNewHotelValidation.php'; ?>
<h2>Add a New Hotel</h2>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

	Name: <input type="text" name="hotelname" placeholder="Hotel name">
		<span class="error">* <?php echo $error_fields['hotelname']; ?></span>
	Id Code: <input type="text" name="hotelcode" size="6" placeholder="Identifier">
		<span class="error">* <?php echo $error_fields['hotelcode']; ?></span><br><br>

	Province/State: <input type="text" name="hotelprovince" placeholder="Buenos Aires/Cordoba">
		<span class="error">* <?php echo $error_fields['hotelprovince']; ?></span><br>

	City: <input type="text" name="hotelcity" placeholder="La Plata/Villa Carlos Paz">
		<span class="error">* <?php echo $error_fields['hotelcity']; ?></span><br><br>

	Address: <input type="text" name="hoteladdress" placeholder="Calle 19">
	Number: <input type="text" name="hotelnumberaddr" size="3" placeholder="A number">
	<span class="error">* <?php echo $error_fields['hoteladdress']; ?></span>
	<span class="error"> <?php echo $error_fields['hotelnumberaddr']; ?></span><br><br>

	Description: <textarea type="text" name="hoteldescription"></textarea><br><br>

	Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
	<input type="submit" value="Submit" name="submit">
	<a href="javascript:history.back()">Go Back</a>
</form>
</body>
</html>