<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>reto 2</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="validaciones.js"></script>
</head>
<body>
	<h2>Registro de Socios</h2>
	<form action="introducirSocios.php" method="post">
		Nombre:
		<input type="text" name="nombre" placeholder="Salvador" required>
		<br><br>
		Apellidos:
		<input type="text" name="apellidos" placeholder="Gil Rosales" required>
		<br><br>
		Dni:
		<input type="text" name="dni" size="10" placeholder="00000000X" maxlength="9" onkeyup="comprobarDni()" required>
		<span id="errorDni"></span>
		<br><br>
		<input type="submit" name="finalizar" value="FINALIZAR">
	</form>
</body>
</html>