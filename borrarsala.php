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

    $url = $_SERVER['REQUEST_URI'];
    $idsala = parse_url($url, PHP_URL_QUERY);
    mysqli_query($conexion, "DELETE FROM salas WHERE id='$idsala'") or die('Hubo un problema al borrar la sala: ' . mysqli_error($conexion));
    header("Location: panel.php");

?>