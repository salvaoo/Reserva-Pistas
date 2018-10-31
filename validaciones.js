comprobarDni = () => {
	let dni = $('input[name=dni]').val();
	let salida = `<p>${comprobarLimiteCaracteres(dni,8,10)}</p>`;
	salida += comprobarPatronDni(dni);
	$('#errorDni').html(salida);
}

comprobarLimiteCaracteres = (texto,limiteMin,limiteMax) => {
	let salida = `El campo debe estar compuesto por ${limiteMin} 
	numeros y 1 letra.`;
	if (texto.length > limiteMin && texto.length < limiteMax){
		salida = "";
	}
	return salida;
}

comprobarPatronDni = (dni) => {
	let patron = /^\d{8}[a-zA-Z]$/;
	let salida = "El DNI que as introducido es incorrecto.";
	if (patron.test(dni)) {
		salida = "";
	}
	return salida;
}