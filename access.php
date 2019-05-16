<?php //session_start();
	//A implementar.?>
<!DOCTYPE html>
<html>
<head>
	<title>Home switch home</title>
	<link type="text/css" href="estilos.css" rel="stylesheet"></link>
	<script type="text/javascript" src="scriptLogin.js"></script>
</head>
<body>
	<?php
	//Acceso al sitio por codigo.
	include 'testing.php';
	$access_code = "21409908124";
	$input_code = $error_input = ""; 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST['code'])) {
			$input_code = test_input($_POST['code']);
			if ($input_code == $access_code)
				header('Location: welcome.php');
			else
				$error_input = 'Invalid code!';
		}
		else
			$error_input = 'Input access code!';
	}

	?>
	<h1 class="tituloRegistro"> Home switch home </h1>
	<form method="post" action="<?php 
		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="recuadroLogin">
		<h3 class="tituloTerciario"> Ingresar con codigo </h3>
		<div class="divInput">
			<label class="letraBlancaDivs">Codigo de acceso: </label>
			<input type="text" name="code" id="user" placeholder="Access code" class="inputText">
			<span class="error">*<?php echo $error_input;?></span><br>
		</div>
		<input type="submit" id="Ingresar" class="botonIngreso" value="Ingresar">
	</div>
	</form>
</body>
</html>