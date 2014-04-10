<?php 
	/*
	*	Controla y muestra los mensajes de error que se encuentran al iniciar sesion de iniciar sesion
	* (Si la contraseña es incorrecta, el tipo de usuario no es el correcto, Si no se encuentra registrado en el sistema).
	* 
	*/
if (isset($_GET["mensaje"])) {
   $Mensaje=$_GET['mensaje'];
 
 	switch ($Mensaje) {
 		case 2:
 			echo "<div class=\"error\">Verifique que contraseña este correcta </div>";
 		break;
 		case 3:
 			echo "<div class=\"error\">Verifique que el tipo de usuario sea correcto</div>";
 		break;
 		case 4:
 			echo "<div class=\"error\">Verifique que este registrado, o pongase en contacto con su administrador</div>";
 		break; 		
 	}

}

 ?>

 