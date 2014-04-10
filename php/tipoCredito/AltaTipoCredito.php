<?php 
	 # obtener valores a traves del metodo post

  $txt_nombre=$_POST['txt_nombre'];  
  $txtA_descripcion=$_POST['txtA_descripcion'];
  
  	if($txt_nombre!=""){
  		include ("php/conexion.php");
  			// Verificar si ya existe un tipo de credito igual

  		$consulta="SELECT * FROM tbltipocredito WHERE Nombre='$txt_nombre'";
     	$ejecutar_consulta=$conexion->query($consulta);
		 $num_regs=$ejecutar_consulta-> num_rows;

		  if ($num_regs != 0) {

 			  // Ya se encuentra un tipo de credito con ese nombre

			 $mensajeTC= "<div  class=\"error\">Ya existe un registro con ese nombre</div>";
		  }else{
  		  // Si se puede ejecutar el nuevo registro con ese nombre
  		  $consulta="INSERT INTO tbltipocredito (Nombre,descripcion) VALUES('$txt_nombre','$txtA_descripcion')";
  		  $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
  		 /* 
  		 	* Verificar si se dio de alta Usuario 
  		 */
  		 if ($ejecutar_consulta)
  		  $mensajeTC= "<div  class=\"exito\">Se ha dado de alta el tipo de credito</div>";
  		  else
  		  $mensajeTC=  "<div  class=\"error\">No se pudo dar de alta el tipo de credito</div>";
		}

  	}else{
  		$mensajeTC="<div  class=\"error\">No se pudo dar de alta el tipo de credito</div>";
  	}
  	echo $mensajeTC;
 ?>