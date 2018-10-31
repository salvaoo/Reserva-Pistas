<!DOCTYPE html>
<html>
<head>
	<title>Reto 2</title>
</head>
<body>
	<?php 
		error_reporting(error_reporting() & ~E_NOTICE); //Con esto quitamos el error que nos aparece al principio de que la variable dinero esta vacia.

		$dni = $_POST['dni'];
		$okDni = false;
		$precio = 0;
		$aFactura = [];
		$esta = false;

		echo "<h2>Factura Mensual</h2>";

		$file = fopen("socios.txt", 'r');
		while (!feof($file)) {
			$linea = fgets($file);
			if (strpos($linea, $dni)==true) {
				$okDni = true;
			}
		}
		if ($okDni==true) {
			$fileRe = fopen("reservas.txt", 'r');
			while (!feof($fileRe)) {
				$linea3 = fgets($fileRe);
				$aFactura = explode(";", $linea3);
				if ($dni == $aFactura[0]) {
					echo "
					<p>DNI: $aFactura[0]</p>
					<p>Fecha: $aFactura[1]</p>
					<p>Pista: $aFactura[2]</p>
					-------------------------------------<br>
					";
					$precio = $precio + 1;
				}	
			}
			fclose($fileRe); //Cerramos el fichero reservas.txt.
			echo "<h4>TOTAL: $precio €</h4><h6>El coste por pista es de 1€.</h6>";
		}else {
			echo "El DNI introducido no pertenece a ningun socio.";
		}
		fclose($file); //Cierro el fichero socios.txt.
	 ?>
</body>
</html>