<?php 
function AltaCredito(){
	$conexion=conectarse();
	// Variables para dar de alta el nuevo credito

	$slcTipoCredito=$_POST['slc_tipoCredito'];
	$monto=$_POST['monto'];
	$Documento=$_FILES["documento"]["name"];
	$fecha=$_POST['txt_fecha'];

		 /*
		 *	Obtener id del tipo credito  para el registro a la tabla Credito
		 */
		$consulta="SELECT id_tipoCredito From tbltipocredito WHERE Nombre= '$slcTipoCredito' ";
		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));
		while ($registro = $ejecutar_consulta-> fetch_assoc()) {
			$idTipoCredito=$registro["id_tipoCredito"];
		} 

	//Verificar si subieron documento

	if ($Documento=="") {
		// Consulta para Credito sin documento
$consulta="INSERT INTO tblcredito(`id_tipoCredito`, `Monto`, `Fecha_limite`, `Estado`) VALUES ($idTipoCredito,$monto,'$fecha','por pagar')";
		
	}else{
		//Consulta para credito con documento
		
		/*
				* Guardar archivo del deposito en el servidor
		*/

		// Obtener extension del archivo para cambiar el nombre
    	$tipoD=explode(".",$Documento);
		$extension= end($tipoD);
		
		// Abrir carpeta de destino para guardar
		$destino="Documentos/DocNuevoCredito/";
		opendir($destino);
		// cambiar nombre del archivo
		$num=1;
		$nombreDocumentos=str_replace(" ","", $slcTipoCredito)."-Credito-".$num.".".$extension;

		
		// Verificar si ya existe el nombre del archivo
		while(file_exists($destino.$nombreDocumentos)) {
			
			// Cambiar nombre
			$num=$num+1;
			$nombreDocumentos=str_replace(" ","", $slcTipoCredito)."-Credito-".$num.".".$extension;;
		}
		// Guardar Archivo en el servidor
		copy($_FILES["documento"]["tmp_name"],$destino.$nombreDocumentos);

		// Obtener url, para guardarla en la base de datos
		$url=$destino.$nombreDocumentos;

		// Consulta para Guardar en la base de datos
		$consulta="INSERT INTO tblcredito(`id_tipoCredito`, `Monto`, `Fecha_limite`, `Estado`,`doc_credito`) VALUES ($idTipoCredito,$monto,'$fecha','por pagar','$url')";
	}

		// Ejecutar consulta de insercion
		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));

		//Verificar si se ejecuto
		 if ($ejecutar_consulta)
  		  $mensajeC= "<div  class=\"exito\">Se ha agregado un nuevo credito </div>";
  		  else
  		  $mensajeC=  "<div  class=\"error\">No se pudo agregar el nuevo credito</div>";


  		echo $mensajeC;


}
 // Funcion para obtener el monto del credito deseado.

function montoCredito($id){
$conexion=conectarse(); 

$consulta= "SELECT * FROM tblcredito WHERE id_credito=$id";

$ejecutar_consulta= $conexion->query(utf8_decode($consulta));

while ($registro = $ejecutar_consulta-> fetch_assoc()) {
	$val= $registro["Monto"];
}
		return $val;
		$conexion->close();

}

// funcion pagar el Credito

function pagarCredito(){
	$conexion=conectarse();

	$slc_credito=$_POST['slc_credito'];
	$monto=montoCredito($slc_credito);
	$saldo=MostrarSaldo();

	// Verificar que el monto del credito es menor al saldo en caja

	 if($saldo >= $monto){
	 		// modificar estatus del credito como pagado

	 	$consulta="UPDATE `tblcredito` SET `fechaPagado`=CURDATE() ,`Estado`='pagado' WHERE id_credito='$slc_credito'";
		// Ejecutar consulta del credito

		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));
		//Ejecutar consulta del cambio de saldo en caja
		$consulta="UPDATE `tblcaja` SET `Saldo`=`Saldo`-$monto";
		// Ejecutar consulta del cambio del  saldo en caja
		$ejecutar_consulta=$conexion->query(utf8_decode($consulta));

		  $mensajePago= "<div  class=\"exito\">Se ha confirmado el pago con exito</div>";
	 }else{
	 	// Mensaje de error ( El monto del credito es mayor que el saldo en caja)
	 	$mensajePago= "<div  class=\"error\">No cuenta con suficiente saldo en caja</div>";
	 }
	 

echo $mensajePago;
		
}

	/*
		* Funcion para inspeccionar creditos vencidos
	*/
function inspeccionCreditos(){
	$conexion=conectarse();

	$consulta="UPDATE `tblcredito` SET  `Estado`='vencido' WHERE Fecha_limite < CURDATE() and Estado != 'pagado'";
	$ejecutar_consulta=$conexion->query(utf8_decode($consulta));
}

 ?>