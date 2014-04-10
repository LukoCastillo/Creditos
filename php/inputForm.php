<?php 
/*
* Este archivo se hace llamar solo a traves de ajax mediante el archivo funciones.js dentro de la carpeta js.
* Te extrae los valores de la base de datos, necesarios para autocompletar un formulario.
*/
# conexion a la base de datos
include ("conexion.php");

#Obtener valores a partir de ajax
$str =$_GET['str'];
$tipoForm= $_GET['tipo'];

#Verificar el tipo de formulario.

if($tipoForm=="usuario"){
//Formulario de tipo "Usuario"

	//Crear Consulta y ejecutar consulta
	$consulta="SELECT * FROM tblusuario where Nombre='$str'";
	$ejecutar_consulta=$conexion->query($consulta);

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {

		//Obtener valores del usuario
		$nombreUser=$registro["Nombre"];
		$tipoUser=$registro["TipoUsuario"];
		$CorreoUser=$registro["Correo"];
	}

	$conexion->close();

	// Crear Objeto json
	$arrayUser = array('nombre' => $nombreUser, 'TipoUsuario' => $tipoUser, 'Correo' => $CorreoUser);
	echo json_encode($arrayUser);


}elseif($tipoForm=="tipoCredito"){
//Formulario de tipo "Tipo Credito"

	//Crear Consulta y ejecutar consulta
	$consulta="SELECT * FROM tbltipocredito where Nombre='$str'";
	$ejecutar_consulta=$conexion->query($consulta);

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {

		//Obtener valores del tipo de credito
		$nombreTipoCredito=$registro["Nombre"];
		$DescripcionTipoCredito=$registro["descripcion"];
	}

	$conexion->close();

	// Crear Objeto json
	$arrayUser = array('nombre' => $nombreTipoCredito, 'descripcion' => $DescripcionTipoCredito);
	echo json_encode($arrayUser);


}elseif($tipoForm=="EliminarUsuario"){
/*
*   Formulario de tipo "Eliminar Usuario"
*	Este se utiliza para mostrar los usuarios dependiendo si son de tipo socio o administrador.
* 	Utilizado para eliminar usuario de un sistema.
*/    
     //Crear Consulta y ejecutar consulta
     $consulta="SELECT Nombre FROM tblusuario where TipoUsuario='$str'";
     $ejecutar_consulta=$conexion->query($consulta);


	while ($registro = $ejecutar_consulta-> fetch_assoc()) {

		//Mostrar los usuarios de ese tipo
		echo "<option value=\"". $registro["Nombre"]."\">".$registro["Nombre"]."</option>";
	}

	$conexion->close();
		
} elseif ($tipoForm=="Credito") {
/*
*	Formulario de tipo "CREDITO"
*	Se utiliza para mostrar el monto del credito dependiendo del Credito seleccionado, se utiliza para pagar credito
*/
	//Crear Consulta y ejecutar consulta
	$consulta="SELECT Monto From tblcredito where id_credito ='$str'";
	$ejecutar_consulta=$conexion->query($consulta);

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {

		//Mostrar del monto del credito seleccionado
		echo $registro["Monto"];
	}
}
 ?>


