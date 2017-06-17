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
		$Name = stripslashes($_REQUEST['Name']); // removes backslashes
		$Name = mysqli_real_escape_string($con,$Name);
		$Lastname = stripslashes($_REQUEST['Lastname']); // removes backslashes
		$Lastname = mysqli_real_escape_string($con,$Lastname);
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (Name, Lastname, username, password, email, trn_date) VALUES ('$Name','$Lastname','$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'> <h3>Te registraste exitosamente.</h3> <br/>Has click aqui para <a href='login.php'>Iniciar sesion</a> </div>";
        }
    }else{
?>
<div class="container">
<h1>Buscar pieza</h1>
<form name="registration" action="/action_page.php" method="post">
 <input type="text" name="marca_auto" placeholder="Marca del auto" required /> <br>
<input type="text" name="modelo_auto" placeholder="Modelo del auto" required /> <br>
<input type="text" name="username" placeholder="Nombre de la pieza" required /> <br>
<input type="text" name="email" placeholder="# de serie de pieza" required /> <br>
<input type="text" name="password" placeholder="Descripcion de la pieza" required /> <br>
<input type="text" name="password" placeholder="Precio de venta" required /> <br>
<input type="text" name="password" placeholder="Cantidad de la pieza" required /> <br>
<input type="text" name="password" placeholder="Año de fabricación" required /> <br>
<input type="submit" name="submit" value="Buscar"/>
</form>
<br /><br />

</div>
<?php } ?>
</body>
</html>
