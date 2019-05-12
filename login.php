<!DOCTYPE html>
<html>
<head>
	<title>Home switch home</title>
	<link type="text/css" href="estilos.css" rel="stylesheet"></link>
	<script type="text/javascript" src="scriptLogin.js"></script>
</head>
<body>
	<h1 class="tituloRegistro"> Home switch home </h1>
	<form action="pagInicio.php" onsubmit=" return validar()">
	<div class="recuadroLogin">
		<h3 class="tituloTerciario"> Ingresar </h3>
		<div class="divInput">
			<label class="letraBlancaDivs">Codigo de acceso: </label>
			<input type="text" name="Cuenta" id="usuario" class="inputText">
		</div>
		<input type="submit" id="Ingresar" class="botonIngreso" value="Ingresar">
	</div>
	</form>
</body>
</html>