<?php


    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

        //  $listas = $_POST['listas'];
        //  $valor ='';

        // if (isset ($_POST['listas'])){
        //    // for ($i=0; $i<sizeof($listas); $i++) {
        //  foreach ($_POST['listas'] as $seleccion)
        //     {
        //         //echo $seleccion."<br>";///para imprimirla
        //     $valor.=$seleccion.",";//para almacenarla
        //     } 
             
        //     $valor=substr($valor,0,-1);       

        // }
        //     $listas = $valor;


    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM lista_reservas WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];
    // opcion de reserva sala o material 
    $opciones=$row['opciones'];
    // Selecccion de materiales
    $lista_materiales = $row['lista_materiales'];
    // Selecccion de salas
    $lista_salas = $row['lista_salas'];
     // Fecha inicio
    $inicio=$row['inicio_normal'];
    // Fecha Termino
    $final=$row['final_normal'];

/*// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM lista_reservas WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}*/
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

    <title><?=$titulo?></title>
    <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <link rel="stylesheet" href="<?=$base_url?>css/estilo.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
	
</head>
<body>
	<h3 class="modal_mio"> Título de la reserva: <span class="sin_estilo"><?=$titulo?></span> </h3>
	<hr>
    <p  class="modal_mio">Fecha inicio: <span class="sin_estilo"><?=$inicio?></span></p> 
    <p class="modal_mio">Fecha final: <span class="sin_estilo"><?=$final?> </span></p> 
    <p  class="modal_mio">Tipo de reserva: <span class="sin_estilo"><?=$opciones?> </span></p> 
    <p class="modal_mio">Selección: 
        <?php
        if (isset($row['lista_salas'])){            
        ?>    
            <span class="sin_estilo"><?=$lista_salas?></span>

        <?php } ?>

        <?php
        if (isset($row['lista_materiales'])){
        ?>
            <span class="sin_estilo"><?=$lista_materiales?></span>
        <?php } ?>
       
    </p> 
     <!--<p><?=$evento?></p>-->
</body>
<!-- <form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
</form> -->
</html>
