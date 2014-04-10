<?php
   

  # obtener valores a traves del metodo post
  $nombreUsuario=$_POST['nombreUsuario'];
  $txt_nombre=$_POST['txt_nombreUsuario'];  
  $slc_Tipo=$_POST['slc_TipoUsuario'];
  $txt_contrasena=$_POST['txt_contrasena'];
  $txt_contrasena2=$_POST['txt_contrasenaConfirar'];
  $txt_correo=$_POST['txt_correo'];

 // Confirmar si no hubo cambios en la contrasena
  if($txt_contrasena!=""){

  	  // Confimar que la contrasena sea correcta

  	 if($txt_contrasena != $txt_contrasena2 ){
     	//Contrasena incorrecta
  		$mensajeU="<div  class=\"error\">Contraseña incorrecta</div>";
  	}else{
  		//Contrasena correcta
  	 	
  	 	// convertir en mayusculas la contrasena y encriptarla
  	 	$txt_contrasena=strtoupper($txt_contrasena);
     	$cont=sha1($txt_contrasena);
     	$consulta="UPDATE tblusuario SET Nombre='$txt_nombre',TipoUsuario='$slc_Tipo',Contrasena='$cont',Correo='$txt_correo' WHERE Nombre='$nombreUsuario'";
 	}
  }else{
  	// No se hizo cambio de contrasena
  		$consulta="UPDATE tblusuario SET Nombre='$txt_nombre',TipoUsuario='$slc_Tipo',Correo='$txt_correo' WHERE Nombre='$nombreUsuario'";

  }

	//Verificar conexion a la base de datos
     if($conexion){
		 $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
		 /* 
  		 	* Verificar si se realizo cambios
  		 */
  		 if ($ejecutar_consulta)
  		  $mensajeU= "<div  class=\"exito\">Se ha modificado al Usurio</div>";
  		  else
  		  $mensajeU=  "<div  class=\"error\">No se pudo modificar al Usurio</div> ";

     }else{
     	$mensajeU=  "<div  class=\"error\">error en la conexion </div>";
     }
  echo $mensajeU;
 ?>