<!DOCTYPE html>
<html>
<head>
	<title>Home Switch Home - Inicio</title>
	<link rel="stylesheet" type="text/css" href="inicio_estilo.css">
	<script src="inicio_script.js"></script>
</head>
<body>
	<center>
		<div id="central">
			<h1>Home Switch Home</h1>
			<div>
				<h2>Acceso auxiliar</h2>
				<form action="pagina-principal_dinamico.php" onsubmit="return verificar()">
					<table>
						<tr>
							<td>Código de acceso:</td>
							<td><input type="text" name="codigoacceso" placeholder="  Ingresar código" id="ingCod"></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><input type="submit" value="Ingresar" id="boton"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</center>	
	<div id="acento">ó</div>
</body>
</html>