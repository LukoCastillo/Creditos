<?php 
    
    # obtener valores a traves del metodo post

  $txt_nombre=$_POST['txt_nombreUsuario'];  
  $slc_Tipo=$_POST['slc_TipoUsuario'];
  $txt_contrasena=$_POST['txt_contrasena'];
  $txt_contrasena2=$_POST['txt_contrasenaConfirar'];
  $txt_correo=$_POST['txt_correo'];
  


  

 	// Confimar que la contrasena sea correcta

  if($txt_contrasena != $txt_contrasena2 ){
     //Contrasena incorrecta
  	$mensajeU="<div  class=\"error\">Contraseña incorrecta</div>";
  }else{
  	 include("php/conexion.php");
  	// Confirmar que el usuario no se encuentre registrado en la base de datos

     // convertir en mayusculas la contrasena y encriptarla
     $txt_contrasena=strtoupper($txt_contrasena);
     $cont=sha1($txt_contrasena);
     
     // Verificar conexion en la base de datos
     
      if ($conexion) {
 
      $consulta="SELECT * FROM tblusuario WHERE Nombre='$txt_nombre'";
     	$ejecutar_consulta=$conexion->query($consulta);
		  $num_regs=$ejecutar_consulta-> num_rows;

		  if ($num_regs != 0) {
 			  // Ya se encuentra un usuario con ese nombre
			 $mensajeU= "<div  class=\"error\">Ya existe un registro con ese nombre</div>";
		  }else{
  		  // Si se puede ejecutar el nuevo registro con ese nombre
  		  $consulta="INSERT INTO tblusuario (Nombre,TipoUsuario,Contrasena,Correo) VALUES('$txt_nombre','$slc_Tipo','$cont',' $txt_correo')";
  		  $ejecutar_consulta= $conexion->query(utf8_decode($consulta));
  		 /* 
  		 	* Verificar si se dio de alta Usuario 
  		 */
  		 if ($ejecutar_consulta)
  		  $mensajeU= "<div  class=\"exito\">Se ha dado de alta al Usurio</div>";
  		  else
  		  $mensajeU=  "<div  class=\"error\">No se pudo dar de alta al Usurio</div>";
		}
      }else{
      	$mensajeU=  "<div  class=\"error\">error en la conexion </div>";
      }

  }
  echo $mensajeU;
 ?>
