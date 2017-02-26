<?php include "config.php";

if (session_status() == PHP_SESSION_NONE) {session_start();}  

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">

<?php

if ($_SESSION['privilegios']>=2){
    echo "<link rel='stylesheet' type='text/css' href='css/estilo_admin.css'>"; 
}
?>

	
	<title>C3PO</title>
</head>

<body style="overflow-y:scroll">

 <?php 
    
    if(!isset($_SESSION['privilegios']) || ($_SESSION['privilegios']<2 && isset($_SESSION['privilegios'])))
    {
        header('Location: index.php');
        die();
    }

    $bbddusuarios = mysqli_query($conexion, "SELECT * FROM registro"); 

    if(isset($_SESSION['privilegios']) && $_SESSION['privilegios']==3){
        $propi = "";
    }else{
        $propi = "WHERE propietario='" . $_SESSION['usuario'] . "'";
    }
    
    $querita = "SELECT * FROM salas " . $propi;
    $bbddsalas = mysqli_query($conexion, $querita);

    ?>

    <div id="borrar" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar el usuario <span class="nombredeusuario"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrar">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrar">Cancelar</button>
        </div>
    </div>
    
    <div id="modif" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar el usuario <span class="nombredeusuario"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodif">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodif">Cancelar</button>
        </div>
    </div>
    
        <div id="borrarsala" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar la sala número <span class="nombredesala"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrarsala">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrarsala">Cancelar</button>
        </div>
    </div>
    
    <div id="modifsala" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar la sala número <span class="nombredesala"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodifsala">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodifsala">Cancelar</button>
        </div>
    </div>
    
    <div id="borrarreserva" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea borrar la reserva número <span class="numreserva"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptaborrarreserva">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelaborrarreserva">Cancelar</button>
        </div>
    </div>
    
    <div id="modifreserva" class="modal fade ventanamodal" role="dialog">
        <div class="loginaso">
            <p>¿Está seguro de que desea modificar la reserva número <span class="numreserva"></span>?</p>
                <button class="btn btn-mio1_admin" type="button" id="aceptamodifreserva">Aceptar</button>
                <button class="btn btn-mio1_admin" type="button" id="cancelamodifreserva">Cancelar</button>
        </div>
    </div>
    


<?php include "header.php"; ?>

<?php
        if(isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==2))
        {
            echo("<input class='btn btn-mio1_admin butt2' type='button' value='Editar usuario' onclick='enlaceEditar(". '"' . $_SESSION['usuario'] . '"' . ")'>");
        }    
?>
    



<div class="row fila_panel">
    <div class="col-md-4 panel">
        <form id="default1" action="" method="post">
            <i class="fa fa-calendar fa-4x" aria-hidden="true"></i>
            <hr>
        <button type="submit" class="btn btn-mio1 butt" name="reservas">Reservas</button>              
        </form>                
    </div>

    <div class="col-md-4 panel">
         <form id="default1" action="" method="post">
            <i class="fa fa-folder fa-4x" aria-hidden="true"></i>
            <hr>
            <button type="submit" class="btn btn-mio1 butt" name="salas">Salas</button>   
        </form>    
    </div>
    
    <?php
    if($_SESSION["privilegios"]==3){
        echo('<div class="col-md-4 panel">
        <form action="" method="post" id="default1">
            <i class="fa fa-users fa-4x" aria-hidden="true"></i>
            <hr>
            <button type="submit" class="btn btn-mio1 butt" name="usuarioslista">Usuarios</button>   
        </form>       
    </div>');
    }
    ?>
</div>
    
<div class="row fila_panel1">    
    <?php
        if(isset($_POST['reservas']) || (!isset($_POST['reservas']) && !isset($_POST['salas']) && !isset($_POST['usuarioslista']))){
            $contador = 0;
            while($arraysalas = $bbddsalas -> fetch_assoc()){

                    $bbddreservas = mysqli_query($conexion, "SELECT * FROM lista_reservas WHERE lista_salas='".$arraysalas['nombre']."' ORDER BY start ASC ;"); 
                    $bbddmateriales = mysqli_query($conexion, "SELECT * FROM lista_reservas WHERE opciones='Material' ORDER BY start ASC ;");
                
                    if($arraysalas['id'] != 8){
                
                        if((isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3)) || (isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==2 && ($_SESSION['usuario'] == $arraysalas['propietario']))))
                        {
                            echo("<i class='fa fa-arrow-right' aria-hidden='true'></i> <a class='titulo_panelad' data-toggle='collapse' data-target='#acordeon".$contador."'>".$arraysalas['nombre']."</a>");

                            echo ("<div id='acordeon".$contador."' class='collapse'><table class='table table-striped tabla_admin'><thead><th><b>ID</b></th><th><b>Reservado por</b></th><th><b>Desde</b></th><th><b>Hasta</b></th><th></th></thead>");
                            while($arrayreservas = $bbddreservas -> fetch_assoc()){  
                            echo ("<tr><td>".$arrayreservas["id"]."</td><td>".$arrayreservas['usuario']."</td><td>".$arrayreservas["inicio_normal"]."</td><td>".$arrayreservas["final_normal"]."</td><td><input class='btn btn-mio1_admin' type='button' value='Borrar' onclick=modalBorrReserva(&#34;".$arrayreservas["id"]."&#34;);></td></tr>");
                            }
                            if ($bbddreservas -> num_rows == 0){echo("<tr><td colspan=5><b>No hay reservas</b></td></tr>");}
                            echo ("</table><br>");
                            $contador++;
                        }
                    }
                    else{
                        if((isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==3)) || (isset($_SESSION["privilegios"]) && ($_SESSION["privilegios"]==2 && ($_SESSION['usuario'] == $arraysalas['propietario']))))
                        {
                            echo("<i class='fa fa-arrow-right' aria-hidden='true'></i> <a class='titulo_panelad' data-toggle='collapse' data-target='#acordeon".$contador."'>".$arraysalas['nombre']."</a>");

                            echo ("<div id='acordeon".$contador."' class='collapse'><table class='table table-striped tabla_admin'><thead><th><b>ID</b></th><th><b>Materiales</b></th><th><b>Reservado por</b></th><th><b>Desde</b></th><th><b>Hasta</b></th><th></th></thead>");
                            while($arrayreservas = $bbddmateriales -> fetch_assoc()){  
                            echo ("<tr><td>".$arrayreservas["id"]."</td><td>".$arrayreservas['lista_materiales']."</td><td>".$arrayreservas['usuario']."</td><td>".$arrayreservas["inicio_normal"]."</td><td>".$arrayreservas["final_normal"]."</td><td><input class='btn btn-mio1_admin' type='button' value='Borrar' onclick=modalBorrReserva(&#34;".$arrayreservas["id"]."&#34;);></td></tr>");
                            }
                            if ($bbddmateriales -> num_rows == 0){echo("<tr><td colspan=5><b>No hay reservas</b></td></tr>");}
                            echo ("</table><br>");
                            $contador++;    
                        }
                    }
                
                echo("</div><br>");
            }
            
            
        }

    ?>  

</div>

<?php

     if(isset($_POST['usuarioslista'])){
        if($_SESSION["privilegios"]==3){           
            
            echo("<h2 class='titulo_panelad'>Lista de usuarios</h2>");
    
            echo ("<table class='table table-striped tabla_admin'><thead><th><b>ID</b></th><th><b>Usuario</b></th><th><b>Contraseña</b></th><th><b>Email</b></th><th><b>Nombre</b></th><th><b>Apellidos</b></th><th><b>Privilegios</b></th><th><b><th><b></b></b></thead>");
            while($arrayusuarios = $bbddusuarios -> fetch_assoc()){  //Convierte $resultado, que es un objeto mySQL en un array asociativo (clave, valor)
            echo ("<tr><td>".$arrayusuarios["id"]."</td><td>".$arrayusuarios["usuario"]."</td><td>".$arrayusuarios["contrasena"]."</td><td>".$arrayusuarios["email"]."</td><td>".$arrayusuarios["nombre"]."</td><td>".$arrayusuarios["apellido"]."</td><td>".$arrayusuarios["privilegios"]."</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModif(&#34;".$arrayusuarios["usuario"]."&#34;);></td><td><input class='btn btn btn-mio1_admin' type='button' value='Borrar' class='botonmodif' onclick=modalBorr(&#34;".$arrayusuarios["usuario"]."&#34;);></td></tr>");
            }
            echo ("</table>");
            echo("<input class='btn btn-mio1_admin butt2' type='button' value='Crear nuevo usuario' onclick=window.location=" . '"registro.php"; >');
        }
    }
    $primeravez = false; 
?>

<?php
if(isset($_POST['salas'])){
     echo('<form method="POST" action="" id="salasmodborr" name="salasmodborr">');
     if($_SESSION["privilegios"]==3){

            echo("<h2 class='titulo_panelad'>Lista de salas</h2>");
        
            echo ('<div class="tabla_panel"><table class="table table-striped tabla_admin"><thead><th><b>ID</b></th><th><b>Nombre</b></th><th><b>Propietario</b></th><th><b></b></th><th><b></b></th></thead>');
            while($arraysalas = $bbddsalas -> fetch_assoc()){
                echo ("<tr><td>" . $arraysalas["id"] . "</td><td>" . $arraysalas["nombre"] . "</td><td>" . $arraysalas["propietario"] . "</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModifSala(&#34;".$arraysalas["id"]."&#34;);></td><td><input class='btn btn-mio1_admin' type='button' value='Borrar' class='botonmodif' onclick=modalBorrSala(&#34;".$arraysalas["id"]."&#34;);></td></tr>");
            } 

            echo ("</table></div>");
            echo("<input class='btn btn-mio1_admin butt2' type='button' value='Crear nueva sala' onclick=window.location=" . '"nuevasala.php"; >');

        }else{
            echo ('<div class="tabla_panel"><table class="table table-striped tabla_admin"><thead><th><b>ID</b></th><th><b>Nombre</b></th></thead>');
            while($arraysalas = $bbddsalas -> fetch_assoc()){
                echo ("<tr><td>" . $arraysalas["id"] . "</td><td>" . $arraysalas["nombre"] . "</td><td><input class='btn btn-mio1_admin' type='button' value='Modificar' onclick=modalModifSala(&#34;".$arraysalas["id"]."&#34;);></td></tr>");
            } 

            echo ("</table>");

            echo("<input class='btn btn-mio1_admin butt2' type='button' value='Crear nueva sala' onclick=window.location=" . '"nuevasala.php"; >');

            echo("</div>");
        }
        echo('</form>');
    }
    
    ?>
    

</body>
    
</html>