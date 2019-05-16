<?php

function isImage()	{
	if (isset($_POST["submit"])) {
		//Checks if it's an image. Uses exceptions.
		//	> getimagesize(filename);
		try {
			if (empty($_FILES["fileToUpload"]["tmp_name"]))
				throw new Exception("Upload a file, please!");
			$checkFile = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($checkFile) {
				echo "File is an image - ".$checkFile["mime"].".<br>";
				return 1;
			}
			else {
				echo "File is not an image.";
				return 0;
			}
		}
		catch(Exception $e) {
			$error_msg = $e->getMessage();
			return 0;
		}
	}
}

function get_file_to_upload() {
	$target_dir = "images\\";
	//File to upload.
	return "images\\".basename($_FILES["fileToUpload"]["name"]);
}

function full_image_validation(){
	//Current directory where the file is located.
	$target_dir = "images\\";
	//File to upload.
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	//Holds the file extension.
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if (isImage()) {
		if (isValidImage($target_file, $imageFileType)) {
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))	{
				echo " - The file ".basename($target_file)." has been uploaded.<br>";
				return 1;
			}
		}
		else {
			echo " - Your file was not uploaded.<br>";
			return 0;
		}
	}
	return 0;
}

?>