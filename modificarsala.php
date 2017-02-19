<?php

include 'config.php';
$url = $_SERVER['REQUEST_URI'];
$idsala = parse_url($url, PHP_URL_QUERY);
$bbddsala = mysqli_query($conexion, "SELECT * FROM salas WHERE id = " . $idsala);
$arraysala = $bbddsala->fetch_assoc();

if (session_status() == PHP_SESSION_NONE) {session_start();}

        if (
        (!isset($_SESSION['privilegios']))
        || 
                (isset($_SESSION['privilegios']) 
                && 
                ($_SESSION['privilegios'] == 2) 
                && 
                ($_SESSION['usuario'] != $arraysala['propietario']))
        )
    {
        die();
    }




?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificación de salas</title>	

	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,400,700" rel="stylesheet">


</head>
<body>

<div class="row" >
    
<?php 
      
    include "header_admin.php";
    $url = $_SERVER['REQUEST_URI'];
    $id = parse_url($url, PHP_URL_QUERY);
    $resultado = mysqli_query($conexion, "SELECT * FROM salas WHERE id='$id'");
    $bbddpropietarios = mysqli_query($conexion, "SELECT * FROM registro WHERE privilegios = 2");
    $row = mysqli_fetch_assoc($resultado);
    
    
?>

<div class="col-md-4 col-md-offset-4" id="estilo_modusuario">
<div  id="registro_sala">
	
		<h2 class="titulo2_admin">Modificación de sala</h2>
		<form method="POST" action="<?php echo('modificarsalascr.php?' . $id); ?>"  id="formregistro" name="registro">
			  <div class="form-group" >
                  <label>ID</label>
			    <input type="text" class="form-control" id="id" name="id" value="<?php echo($row["id"]); ?>" disabled>
			  </div>

			  <div class="form-group" >
                  <label>Nombre de la sala</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo($row["nombre"]); ?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{0,45}" required="required">
			  </div>
            
              <div class="form-group" >
                  <label>Subtítulo</label>
			  <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php echo($row["subtitulo"]); ?>">
			  </div>

			  <div class="form-group" >
                  <label>URL de la imagen</label>
			    <input type="text" class="form-control" id="urlimagen" name="urlimagen" value="<?php echo($row["urlimagen"]); ?>" pattern=".{,195}" required="required">
			  </div>

			  
			  <div class="form-group">
                  <label>Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" maxlength="295"></textarea>
                  <script>document.getElementById("descripcion").value = `<?php echo($row["descripcion"]); ?>`;
                  </script>
			  </div>
            
                <?php 
                    $propdelasala = $row['propietario'];
                    if (isset($_SESSION['privilegios']) && $_SESSION['privilegios'] < 3){
                        $movidota2 = "disabled";
                        }else{$movidota2 = "";}
                    ?>
            
                      <label>Asignar a propietario</label>
                      <div class="form-group" id="opciones">
                                    <?php echo('<select id="propietario" name="propietario" form="formregistro" ' . $movidota2 . ">"); ?>
                                      <option value="" <?php if($propdelasala == ""){echo ('selected');}?> >No</option>
                                        

                                        <?php while($arraypropietarios = $bbddpropietarios -> fetch_assoc())
                                                {   
                                                    if($propdelasala==$arraypropietarios['usuario'])
                                                    {
                                                        $movidota1 = 'selected';
                                                    }else{
                                                        $movidota1 = '';
                                                    }
                                                    echo('<option value="'.$arraypropietarios['usuario'].'" ' . $movidota1 . ">" . $arraypropietarios['usuario'] . '</option>');
                                                }
                                        ?>

                                    <?php echo("</select>"); ?> 
                        </div>

			<button type="submit" id="butt" class="btn btn-mio1_admin" name="modificar">Modificar sala</button> 				
		</form>

	</div>
  </div>
</div>
<!-- <?php include "footer.php"; ?> -->
</body>
</html>