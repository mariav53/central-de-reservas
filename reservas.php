<?php

date_default_timezone_set("Europe/Madrid");


include 'funciones.php';
include 'config.php';
include 'login.php';

//Buscamos que usuario es el que va a realizar la reserva
$r_usuario = "";
if (session_status() == PHP_SESSION_NONE) {session_start();} 
    if (isset($_SESSION['usuario'])){
        $r_usuario = $_SESSION['usuario'];
        $r_email = $_SESSION['email'];
    }

    // echo $r_usuario;
    // echo $r_email;
    // die("bye bye!!");

if (isset($_POST['from'])) {
     // verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") {

        // Recibimos la fecha de inicio y la fecha final con la funcion formatear
        $inicio = _formatear($_POST['from']);    
        $final  = _formatear($_POST['to']);

        // fecha de inicio y la fecha final forateada
        $inicio_normal = $_POST['from'];
        $final_normal  = $_POST['to'];
        $valor = '';

        //Creamos una nueva variable para evitar problemas con la palabra reservada "end"
        $fin = "end";
       
        // $opciones = $_POST['opciones'];
        // $lista_salas = $_POST['lista_salas'];
        // $lista_materiales = $_POST['lista_materiales'];

        // Recibimos la opcion de reserva
        if (isset($_POST['opciones'])){
            $opciones = $_POST['opciones'];

            if (isset($_POST['lista_salas'])){

                $lista_salas = $_POST['lista_salas'];
                $buscarSala = "SELECT * FROM lista_reservas WHERE (lista_salas = '$lista_salas')";
                $buscar = mysqli_query($conexion, $buscarSala);
                $check = mysqli_num_rows($buscar);

                //El problema es que si check>0 no te deja reservar. Entonces aunque sea otra sala, como en el horario va a haber una coincidencia, check va a ser mayor que cero y no te va a dejar reservar ninguna

                //Por eso hacemos una query solo con las salas y luego, si hay coincidencias en las salas, hacemos otra query con las fechas 

                if ($check>0){

                    $buscarFecha = "SELECT * FROM lista_reservas WHERE (start = '$inicio' OR $fin = '$final') OR (start < '$final' AND $fin >= '$final') OR (start <= '$inicio' AND $fin > '$inicio') OR (start >= '$inicio' AND $fin <= '$final')";
                    
                    //$buscarFecha = "SELECT * FROM lista_reservas WHERE (start = '$inicio' AND $fin = '$final') OR (start < '$final' AND $fin >= '$final') OR (start >= '$inicio' AND $fin <= '$final')";

                    $buscar2 = mysqli_query($conexion, $buscarFecha);
                    $check2 = mysqli_num_rows($buscar2);

                        if ($check2>0){

                            echo "<script>
                                alert('Esa sala ya se encuentra reservada en esa franja horaria. Seleccione otra hora o fecha');
                                history.back();
                                </script>";

                            die();    
                        }                                        
                    } 
            }

                
            if (isset ($_POST['lista_materiales'])){
                foreach ($_POST['lista_materiales'] as $seleccion){
                    $valor.=$seleccion.",";//para almacenarla
                }   
            $valor=substr($valor,0,-1);//para eliminar la ultima coma (de tu post anterior)
            }else{
                $lista_materiales = null;
            }
        }
        
        //Insertamos una referencia
        $ref = $_POST['title'];

        // Y un comentario
        $body = evaluar($_POST['event']);

        //al seleccionar la opcion de reservas...
        if (!isset($lista_salas)){
            $lista_salas = "";
        }
        // insertamos la reserva
        $query="INSERT INTO lista_reservas (usuario, title, body, opciones, lista_salas, lista_materiales, start, $fin, inicio_normal, final_normal) VALUES('$r_usuario', '$ref', '$body', '$opciones', '$lista_salas', '$valor', '$inicio', '$final', '$inicio_normal', '$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);

        // Obtenemos el ultimo id insertado
        $im=$conexion->query("SELECT MAX(id) AS id FROM lista_reservas");
        $row = $im->fetch_row();  
        $id = trim($row[0]); 

        // para generar el link del evento
        $link = "$base_url"."descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE lista_reservas SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query);

        // Enviamos un email de confirmación
        // $from = "Equipo C3PO";
        $to = $r_email;
        $subject = "Confirmación de Reserva";
        $body = "Bienvenido a la Central de Reservas Ctres.\n\n\n Los datos de su reserva son:\n\n Tipo de reserva: $opciones\n Selección: $lista_salas $valor\n\n Gracias por confiar en nosotros.\n\n\n Atentamente el equipo C3PO.";
        
        mail ($to, $subject, $body);

        // redireccionamos a nuestro calendario
        echo "<script>
                alert('Reserva realizada con éxito. En breve recibirá un email de confirmación');window.open('calendario_index.php','_self');
             </script>";

        // die('bye bye');      
        
        // header("Location:calendario_index.php"); 
 
    }
}
                
?>