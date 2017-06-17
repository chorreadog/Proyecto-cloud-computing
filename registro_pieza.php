<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['marca_auto'])){
		$marca_auto = stripslashes($_REQUEST['marca_auto']); // removes backslashes
		$marca_auto = mysqli_real_escape_string($con,$marca_auto);
		$modelo_auto = stripslashes($_REQUEST['modelo_auto']); // removes backslashes
		$modelo_auto = mysqli_real_escape_string($con,$modelo_auto);
		$nombre_pieza = stripslashes($_REQUEST['nombre_pieza']); // removes backslashes
		$nombre_pieza = mysqli_real_escape_string($con,$nombre_pieza); //escapes special characters in a string
		$num_spieza = stripslashes($_REQUEST['num_spieza']);
		$num_spieza = mysqli_real_escape_string($con,$num_spieza);
		$desc_pieza = stripslashes($_REQUEST['desc_pieza']);
		$desc_pieza = mysqli_real_escape_string($con,$desc_pieza);
    $precio_venta = stripslashes($_REQUEST['precio_venta']);
		$precio_venta = mysqli_real_escape_string($con,$precio_venta);
    $cantidad_pieza = stripslashes($_REQUEST['cantidad_pieza']);
		$cantidad_pieza = mysqli_real_escape_string($con,$cantidad_pieza);
    $año_fabricacion = stripslashes($_REQUEST['año_fabricacion']);
    $año_fabricacion = mysqli_real_escape_string($con,$año_fabricacion);


        $query = "INSERT into `registro_pieza` (marca_auto, modelo_auto, nombre_pieza, num_spieza, desc_pieza, precio_venta, cantidad_pieza, año_fabricacion) VALUES ('$marca_auto','$modelo_auto','$nombre_pieza', '$num_spieza', '$desc_pieza', '$precio_venta',''$cantidad_pieza','$año_fabricacion')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'> <h3>Tu pieza fue registrada exitosamente.</h3> <br/>Has click aqui para <a href='index.php'>regresar al menu</a> </div>";
        }
    }else{
?>
<div class="container">
<h1>Registro de pieza</h1>
<form name="registration" action="/action_page.php" method="post">
<input type="text" name="marca_auto" placeholder="Marca del auto" required /> <br>
<input type="text" name="modelo_auto" placeholder="Modelo del auto" required /> <br>
<input type="text" name="nombre_pieza" placeholder="Nombre de la pieza" required /> <br>
<input type="text" name="num_spieza" placeholder="# de serie de pieza" required /> <br>
<input type="text" name="desc_pieza" placeholder="Descripcion de la pieza" required /> <br>
<input type="text" name="precio_venta" placeholder="Precio de venta" required /> <br>
<input type="text" name="cantidad_pieza" placeholder="Cantidad de la pieza" required /> <br>
<input type="text" name="año_fabricacion" placeholder="Año de fabricación" required /> <br>
<input type="submit" name="submit" value="Registrar"/>
</form>
<br /><br />

</div>
<?php } ?>
</body>
</html>
