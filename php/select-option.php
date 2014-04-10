<?php 
/*
*  Esta parte se utiliza para insertar las opciones dentro de las listas de opciones requeridos en el sistema.
* 	Listas dosde muestran los usuarios, tipos de creditos y creditos
*/


# Funcion para mostras las opciones con los nombres de los usuarios

 function selectUsuario($tipo){
$conexion=conectarse();
	
	#consulta para mostrar todos los usarios o solo los que son socios.
	# Esto se utiliza principalmente en la parte de Nuevo deposito

    if ($tipo=="todos") {
    	$consulta="SELECT Nombre FROM tblusuario ORDER BY Nombre";	
    }else{
    	$consulta="SELECT Nombre FROM tblusuario WHERE TipoUsuario='Socio' ORDER BY Nombre ";	
    }
	
	#Ejecutar consulta

	$ejecutar_consulta=$conexion->query($consulta);

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {
	echo "<option value='".utf8_decode($registro["Nombre"])."'>".utf8_decode($registro["Nombre"])."</option>";
	}
	$conexion->close();
}


# Funcion para mostras las opciones con los nombres de los tipo de creditos
function selectTipoCredito(){
$conexion=conectarse();

	#consulta para mostrar los tipos credito
	$consulta="SELECT Nombre FROM tbltipocredito ORDER BY Nombre";
	#ejecutar consulta
	$ejecutar_consulta=$conexion->query($consulta);

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {
	echo "<option value='".utf8_decode($registro["Nombre"])."'>".utf8_decode($registro["Nombre"])."</option>";
	}
	$conexion->close();
}


# Funcion para mostras las opciones con los nombres de los creditos
function selectCredito($id){
$conexion=conectarse();

	/*
	* El id se utiliza para ser mas especifico en la busqueda, al hacer clic en enlaces con el nombre 
	*del credito vencidos o por pagar , envian el id por medio del metodo GET y aqui los captura,
	*para realizar la consulta.
	* -- Si tiene id obtendra el credito espesifico y que su estado sea estado diferente a pagado
	* -- si no tiene id tendra todo los Creditos que su estado sea por pagar o Vencido
	*/

	if($id!=""){
		$buscar="t1.id_credito=".$id." and t1.Estado <> 'pagado'";
	}else{
		$buscar="t1.Estado='por pagar' or t1.Estado='vencido'";
	}

	# Consulta para mostrar los creditos
	$consulta="SELECT t2.Nombre, t1.id_credito FROM tblcredito AS t1 INNER JOIN tbltipocredito AS t2 ON t1.id_tipoCredito = t2.id_tipoCredito WHERE  $buscar" ;
	
	#Ejecutar consulta
	$ejecutar_consulta=$conexion->query($consulta);

	#Obtener los datos de la consulta
	while ($registro = $ejecutar_consulta-> fetch_assoc()) {
	echo "<option value='".utf8_decode($registro["id_credito"])."'>".utf8_decode($registro["Nombre"])."</option>";
	}
	$conexion->close();
}

 ?>
