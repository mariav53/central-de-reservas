<!DOCTYPE html>
<html>
<head>

	<title>Recuperar contrasena</title>

	<meta charset="utf-8">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--HOJA CSS-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">
</head>

<body>

<?php include 'header.php'; ?>

<div class="row" id="inicio_contraseña">	

	<div class="col-md-12  col-center" id="cliente_contraseña" >
		<h2 class="titulo2">Recuperar Contraseña</h2>
			<form method="POST" action="#">

				<div class="form-group cliente_contra" >
				    <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
				</div>
				<button type="submit" class="btn btn-mio1 butt" name="log">Enviar</button>
			</form>
	</div>
</div>


<?php
			  
include 'config.php';

	if (isset($_POST['email'])) {

		if(empty($_POST['email'])){
			echo "Olvidó escribir su email";
		}else{

			$email = $_POST['email'];
			$mirar = "SELECT * FROM registro WHERE email = '$email'";
			$miraResult = mysqli_query($conexion, $mirar);
			$existe = mysqli_fetch_assoc($miraResult);
			$k_email = $existe['email'];

			if(strtolower($k_email) == strtolower($email)){
						//Generamos nueva contraseña y enviamos email. Actualizamos la contraseña en la base de datos
		
				$better_token = uniqid(mt_rand(), true);
				$better_token = substr($better_token, 0, 6);
				$better_token_cod = md5($better_token);

				$res = "UPDATE registro SET contrasena = '$better_token_cod' WHERE email = '$email'";

				if (mysqli_query($conexion, $res)) {

					$asunto = "Recuperación de contraseña";
		    		$mensaje = "Su nueva contraseña es: $better_token";
    						
    				mail($email, $asunto, $mensaje);

    				echo "<script> alert('Contraseña modificada con éxito. En breve recibirá un email con su nueva contraseña');
					 window.open('pagina_login.php','_self');
					 </script>";
		    					
				}else{
   					echo "Error modificando su contraseña ";
				}

			}else{
				echo "El email introducido no existe";
		}				
	}
}

?>

 <?php include 'footer.php'; ?>

</body>
</html>