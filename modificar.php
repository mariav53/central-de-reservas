<?php

include 'config.php';

if (session_status() == PHP_SESSION_NONE) {session_start();}

$url = $_SERVER['REQUEST_URI'];
$usuario = parse_url($url, PHP_URL_QUERY);

        if (
        (!isset($_SESSION['privilegios']))
        || 
                (isset($_SESSION['privilegios']) 
                && 
                ($_SESSION['privilegios'] == 1 || $_SESSION['privilegios'] == 2) 
                && 
                ($_SESSION['usuario'] != $usuario))
        )
    {
        die();
    }


    //DEBUG
    /* print_r($_POST);
    die(); */

    if (isset($_POST['modificar'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
        $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
        $email = mysqli_real_escape_string ($conexion, $_POST['email']);
        

        if (isset($_POST['contrasena'])){
            $contrasena = mysqli_real_escape_string ($conexion, $_POST['contrasena']);
            $contrasena2 = mysqli_real_escape_string ($conexion, $_POST['contrasena2']); 
        }
            
        if((isset($_POST['contrasena']) || isset($_POST['contrasena2'])) && ($contrasena!=$contrasena2)) {
                echo "Las contraseñas no coinciden";
            }else {

                $buscarUser = "SELECT * FROM registro WHERE usuario ='$usuario'";
                $ejecutar= mysqli_query($conexion, $buscarUser); 
                $check = mysqli_num_rows($ejecutar); 
                $fila = $ejecutar->fetch_assoc();
            
                if(isset($_POST['contrasena']) && $_POST['contrasena']!=''){
                    $contrasena = md5($_POST['contrasena']);
                }else
                {
                    $contrasena = $fila['contrasena'];
                }
            
                if(isset($_POST['privilegios'])){
                    $privilegios = mysqli_real_escape_string ($conexion, $_POST['privilegios']);
                }else
                {
                    $privilegios = $fila['privilegios'];
                }

                if ($check>0) {

                //Todo parece correcto procedemos con la modificacion

                if (isset($_POST['contrasena'])){
                    mysqli_query($conexion, "UPDATE registro SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena', privilegios='$privilegios', email='$email' WHERE usuario='$usuario'") or die("Error en la modificación de datos");
                }

                echo "Modificación realizada correctamente";
                header("Location: panel.php");                  

                }
                else{
                    echo("Error: El usuario no existe");
                }
        }
        
	}
	
?>