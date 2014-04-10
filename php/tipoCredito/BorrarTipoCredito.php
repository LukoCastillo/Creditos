<?php 
 #Obtener valor mediante el metodo post
$nombreTipoCredito=$_POST['slc_tipoCredito'];

if($nombreTipoCredito==""){
	//Error Seleccionar el tipo de credito
 $mensajeTC="<div  class=\"error\">Seleccione el tipo de credito a eliminar</div> ";
}else{
	// Crear consulta para eliminar y ejecutar

	$consulta="DELETE FROM tbltipocredito WHERE Nombre='$nombreTipoCredito'";
	 $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
	 
	 // Verificar si se realizo la consulta correctamente

	 if ($ejecutar_consulta)
  		  $mensajeTC= "<div  class=\"exito\">Se ha eliminado el tipo de credito</div>";
  		  else
  		  $mensajeTC=  "<div  class=\"error\">No se pudo eliminar el tipo de credito</div> ";
}
 	echo $mensajeTC;
 ?>