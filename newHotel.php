<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<body>
<?php include 'formNewHotelValidation.php'; ?>
<h2>Add a New Hotel</h2>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	Name: <input type="text" name="hotelname">
		<span class="error">* <?php echo $error_fields['hotelname']; ?></span><br><br>

	Location: <input type="text" name="hotellocation"><span class="error">* <?php echo $error_fields['hotellocation']; ?></span><br><br>

	Address: <input type="text" name="hoteladdress">
	<span class="error">* <?php echo $error_fields['hoteladdress']; ?></span><br><br>

	Description: <input type="text" name="hoteldescription"><br><br>

	Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
	<input type="submit" value="Submit" name="submit">
</form>
<form action="uploadHotelImage.php" method="post" >
	
	
	
</form>
</body>
</html>