<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Inicio Central de Reservas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet"> 


        
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
    
    <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">  
             
                <div class="carousel-caption">
                <div class="sobre">
                  <h3>Central de reservas</h3>
                  <p>Haga sus reservas de forma fácil y rápida.</p>
                  <a href="#" class="btn btn-default">Hacer reserva</a>
                </div>
                </div>
            </div>
            <div class="item"> 
              
                <div class="carousel-caption">
                <div class="sobre">
                  <h3>Central de reservas</h3>
                  <p>Reserve salas de estudio o reuniones.</p>
                  <a href="#" class="btn btn-default">Hacer reserva</a>
                </div>
                  </div>
            </div>
            <div class="item"> 
              
                <div class="carousel-caption">
                <div class="sobre">
                  <h3>Central de reservas</h3>
                  <p>Consulte fechas y horarios de forma sencilla.</p>
                  <a href="#" class="btn btn-default">Hacer reserva</a>
                </div>
              </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carouselFade" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carouselFade" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
    $('#carouselFade').carousel();
</script>




        <?php include 'footer.php'; ?>   


</body>

</html>