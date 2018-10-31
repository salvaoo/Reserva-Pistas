<!DOCTYPE html>
<html>
<head>
	<title>Reto 2</title>
</head>
<body>
	<?php 
		error_reporting(error_reporting() & ~E_NOTICE); //Con esto quitamos el error que nos aparece al principio de que la variable dinero esta vacia.

		$dni = $_POST['dni'];
		$fecha = $_POST['fechaReserva']; //Nos devuelve la fecha en formato AAAA-MM-DD.
		$pista = $_POST['pista'];
		$okDni = false;
		$pistaOcupada = false;
		
		$file = fopen("socios.txt", 'r');
		while (!feof($file)) {
			$linea = fgets($file);
			if (strpos($linea, $dni)==true) {
				$okDni = true;
			}
		}
		if ($okDni==true) {
			$file2 = fopen("reservas.txt", 'r');
			while (!feof($file2)) {
				$linea2 = fgets($file2);
				//Si para comprobar si en esa fecha ahi alguna pista reservada y si es el caso, si es de lo que hemos seleccionado.
				if (strpos($linea2, $fecha)==true) {
					if (strpos($linea2, $pista)==true) {
						$pistaOcupada = true;
					}
				}
			}
			fclose($file2); //Cerramos el fichero modo lectura.
			if ($pistaOcupada==false) {
				$file2 = fopen("reservas.txt", 'a'); //Abrimos el fichero en escritura.
				fwrite($file2, "$dni;$fecha;$pista".PHP_EOL);
				fclose($file2); //Cerramos el fichero.
			}else {
				echo "En esa fecha la pista de $pista esta ocupada.";
			}
		}else {
			echo "El DNI introducido no pertenece a ningun socio.";
		}		
		fclose($file); //Cierro el fichero socios.txt.

		//Si no ahi ningun error en los pasos anteriores, te redirecciona al index.php.
		if ($okDni==true && $pistaOcupada==false) {
			header('Location: index.php'); 
		}
		
	 ?>
</body>
</html>