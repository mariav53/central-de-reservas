<?php

    include "config.php";
    
    if (session_status() == PHP_SESSION_NONE) {session_start();}

    if ((isset($_SESSION['privilegios']) && $_SESSION['privilegios'] < 3) || !isset($_SESSION['privilegios']))
    {
        die();
    }

    $url = $_SERVER['REQUEST_URI'];
    $usuario = parse_url($url, PHP_URL_QUERY);
    mysqli_query($conexion, "DELETE FROM registro WHERE usuario='$usuario'") or die('Hubo un problema al borrar el usuario: ' . mysqli_error($conexion));
    header("Location: panel.php");

?>