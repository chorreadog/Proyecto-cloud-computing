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
    if (isset($_REQUEST['username'])){
		$marca_auto = stripslashes($_REQUEST['Name']); // removes backslashes
		$marca_auto = mysqli_real_escape_string($con,$Name);
		$modelo_auto = stripslashes($_REQUEST['Lastname']); // removes backslashes
		$modelo_auto = mysqli_real_escape_string($con,$Lastname);
		$nombre_pieza = stripslashes($_REQUEST['username']); // removes backslashes
		$nombre_pieza = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$num_spieza = stripslashes($_REQUEST['email']);
		$num_spieza = mysqli_real_escape_string($con,$email);
		$desc_pieza = stripslashes($_REQUEST['password']);
		$desc_pieza = mysqli_real_escape_string($con,$password);
    $precio_venta = stripslashes($_REQUEST['password']);
		$precio_venta = mysqli_real_escape_string($con,$password);
    $cantidad_pieza = stripslashes($_REQUEST['password']);
		$cantidad_pieza = mysqli_real_escape_string($con,$password);
    $año_fabricacion = mysqli_real_escape_string($con,$password);
    $año_fabricacion = stripslashes($_REQUEST['password']);

        $query = "INSERT into `users` (Name, Lastname, username, password, email, trn_date) VALUES ('$Name','$Lastname','$username', '".md5($password)."', '$email', '$trn_date')";
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
