<?php include 'config.php';

if (session_status() == PHP_SESSION_NONE) {session_start();} 

 ?>

<!DOCTYPE html>
<html>

<head>
	<title>Registro de usuarios</title>

	<meta charset="utf-8">
	
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="validar.js"></script>

	<!--HOJA CSS provisional-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">

<?php

if (isset($_SESSION['privilegios']) && $_SESSION['privilegios']>=2){
	echo "<link rel='stylesheet' type='text/css' href='css/estilo_admin.css'>";	
}
?>

</head>

<body>

 <?php 
    include 'header.php';
 ?>

<div class="row form_registro">
    
   

	<div class="col-md-4 col-md-offset-4" id="registro">

		<h2 class="titulo2">Crear cuenta</h2>

		<form method="POST" action="insertar.php" id="formregistro" name="registro">
			  <div class="form-group " >
			    <input type="text" class="form-control" id="nom" name="nombre" placeholder="Nombre">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="ape" name="apellido" placeholder="Apellido">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="usu" name="usuario" placeholder="Usuario">
			  </div>

			  <div class="form-group" >
			    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
			  </div>

			 <div class="form-group">
			    <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Repita su contraseña">
			  </div>

          <?php
                 
          if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] > 1){ //CODIGO QUE CONDICIONE QUE ESTO APAREZCA SOLO SI EL USUARIO TIENE PRIVILEGIOS DE ADMINISTRACIÓN
                echo ('<div class="form-group privi">
                            <select id="privilegios" name="privilegios" form="formregistro">
                              <option value="1">Usuario</option>
                              <option value="2">Propietario</option>
                              <option value="3">Administrador</option>
                            </select> 
                        </div>');
            }                         
            ?>

            <a href="pagina_login.php"><p>¿Ya eres usuario?</p></a> <br>

			<button type="button" class="btn btn-mio1 butt" name="insertar" onclick=validar();>Entrar</button> 				
		</form>

	</div>
</div>

<!-- <?php include 'footer.php'; ?>
 -->
</body>
</html>