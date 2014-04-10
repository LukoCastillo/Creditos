<?php 
/*
*   Validacion con la base de datos al usuario, contrasena y tipo de usuario.
*  Inicio de sesion del usuario ya registrado
*/


 session_start();

 include("conexion.php");

 $nombre=$_POST['nombre_txt'];
 $tipoUser=$_POST['tipo_User'];
 $contrasena=$_POST['pass_txt'];

 $contrasena=strtoupper($contrasena);
 $con=sha1($contrasena);

 $consulta="SELECT * FROM tblUsuario where Nombre='$nombre'";

if ($result = $conexion->query($consulta)) {

     // Validar si existe un usario, buscandolo con nombre 

  if($result->num_rows != 0){

     //  Obtener informacion necesaria del usuario
     
     while ($fila = $result->fetch_assoc()) {

        $nombreUsuario=$fila['Nombre'];
        $TipoUsuario=$fila['TipoUsuario'];
        $contrasenaUsuario=$fila['Contrasena'];


     //Validar contraseña y tipo de usuario

        $validaTipoUsuario=($TipoUsuario == $tipoUser ?  true: false);
        $validaContrasena= ($contrasenaUsuario == $con ? true: false);
        
    }

        // Verificar que error tiene el usuario

      if($validaContrasena != true){
           $mensaje=2;
      }elseif ($validaTipoUsuario !=true) {
         $mensaje=3;
      }else{
            $mensaje=1;
      }
      
      
  }else{
       $mensaje=4;  // no se encuentra en la base de datos
  }
     
   
    /* free result set */
    $result->close();
} 
  if($mensaje != 1){
     // Mostrar mensaje de error

  header("Location:../index.php?mensaje=$mensaje");
}else{
   /* Guardar nomebre del usuario
   *  Enviar a la pagina Principal
   */
   
	$_SESSION['nombre']=$nombreUsuario;
  $_SESSION['tipoUsuario']=$TipoUsuario;
   header("Location:../home.php");

   // Verificar creditos vencidos en la base de datos
   include ("funciones/creditos.php");
   inspeccionCreditos();
}
 ?>
