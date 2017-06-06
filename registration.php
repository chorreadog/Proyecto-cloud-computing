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
<title>Registrate</title>
<link rel="stylesheet" href="css/style.css" />
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
            echo "<div class='form'><h3>Te registraste exitosamente.</h3><br/>Has click aqui para <a href='login.php'>Iniciar sesion</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registro</h1>
<form name="registration" action="" method="post">
<input type="text" name="Name" placeholder="Nombres" required />
<input type="text" name="Lastname" placeholder="Apellido" required />
<input type="text" name="username" placeholder="Usuario" required />
<input type="email" name="email" placeholder="Correo" required />
<input type="password" name="password" placeholder="Contraseña" required />
<input type="submit" name="submit" value="Registrate" />
</form>
<br /><br />

</div>
<?php } ?>
</body>
</html>
