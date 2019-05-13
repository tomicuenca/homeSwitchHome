<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home switch home</title>
	<link type="text/css" href="estilos.css" rel="stylesheet"></link>
	<script type="text/javascript" src="scriptLogin.js"></script>
</head>
<body>

	<?php include 'D:\Projects\PHP\HomeSwitchHome\onValidation.php';?>
	<h1 class="tituloRegistro"> Home switch home </h1>
	<form method="post" action="<?php 
		echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="recuadroLogin">
		<h3 class="tituloTerciario"> Ingresar </h3>
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