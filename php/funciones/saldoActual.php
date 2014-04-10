<?php 
/*
*	Archivo que contiene la funcion MostrarSaldo() y 'Depositos de la Caja()' <-- Cambiar esta funcion de aqui
*/

	# Funcion que se utilisa para mostrar el saldo actual que tiene la caja 
function MostrarSaldo(){
$conexion=conectarse();
		
		// Consulta para mostrar el saldo de la caja
		$consulta= "SELECT * FROM tblcaja WHERE id_caja=1";

		//Ejecutar consulta
		$ejecutar_consulta= $conexion->query(utf8_decode($consulta));

		while ($registro = $ejecutar_consulta-> fetch_assoc()) {
			//Guardar la informacion del saldo en la variable $val
			$val= $registro["Saldo"];
		}
		//Retornar la variable para su uso.
		return $val;
		$conexion->close();
}

 /*
 *	 Fucion que se utiliza para realizar el deposito del socio y guardar el registro dentro de la base de datos.
*	 de igual  manera se guarda el archivo en el servidor y la url dentro de la base de datos.
*/
function Deposito(){
$conexion=conectarse();

		//Funcion para realizar deposito.
		$slcNombre=$_POST['slc_nombreSocio'];
		$saldoDeposito=$_POST['txt_Deposito'];
		$Documento=$_FILES["Documento"]["name"];
		
		 /*
		 *	Obtener id del usuario para el registro a la tabla depositos
		 */
		$consulta="SELECT id_usuario From tblusuario WHERE Nombre= '$slcNombre' ";
		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));
		while ($registro = $ejecutar_consulta-> fetch_assoc()) {
			$idUsuario=$registro["id_usuario"];
		} 

		
		// Verificar si subio archivo
		if($Documento==""){
			$consulta="INSERT INTO tbldepositos(monto, fecha_deposito, id_usuario) VALUES ($saldoDeposito,CURDATE(),$idUsuario)";
		}else{

			/*
				* Guardar archivo del deposito en el servidor
			*/

		// Obtener extension del archivo para cambiar el nombre
    	$tipoD=explode(".",$Documento);
		$extension= end($tipoD);
		
		// Abrir carpeta de destino para guardar
		$destino="Documentos/DocNuevoDeposito/";
		opendir($destino);
		// cambiar nombre del archivo
		$num=1;
		$nombreDocumentos=str_replace(" ","", $slcNombre)."Deposito".$num.".".$extension;

		
		// Verificar si ya existe el nombre del archivo
		while(file_exists($destino.$nombreDocumentos)) {
			
			// Cambiar nombre
			$num=$num+1;
			$nombreDocumentos=str_replace(" ","", $slcNombre)."Deposito".$num.".".$extension;;
		}
		// Guardar Archivo en el servidor
		copy($_FILES["Documento"]["tmp_name"],$destino.$nombreDocumentos);

		// Obtener url, para guardarla en la base de datos
		$url=$destino.$nombreDocumentos;

		// Consulta para Guardar en la base de datos

			$consulta="INSERT INTO tbldepositos(monto, fecha_deposito, id_usuario, doc_deposito) VALUES ($saldoDeposito,CURDATE(),$idUsuario,'$url')";
			
		}

			
		// Ejecutar consulta de insercion
		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));

		//Verificar si se ejecuto
		 if ($ejecutar_consulta)
  		  $mensajeD= "<div  class=\"exito\">Se ha realizado un deposito </div>";
  		  else
  		  $mensajeD=  "<div  class=\"error\">No se pudo realizar el deposito</div>";


  		echo $mensajeD;
}


 ?>