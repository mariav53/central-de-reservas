<?php

include 'config.php';
$url = $_SERVER['REQUEST_URI'];
$idsala = parse_url($url, PHP_URL_QUERY);
$bbddsala = mysqli_query($conexion, "SELECT * FROM salas WHERE id = " . $idsala);
$arraysala = $bbddsala->fetch_assoc();

if (session_status() == PHP_SESSION_NONE) {session_start();}

        if (
        (!isset($_SESSION['privilegios']))
        || 
                (isset($_SESSION['privilegios']) 
                && 
                ($_SESSION['privilegios'] == 2) 
                && 
                ($_SESSION['usuario'] != $arraysala['propietario']))
        )
    {
        die();
    }

    //DEBUG
    /* print_r($_POST);
    die(); */

    if (isset($_POST['modificar'])) {
        $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']); // mysqli_real_escape_string ($con,...) EVITA INYECCIONES SQL
        $subtitulo = mysqli_real_escape_string ($conexion, $_POST['subtitulo']);
        $urlimagen = mysqli_real_escape_string ($conexion, $_POST['urlimagen']);
        $descripcion = mysqli_real_escape_string ($conexion, $_POST['descripcion']);
        
        if (isset($_POST['propietario'])){
            $propietario = mysqli_real_escape_string ($conexion, $_POST['propietario']);
        }else{
            $propietario = $arraysala['propietario'];
        }
        
        if (isset($_POST['nombre'])){
            mysqli_query($conexion, "UPDATE salas SET nombre='$nombre', subtitulo='$subtitulo', urlimagen='$urlimagen', descripcion='$descripcion', propietario='$propietario' WHERE id='$idsala'") or die("Error en la modificación de la sala");
        }

        echo "Modificación realizada correctamente";
        header("Location: panel.php");                  

        }
        else{
            echo("Error: El usuario no existe");
        }
	
?>