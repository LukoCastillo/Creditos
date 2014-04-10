<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gestion de Creditos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
     <div id="wrapper">
     	 <div id="contenido-login">
     	 	<h2>Gestion de Creditos</h2>
        	<form id="login" name="login-form" action="php/validarUser.php" method="post">
        	<!--input nombre -->
          	   <label>Nombre:</label>
          	   <input type="text" id="nombre" name="nombre_txt" required>
          	<!--input nombre -->
          	   <label>Tipo Usuario:</label>
               <select name="tipo_User">
               	<option value="Administrador">Administrador</option>
               	<option value="Socio">Socio</option>
               </select>
             <!--input nombre -->
               <label for="pass">Contraseña:</label>
               <input type="password" id="pass" name="pass_txt" required>
               
                <input type="submit" value="Inicio">

        	</form> 
        	  
     	 </div>

     	 <?php
        /* 
          * Mensaje de error en caso de que exista
        */ 
                include ('php/mensajes.php');
          ?>
     </div> 
</body>
</html>