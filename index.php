<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Inicio Central de Reservas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?=$base_url?>js/carrusel.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 
    
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>
    <?php 
    include 'config.php'; 
    include 'header.php';
    ?>

      <?php
    if (session_status() == PHP_SESSION_NONE) {session_start();}
    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>0){
        
    }
    ?>
    
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

        <ol class="carousel-indicators">
            <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/sala1.png" alt="sala de estudio"  class="slide-image"/>
                <div class="bs-slider-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="slide-text slide_style_center colorBack">
                            <h1 data-animation="animated flipInX">Central de Reservas</h1>
                            <p data-animation="animated fadeInLeft">Haga sus reservas de forma fácil y rápida.</p>
                            <a href="calendario_index.php"class="btn btn-default" data-animation="animated fadeInLeft">Hacer reserva</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="img/sala2.png"  class="slide-image"/>
                <div class="bs-slider-overlay"></div>
                <div class="slide-text slide_style_center colorBack">
                    <h1 data-animation="animated flipInX">Central de Reservas</h1>
                    <p data-animation="animated lightSpeedIn">Reserve salas de estudio o reuniones.</p>
                    <a href="calendario_index.php" class="btn btn-default" data-animation="animated fadeInUp">Hacer reserva</a>
                </div>
            </div>

            <div class="item">
                <img src="img/sala3.png" class="slide-image"/>
                <div class="bs-slider-overlay"></div>
                <div class="slide-text slide_style_center colorBack">
                    <h1 data-animation="animated flipInX">Central de Reservas</h1>
                    <p data-animation="animated fadeInRight">Consulte fechas y horarios de forma sencilla.</p>
                    <a href="calendario_index.php"  class="btn btn-default" data-animation="animated fadeInLeft">Hacer reserva</a>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>   
 
        <?php include 'footer.php'; ?>  
   

</body>

</html>