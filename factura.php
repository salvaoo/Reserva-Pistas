<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>reto 2</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="validaciones.js"></script>
</head>
<body>
	<h2>Generar Factura Mensual</h2>
	<form action="generarFactura.php" method="post">
		Dni Socio:
		<input type="text" name="dni" onkeyup="comprobarDni()" size="10" placeholder="00000000X" maxlength="9" required>
		<span id="errorDni"></span>
		<br><br>
		<input type="submit" name="finalizar" value="Generar Factura">
	</form>
</body>
</html>