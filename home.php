<?php 
error_reporting(E_ALL ^ E_NOTICE);

/* Inicio de sesion
*  Control de enlaces. 
* Mas informacion en  el docuemento controlPaginas dentro de la carpeta php
*/

session_start();
if($_SESSION['nombre']!=""){	
  include ('php/controlPaginas.php');	
 ?>	

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title><?php echo $titulo; ?></title>
      <script src="js/funciones.js"></script>
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
      <style>
         #fecha{
         text-align: right;
         }
      </style>
   </head>
   <body onload="startTime()">
      <div id="wrapper">
      <!-- cabecera (logo del sistema y menu de navegacion) -->
         <div class="header">
            <img src="img/js.jpg" class="img-logo">
            <!-- Inicio de menu de navegacion del sistema -->
            <div class="nav-bar">
               <ul>
                  <li><a href="home.php">Caja Actual</a></li>
                  <li><a href="?ac=Depositos">Depositos</a></li>
                  <li><a href="?ac=Creditos">Creditos</a></li>
                  <li><a href="#" onclick="mostrar('configuraciones')">Configuracion</a></li>
                  <li><a href="php/logOut.php" id="logout">Salir</a></li>
               </ul>

               <?php 
                    if($_SESSION['tipoUsuario']=="Administrador"){    
                ?>
                <!-- menu de configuraciones dessplegable-->
               <div id="configuraciones">
                  <a href="?ac=NuevoUsuario" class="submenu">Agregar Usuario</a>
                  <a href="?ac=ModificarUsuario" class="submenu">Modificar Usuario</a>
                  <a href="?ac=EliminarUsuario" class="submenu">Eliminar Usuario</a>
                  <a href="?ac=NuevoTipoCredito" class="submenu">Agregar tipo de credito</a>
                  <a href="?ac=ModificarTipoCredito" class="submenu">Modificar tipo de credito</a>
                  <a href="?ac=EliminarTipoCredito" class="submenu">Eliminar tipo de credito</a>
                  <a href="" class="submenu">Respaldo base de datos</a>
               </div>
               <?php 
                  }
                ?>
                
            </div> <!-- Final del menu -->
            <div id="fecha"><!-- Contenedor de la fecha y hora actual -->
               <p id="hora"></p>
            </div>
         </div> <!-- Final del la cabecera -->
         <div id="wrapper-contenido"> <!-- inicio del contenedor principal -->
            <?php 
               include ($contenido);
               ?>
            <div id="footer"></div>
         </div><!-- Final del contenedor -->
      </div>
   </body>
</html>   



<?php  
}else{

  /* 
  * En caso de que el usuario no haya iniciado sesion no podra acceder a la pagina.
  * Se le redireccionará a la pagina de index
  */

  header("Location:index.php");

  }
?>	
    

