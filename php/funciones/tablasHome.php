<?php 
/*
* Archivo donde se guardar todas las funciones para mostras las tablas de Home dentro del archivo 'CajaActual'
*/

# Funcion para mostras el contenido de la tabla  proximos creditos a pagar (6 primeros)
function tblProximosAPagar(){
$conexion=conectarse();
$celdas=0;

	// Consulta para traer todos los creditos a pagar
	$consulta= "SELECT t1.id_credito,concat(t2.Nombre,', ',t2.descripcion) as Descripcion, t1.Fecha_limite,t1.Monto,t1.doc_credito FROM `tblcredito` 
	as t1 inner join `tbltipocredito` as t2 
	on t1.id_tipoCredito= t2.id_tipoCredito
	where t1.Fecha_limite >= CURDATE() and t1.Estado='por pagar'
	order by t1.Fecha_Limite";

	// Ejecutar Consulta
	$ejecutar_consulta= $conexion->query(utf8_decode($consulta));


	while ($registro = $ejecutar_consulta-> fetch_assoc() ) {
			$celdas=$celdas+1;
			// Solo colocar 6 celdas en la tabla

			if($celdas <= 6 ){
				//Verificar si el credito contiene documento
				$Doc=($registro["doc_credito"]!="")? "<a href=\"".$registro["doc_credito"]."\"  target=\"_blank\" >Doc</a>" : "";
				
				//Dar Formato a la fecha
				$fecha=date("d/m/Y", strtotime($registro["Fecha_limite"]));
				
				//Verificar la celda para darle un estilo
				if($celdas%2!=0)
				echo "<tr>";
				else
				echo "<tr class=\"fila2\">";
		  		echo "<td> <a href=\"?ac=ConfirmarPago&id=".$registro["id_credito"]."\">".$registro["Descripcion"]."</a></td>";
		  		echo "<td>".$fecha."</td>";
		  		echo "<td>".$registro["Monto"]."</td>";
		  		echo "<td>".$Doc."</td>";
		  		echo "</tr>";
			}
	}
	// Rellenar los campos vacios 
	for ($i=$celdas; $i < 6 ; $i++) { 
	echo "  <tr>
				<td>&nbsp</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>";
	}
}


// Funcion para mostras el contenido de la tabla  Depositos( 6 primeros )
function tblDepositos(){
$conexion=conectarse();
$celdas=0;

 	// Consulta para obtener los Depositos realizados
	$consulta="SELECT t2.Nombre, t1.fecha_deposito,t1.monto,t1.doc_deposito FROM `tbldepositos` as t1 inner join 
			tblusuario as t2 on t1.id_usuario=t2.id_usuario order by fecha_deposito desc";

		// Ejecutar Consulta
		$ejecutar_consulta= $conexion->query(utf8_decode($consulta));

		while ($registro = $ejecutar_consulta-> fetch_assoc() ) {
				$celdas=$celdas+1;
				// Solo colocar 6 celdas en la tabla

				if($celdas <= 6){
					$Doc=($registro["doc_deposito"]!="")? "<a href=\"".$registro["doc_deposito"]."\" target=\"_blank\">Doc</a>" : "";
					$fecha=date("d/m/Y", strtotime($registro["fecha_deposito"]));

					if($celdas%2!=0)
					echo "<tr>";
					else
					echo "<tr class=\"fila2\">";
			  		echo "<td>".$registro["Nombre"]."</td>";
			  		echo "<td>".$fecha."</td>";
			  		echo "<td>".$registro["monto"]."</td>";
			  		echo "<td>".$Doc."</td>";
			  		echo "</tr>";
				}
		}
		// Rellenar los campos vacios 
		for ($i=$celdas; $i < 6 ; $i++) { 
			echo " <tr>
				       <td>&nbsp</td>
				       <td></td>
				       <td></td>
				       <td></td>
	    		   </tr>";
		}

}


//Funcion para mostras el contenido de la tabla  creditos pagados (6 primeros)
function tblCreditosPagados(){
$conexion=conectarse();
$celdas=0;

	// Consulta para traer todos los creditos a pagados
	$consulta="SELECT concat(t2.nombre,', ',t2.descripcion) as Descripcion, t1.FechaPagado, t1.Monto from tblcredito as t1 inner join tbltipocredito as t2
		on t1.id_tipoCredito = t2.id_tipoCredito
		where t1.Estado='pagado' 
		order by FechaPagado desc" ;

	// Ejecutar Consulta
	$ejecutar_consulta= $conexion->query(utf8_decode($consulta));
	while ($registro = $ejecutar_consulta-> fetch_assoc() ) {
			$celdas=$celdas+1;
			// Solo colocar 6 celdas en la tabla

			if($celdas <= 6 ){
				$fecha=date("d/m/Y", strtotime($registro["FechaPagado"]));
				if($celdas%2!=0)
				echo "<tr>";
				else
				echo "<tr class=\"fila2\">";
		  		echo "<td>".$registro["Descripcion"]."</td>";
		  		echo "<td>".$fecha."</td>";
		  		echo "<td>".$registro["Monto"]."</td>";
		  		echo "</tr>";
			}
	}


  // Rellenar los campos vacios 
	for ($i=$celdas; $i <6 ; $i++) { 
		echo "  <tr>
		            <td>&nbsp</td>
		            <td></td>
		            <td></td>
                </tr>";
	}
}
 ?>
