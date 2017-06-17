<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/


$con = mysqli_connect("localhost","root","","register");
/*
declaras una variable "con",
como un objeto mysqli. le pasamos los parametros.
Register es la base de datos a la que nos estamos conectando.
*/

// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//Si algo esta mal, como el registro o el root user, entonces corre el if statement.
?>
