<?php 
	/*
	* Funcion para  que el usuario pueda cerrar su sesion desde el boton de salir y lo redireccione a la pagina de index
	*/
session_start();
session_destroy();
header("Location:../index.php");
 ?>