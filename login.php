<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio de Sesion</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
				//seleccionar todo de la tabla users
		$result = mysqli_query($con,$query) or die(mysql_error());
		//metodo query toma un parametro que es un sql query
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }
		 else{
				echo "<div class='form'><h3>Usuario o contraseña incorrecta.</h3><br/>Has click aqui para <a href='login.php'>Reingresar tu cuenta</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Inicio de Sesion</h1>
<form action="" method="post" name="Inicio de Sesion">
<input type="text" name="username" placeholder="Usuario" required />
<input type="password" name="password" placeholder="Contraseña" required />
<input name="submit" type="submit" value="Inicio de Sesion" />
</form>
<p> No te has registrado aun? <a href='registration.php'>Registrate aqui</a></p>


</div>
<?php } ?>


</body>
</html>
