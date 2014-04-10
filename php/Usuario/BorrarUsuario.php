<?php 
		// Obtener nombre a eliminar
	$nombreUsuario=$_POST['slc_user'];

	if($nombreUsuario!=""){

		//Conexion a base de datos
	include ("php/conexion.php");

	// Crear consultaa y ejecutar
	$consulta="DELETE FROM tblusuario WHERE Nombre='$nombreUsuario'";
	 $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
	 
	 // Verificar si se realizo la consulta correctamente

	 if ($ejecutar_consulta)
  		  $mensajeU= "<div  class=\"exito\">Se ha eliminado al Usurio</div>";
  		  else
  		  $mensajeU=  "<div  class=\"error\">No se pudo eliminar al Usurio</div> ";
    }else{
    	$mensajeU=  "<div  class=\"error\">Seleccione algun tipo de usuario</div> ";
    }
    
  	echo $mensajeU;

 ?>