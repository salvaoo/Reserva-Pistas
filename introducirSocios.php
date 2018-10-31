<!DOCTYPE html>
<html>
<head>
	<title>reto 2</title>
</head>
<body>
	<?php 
		error_reporting(error_reporting() & ~E_NOTICE); //Con esto quitamos el error que nos aparece al principio de que la variable dinero esta vacia.

		$nombreSocio = $_POST['nombre'];
		$apeSocio = $_POST['apellidos'];
		$dniSocio = $_POST['dni'];
		$numeroSocio = rand(1,1000);
		$existeDni = false; 

		if (isset($_POST['finalizar'])) {
			//Filtro del nombre.
			if (!preg_match("/^[a-zA-Z]+/", $nombreSocio)) {
				echo "ERROR!! Solo se permiten letras como nombre.<br>";
			}else {
				//Filtro de apellidos.
				if (!preg_match("/^[a-zA-Z]+/", $apeSocio)) {
					echo "ERROR!! Solo se permiten letras como apellido.<br>";
				}else {
					$file = fopen("socios.txt", 'r');
					while (!feof($file)) {
						$linea = fgets($file);
						if (strpos($linea, $dniSocio)==true) {
							$existeDni = true;
						}
					}
					fclose($file); //Cierro el fichero socios.txt.
					if ($existeDni==false) {
						$fichero = fopen("socios.txt", 'a');
						fwrite($fichero, "$nombreSocio;$apeSocio;$dniSocio;$numeroSocio".PHP_EOL);
						fclose($fichero); //Cerramos el fichero socios.txt.
						header('Location: index.php'); //Redireccionamos a la pagina principal.
					}else {
						echo "ERROR! Ya existe un socio con el DNI introducido.";
					}
				}
			}	
		}

		/*********************

		  Prueba XML

		*********************
		$xml = new SimpleXMLElement('socios.xml',NULL,TRUE);
		echo $xml->asXML();
		$socio = $xml->addChild('socio');
		$socio->addChild('nombre', $nombreSocio);
		$socio->addChild('apellidos', $apeSocio);
		$socio->addChild('dni', $dniSocio);
		$socio->addChild('numSocio', $numeroSocio);
		echo $xml->asXML();
		*/
	 ?>
</body>
</html>