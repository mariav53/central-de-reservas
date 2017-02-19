<?php

date_default_timezone_set("Europe/Madrid");

include 'funciones.php';
include 'config.php';

$querita = "SELECT * FROM salas";
$bbddsalas = mysqli_query($conexion, $querita);

// if (isset($_POST['from'])){

//     if ($_POST['from']!="" AND $_POST['to']!=""){

//         // Recibimos el fecha de inicio y la fecha final desde el form
//         $inicio = _formatear($_POST['from']);
//         // y la formateamos con la funcion _formatear
//         $final  = _formatear($_POST['to']);
//         // Recibimos el fecha de inicio y la fecha final desde el form
//         $inicio_normal = $_POST['from'];
//         // y la formateamos con la funcion _formatear
//         $final_normal  = $_POST['to'];
//         // Recibimos los demas datos desde el form
//         $titulo = evaluar($_POST['title']);
//         // y con la funcion evaluar
//         $body   = evaluar($_POST['event']);
//         // reemplazamos los caracteres no permitidos
//         //$clase  = evaluar($_POST['class']);
//         $opciones = $_POST['opciones'];
//         $listas = $_POST['listas'];
//         $valor ='';

//         // $fin = "end";
//         //al seleccionar la opcion de reservas...
//         if (isset ($_POST['listas'])){
//            // for ($i=0; $i<sizeof($listas); $i++) {
//          foreach ($_POST['listas'] as $seleccion)
//             {
//                 //echo $seleccion."<br>";///para imprimirla
//             $valor.=$seleccion.",";//para almacenarla
//             } 
             
//             $valor=substr($valor,0,-1);       

//         }

//         // insertamos el evento
//         $query="INSERT INTO lista_reservas VALUES(null,'$titulo','$body','$opciones','$valor','','$inicio', '$final', '$inicio_normal', '$final_normal')";

//         // Ejecutamos nuestra sentencia sql
//         $conexion->query($query); 

 
//         //Obtenemos el ultimo id insetado
//         $im=$conexion->query("SELECT MAX(id) AS id FROM lista_reservas");
//         $row = $im->fetch_row();  
//         $id = trim($row[0]);

//         // para generar el link del evento
//         $link = "$base_url"."descripcion_evento.php?id=$id";

//         // y actualizamos su link
//         $query="UPDATE lista_reservas SET url = '$link' WHERE id = $id";

//         // Ejecutamos nuestra sentencia sql
//         $conexion->query($query); 

//         // redireccionamos a nuestro calendario
//         //header("Location:$base_url"); 
//         header("Location:calendario_index.php"); 
//         }    
// }

?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>
        
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <link rel="stylesheet" href="<?=$base_url?>css/estilo.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  

    </head>


<body style="background: white;">

    <?php
        if (session_status() == PHP_SESSION_NONE) {session_start();}
    
        if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>0){
            include 'header.php';
        }
        else{
            header ('Location: pagina_login.php');
        }
        
    ?>

    <div class="container">
        <div class="row">
            <div class="page-header"><h2></h2></div>
            <div class="pull-left form-inline"><br>
                <div class="btn-group">
                    <button class="btn btn-primary btn-mio1" data-calendar-nav="prev"><< Anterior</button>
                    <button class="btn" data-calendar-nav="today">Hoy</button>
                    <button class="btn btn-primary btn-mio1"  data-calendar-nav="next">Siguiente >></button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary btn-mio1" data-calendar-view="year">Año</button>
                    <button class="btn active" data-calendar-view="month">Mes</button>
                    <button class="btn btn-primary btn-mio1" data-calendar-view="week">Semana</button>
                    <button class="btn btn-primary btn-mio1" data-calendar-view="day">Dia</button>
                </div>
            </div>
            <div class="pull-right form-inline"><br>
                <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Reserva</button>
            </div>
        </div><hr>

        <div class="row">
            <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
            <br><br>
        </div>

       <!--ventana modal para el calendario-->
        <div class="modal fade modal_mio" id="events-modal" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" style="height: 400px">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-mio1" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 
                        // dentro de un iframe
                        modal_type:'iframe',    
                        //obtenemos los eventos de la base de datos
                        events_source: '<?=$base_url?>obtener_eventos.php', 
                        // mostramos el calendario en el mes
                        view: 'month',             
                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   
                        // definimos el idioma por defecto
                        language: 'es-ES', 
                        //Template de nuestro calendario
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,
                        // Hora de inicio
                        time_start: '09:00', 

                        // y Hora final de cada dia
                        time_end: '20:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

    <!--MODAL RESERVAS-->

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nueva reserva</h4>
      </div>
      <div class="modal-body">
        <form action="reservas.php" method="post">
                    <label for="from">Fecha inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                    <br>

                    <label for="to">Fecha final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <!-- <label for="tipo">Tipo de evento</label>
                    <select class="form-control" name="class" id="tipo">
                        <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                    </select> -->
                    <br>

                    <label for="title">Título reserva</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>

    <script type="text/javascript">
        function showContent() {
        element = document.getElementById("content");
        checkedd = document.getElementById("checkbox1");
           if (checkedd.checked) {
           element.style.display='block';
           } else {
           element.style.display='none';
           }
        }
    </script>
<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->
    <script type="text/javascript">
        function hideContent() {
        element = document.getElementById("checkbox2");
        checkedd = document.getElementById("checkbox1");
            if (checkedd.checked) {
            element.style.display='none';
            } else {
            element.style.display='block';
            }
        }
    </script>

                <label for="opcion">Seleccione una de las siguientes opciones</label> <!--antes for="tipo"-->
                    <div class="checkbox">
                       <label for="tipo"><input type="checkbox" name="opciones" id="checkbox1" value="Sala" onchange="javascript:showContent(); hideContent()" /> Salas</label>
                    </div>
                    <div id="content" style="display: none;">
                        <select class="form-control" name="lista_salas" id="tipo1">                          
                            <?php while($arraysalas = $bbddsalas -> fetch_assoc()){
                                if ($arraysalas['id'] != 8){ //PARA QUE NO MUESTRE 'MATERIALES DISPONIBLES' COMO SALA
                                    echo ("<option value='".$arraysalas['nombre']."'>".$arraysalas['nombre']."</option>");
                                    }
                                }
                            ?>          
                        </select>
                    </div>

<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->                   
    <script type="text/javascript">
        function hideContent2() {
        element = document.getElementById("checkbox1");
        checkedd = document.getElementById("checkbox2");
            if (checkedd.checked) {
            element.style.display='none';
            } else {
            element.style.display='block';
            }
        }
    </script>

<!--Funcion JavaScript para dehabilitar checkbox al seleccionar una opción-->
    <script type="text/javascript">
        function showContent2() {
        element = document.getElementById("content2");
        checkedd = document.getElementById("checkbox2");
            if (checkedd.checked) {
            element.style.display='block';
            } else {
            element.style.display='none';            
            }
        }
        function disableLista() {
        checkedd = document.getElementById("checkbox2");
            if (checkedd.checked) {
            document.getElementById('tipo1').disabled = true;
            } else{
                document.getElementById('tipo1').disabled = false;
            }
        }
    </script>          
                     <div class="checkbox">
                       <label for="tipo">  <input type="checkbox" name="opciones" id="checkbox2" value="Material" onchange="javascript:showContent2(); hideContent2(); disableLista()" />Materiales (Presione Ctrl + click de ratón para seleccionar varias opciones) </label>
                    </div>

                     <div id="content2" style="display: none;">
                        <select multiple class="form-control" name="lista_materiales[]" id="tipo2">              
                            <option value="Proyector">Proyector</option>
                            <option value="Ordenador">Ordenador</option>
                            <option value="Impresora">Impresora </option>
                            <option value="Pizarra">Pizarra</option>                 
                        </select>
                    </div>
    
                    <label for="body">Comentarios</label>
                    <textarea id="body" name="event" required class="form-control" rows="3"></textarea>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
