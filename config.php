<?php

	$host = "localhost";  //conexion al hosting
	$db = "ctres_reservas";  //nombre de la base de datos
	$user = "c3admin"; //nombre de usuario
	$pass = "CtR3sPo";  //clave de usuario

	$conexion = mysqli_connect($host, $user, $pass) or die('No se pudo conectar con la base de datos: ' . mysqli_error());

	mysqli_select_db($conexion, $db) or die('No se pudo seleccionar la base de datos');

    //if ($conexion){echo ("La conexión con la base de datos funciona correctamente");}

    $base_url="http://localhost/central/";
?>