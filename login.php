<?php

	include 'config.php';

	if (isset($_POST['log'])){
		$usuario = $_POST['usuario'];
		$contrasena =md5($_POST['contrasena']);

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

            if($k_privilegios>1){
                header('Location: panel.php');
            }
            else{
                header('Location: index.php');
            } 
        }

        else {
            echo "<script> alert('Usuario o contraseña incorrecta. Vuelve a intentarlo');
            history.back();
            </script>";
        }
    }

?>






 

