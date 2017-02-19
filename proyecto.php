<!doctype html>
<html lang="ES"> 
<head> 
		<meta charset="UTF-8" /> 
		<meta name="description" content="Miembros del equipo C3PO" /> 
		<meta name="keywords" content="Equipo humano" /> 
		<meta name="title" content="Equipo C3PO" /> 
		<title>Proyecto CTRES</title> 
	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- hoja css-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

 <!--fuentes-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="row in_grid">
        <div class="col-md-12 ">
            <h2 class="titulo_proyecto">¿Qué es CTRES?</h2>
            <p class="subtitulo_proyecto">Una herramienta diseñada para hacer reservas on-line.</p>

            <p class="texto_proyecto">CTRES Es un sistema que permite realizar y gestionar reservas tanto de salas para reuniones, eventos, cursos de formación, etc, como de materiales tales como ordenadores, proyectores o pizarras, entre muchos más.</p>               
        </div>
    </div>

    <div class="row no_ingrid1">
        <div class="col-md-6">
            <img src="img/mockup.png" class="img-responsive imagen_calendario" title="" alt="">
        </div>

        <div class="col-md-6 cuadro_calendario">
            <p class="texto_calendario">En este sistema de gestión de reservas, se incluye un panel de control con tres roles de usuarios:</p>
            
            <ul class="lista_calendario">    
                <li><i class="fa fa-check check_calendario" aria-hidden="true"></i> <span>Perfil Administrador</span>: Además de gestionar las reservas de salas y materiales, también tiene control sobre la base de datos de usuarios y los distintos perfiles de propietarios.</li>
                <li><i class="fa fa-check check_calendario" aria-hidden="true"></i> <span>Perfil Propietario</span>: Cuenta con permisos para la gestión sobre las reservas de sus salas y materiales.</li>
                <li><i class="fa fa-check check_calendario" aria-hidden="true"></i> <span>Perfil Usuario</span>: Cualquier persona que desee realizar la reserva de salas o materiales.</li>
            </ul>
            
        </div>
    </div>

    <div class="row in_grid fila_iconos">
        <div class="col-md-4">
            <i class="fa fa-thumbs-o-up fa-5x" aria-hidden="true"></i>
            <h3>FÁCIL</h3>
            <hr>
            <p>Regístrese y acceda de forma sencilla al calendario de reservas. Ingrese su usuario y realice su reserva.</p>         
        </div>

        <div class="col-md-4">
            <i class="fa fa-rocket fa-5x" aria-hidden="true"></i>
            <h3>RÁPIDO</h3>
            <hr>
            <p>Realice sus reservas de salas o materiales en menos de 5 minutos. CTRES es sistema fácil e intuitivo.</p>
        </div>

        <div class="col-md-4">
            <i class="fa fa-mobile fa-5x" aria-hidden="true"></i>
            <h3>CÓMODO</h3>
            <hr>
            <p>Acceda al calendario desde cualquier dispositivo móvil: ordenador, telefono o tablet.</p>
        </div>
    </div>

    <div class="row ultima">
        <div class="col-md-12">
            <h3>¿Qué hacemos personas de disciplinas tan diferentes en este proyecto?</h3>
            <hr>
            <p>En octubre de 2016 nos embarcamos en un proyecto de formación digital promovido por Fundación Teléfonica y el servicio de empleo de la Comunidad de Madrid. Interesados en las nuevas tecnologías y el mundo digital y con muchas ganas de aprender, llegamos a este proyecto.</p>
        </div>
    </div>

         <?php include'footer.php' ?> 
</body>
</html>