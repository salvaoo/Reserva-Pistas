<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>reto 2</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="validaciones.js"></script>
</head>
<body>
	<h2>Reserva de Pistas</h2>
	<form action="introReservas.php" method="post">
		Dni Socio:
		<input type="text" name="dni" size="10" placeholder="00000000X" maxlength="9" onkeyup="comprobarDni()" required>
		<span id="errorDni"></span>
		<br><br>
		Introduce dia de reserva:
		<input type="date" name="fechaReserva" min="2018-11-01" max="2018-11-30" required>
		<br><br>
		Introduce pista a reservar:
		<select name="pista">
			<option value="tenis">Tenis</option>
			<option value="padel">Padel</option>
		</select>
		<br><br>
		<input type="submit" name="reservar" value="RESERVAR">
	</form>
</body>
</html>