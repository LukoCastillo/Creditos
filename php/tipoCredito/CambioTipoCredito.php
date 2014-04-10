<?php 

  # obtener valores a traves del metodo post
$slc_nombre=$_POST['slc_nombre'];
$nombreTipoCredito=$_POST['txt_nombreTipoCredito'];
$descripcionTipoCredito=$_POST['txtA_descripcion'];

if ($slc_nombre=="") {
	$mensajeTC= "<div  class=\"error\">Seleccione el tipo de Credito</div> ";
}else{

	$consulta="UPDATE  tbltipocredito SET  Nombre=\"$nombreTipoCredito\", descripcion=\"$descripcionTipoCredito\" WHERE Nombre=\"$slc_nombre\"";

	//Verificar conexion a la base de datos
     if($conexion){
		 $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
		 /* 
  		 	* Verificar si se realizo cambios
  		 */
  		 if ($ejecutar_consulta)
  		  $mensajeTC= "<div  class=\"exito\">Se ha modificado el tipo de credito </div>";
  		  else
  		  $mensajeTC=  "<div  class=\"error\">No se pudo modificar el tipo de credito</div>";

     }else{
     	$mensajeTC=  "<div  class=\"error\">error en la conexion </div>";
     }
}

echo $mensajeTC;
 ?>