function validar() {
	var nombre, apellido, usuario, email, contrasena, contrasena2, exp_email;
		nombre = document.getElementById("nom").value;
		apellido = document.getElementById("ape").value;
		usuario = document.getElementById("usu").value;
		email = document.getElementById("email").value;
		contrasena = document.getElementById("contrasena").value;
		contrasena2 = document.getElementById("contrasena2").value;

		exp_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (nombre === "") {
			alert("Por favor, introduzca su nombre");
			return false;
		}else if (nombre.length < 3) {
			alert("Introduzca un nombre válido");
			return false;	
		}else if (apellido === "") {
			alert("Por favor, introduzca su apellido");
			return false;
		}else if (apellido.length < 2) {
			alert("Introduzca un apellido válido");
			return false;
		}else if (usuario === "") {
			alert("Por favor, introduzca un nombre de usuario");
			return false;
		}else if (usuario.length < 4 || usuario.length > 20) {
			alert("El nombre de usuario debe contener entre 4 y 20 caracteres");
			return false;
		}else if (email === "") {
			alert("Por favor, introduzca su dirección de email");
			return false;
		}else if (!exp_email.test(email)){
			alert("Por favor, introduzca un email válido");
			return false;	
		}else if (contrasena === "") {
			alert("Por favor, introduzca una contrasena");
			return false;
		}else if (contrasena.length < 4 || contrasena.length > 20) {
			alert("La contraseña debe contener entre 4 y 20 caracteres");
			return false;
		}else if (contrasena2 === "") {
			alert("Por favor, introduzca su contraseña nuevamente");
			return false;
		}else if (contrasena != contrasena2) {
			alert("Las contraseñas deben ser iguales");
			return false;
		}else{
            document.registro.submit();
        }
}