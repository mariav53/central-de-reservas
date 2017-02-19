<?php

include 'config.php';
$url = $_SERVER['REQUEST_URI'];
$idreservas = parse_url($url, PHP_URL_QUERY);
$bbddreservas = mysqli_query($conexion, "SELECT * FROM lista_reservas WHERE id = " . $idreservas);
$arrayreservas = $bbddreservas->fetch_assoc();
$sala = $arrayreservas['lista_salas'];
$bbddsalas = mysqli_query($conexion, "SELECT * FROM salas WHERE nombre='". $sala . "'");
$arraysalas = $bbddsalas->fetch_assoc();




if (session_status() == PHP_SESSION_NONE) {session_start();}

        if (
        (!isset($_SESSION['privilegios']))
        || 
                (isset($_SESSION['privilegios']) 
                && 
                ($_SESSION['privilegios'] == 2) 
                && 
                ($_SESSION['usuario'] != $arraysalas['propietario']))
        )
    {
        die();
    }

    $url = $_SERVER['REQUEST_URI'];
    $idreservas = parse_url($url, PHP_URL_QUERY);
    mysqli_query($conexion, "DELETE FROM lista_reservas WHERE id='$idreservas'") or die('Hubo un problema al borrar la reserva');
    header("Location: panel.php");

?>