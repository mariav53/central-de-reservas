<?php

include 'config.php';

//DEBUG
/* print_r($_POST);
die(); */

/* if (isset($_POST['insertar'])) {  */

		$nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
		$apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
		$usuario = mysqli_real_escape_string ($conexion, $_POST['usuario']);
		$email = mysqli_real_escape_string ($conexion, $_POST['email']);
		$contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
		$contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']);

		//Email que se enviará al nuevo usuario
		$from = "Equipo C3PO";
		$to = $email;
		$subject = "Registro Ctres";
		$body = "Bienvenido a la Central de Reservas Ctres.\n\n\n Ya puede comenzar a utilizar nuestros servicios.\n\n Su usuario es: $usuario\n Su contraseña es: $contrasena\n\n Gracias por confiar en nosotros.\n\n\n Atentamente el equipo C3PO.";
		
		if (isset($_POST['privilegios'])){
			$privilegios = mysqli_real_escape_string ($conexion, $_POST['privilegios']);
		}else{
			$privilegios = 1;
		}
        //Pasamos a validar el formulario de registro
	    if(empty($_POST["nombre"])){
	        $errores[] = "El nombre es requerido";
	    }

	    if(empty($_POST["apellido"])){
	       $errores[] = "El apellido es requerido";
	    }

	    if(empty($_POST["usuario"])){
	        $errores[] = "El usuario es requerido";
	    }

	    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"])){
	         $errores[] = "El email es requerido";
	    }

	    if(empty($_POST["contrasena"]) || ((strlen($_POST["contrasena"]) < 3) && (strlen($_POST["contrasena"]) < 21))){
	      $errores[] = "La contraseña debe contener entre 4 y 20 caracteres";
	    }

	    if(empty($_POST["contrasena2"]) || ((strlen($_POST["contrasena"]) < 3) && (strlen($_POST["contrasena"]) < 21))){
	      $errores[] = "La contraseña debe contener entre 4 y 20 caracteres";
	    }

     	if($contrasena != $contrasena2) {
			$errores[] = "Las contraseñas no coinciden";
		}else{
				$contrasena = md5($_POST['contrasena']);
		}
		
		if(empty($errores)) {

				$buscarUser = "SELECT * FROM registro WHERE usuario ='$usuario' OR email ='$email'";
				$ejecutar= mysqli_query($conexion, $buscarUser);
				$check = mysqli_num_rows($ejecutar);

				if ($check>0) {

					echo "<script>
						alert('El usuario o email ya existe. Vuelve a intentarlo');history.back();
						</script>";
				}else{

                    //Todo parece correcto procedemos con la insercion

                    $query = "INSERT INTO registro (nombre, apellido, usuario, email, contrasena, privilegios) VALUES ('$nombre','$apellido', '$usuario', '$email','$contrasena', '$privilegios')";

                    $ejecutar = mysqli_query($conexion, $query) or die('Hubo un error durante el registro: ' . mysqli_error($conexion));

                    //Enviamos email al usuario y le mostramos el mensaje de que se ha registrado correctamente

                    mail ($to, $subject, $body, $from);  
                    
                    if (session_status() == PHP_SESSION_NONE) {session_start();}

                    if((isset($_SESSION['privilegios']) && $_SESSION['privilegios']<3) || !isset($_SESSION['privilegios']))
                    {
                        $busca = "SELECT * FROM registro WHERE usuario ='$usuario' AND contrasena ='$contrasena'";
                        $buscaResult = mysqli_query($conexion, $busca);
                        $fila = mysqli_fetch_assoc($buscaResult);
                        $k_usuario = $fila['usuario'];
                        $k_contrasena = $fila['contrasena'];	
                        $k_nombre = $fila['nombre'];
                        $k_apellido = $fila['apellido'];
                        $k_email = $fila['email'];
                        $k_privilegios = $fila['privilegios'];

                        if ($usuario == $k_usuario && $contrasena == $k_contrasena) {
                            if (session_status() == PHP_SESSION_NONE) {session_start();}
                            $_SESSION['usuario']= $k_usuario;
                            $_SESSION['nombre']= $k_nombre;
                            $_SESSION['apellido'] = $k_apellido;
                            $_SESSION['email'] = $k_email;
                            $_SESSION['privilegios'] = $k_privilegios;

                            echo "<script> alert('El registro se completó correctamente. En breve recibirá un email de bienvenida');window.open('index.php','_self');</script>"; 

                        }
                        
                    }

                    echo "<script> alert('El registro se completó correctamente. En breve, el nuevo usuario recibirá un email de bienvenida');
                         window.open('panel.php','_self');
                         </script>"; 
                }
        }
			
		
?>

<!-- Mostrar errores (en caso de que los haya) con la validación de PHP -->
<ul>
	<?php 
        if(isset($errores)){
		  foreach ($errores as $error){
			echo "<li> $error </li>";
		}
	} 
	?>
</ul> 