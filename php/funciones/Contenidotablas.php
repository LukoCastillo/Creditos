<?php 
 // Funcion para mostrar contenido de la tabla Credito
function todosCreditos($cambio){
	$conexion=conectarse();
	// Estado del credito seleccionado
	$estado=str_replace("where Estado=","", $cambio);

	// Consulta para ejecutarla en la base de datos
	$consulta="SELECT t1.id_credito,t2.Nombre,t1.Fecha_limite, t1.FechaPagado, t1.Monto, t1.Estado ,t1.doc_credito FROM `tblcredito` as t1 
				inner join tbltipocredito as t2 on t1.id_tipoCredito=t2.id_tipoCredito
				$cambio
				order by Fecha_limite desc";
   //Ejecutar consulta
	$ejecutar_consulta= $conexion->query(utf8_decode($consulta));

	//Colocar valor por default para la fila
	$fila="<tr>";

	//Obtener todos los datos generados por la consulta

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {
		$fechaLimite=date("d/m/Y", strtotime($registro["Fecha_limite"]));
		$fechaPago=($registro["FechaPagado"]!="")?date("d/m/Y", strtotime($registro["FechaPagado"])): "";
		$Doc=($registro["doc_credito"]!="")? "<a href=\"".$registro["doc_credito"]."\"  target=\"_blank\" >Doc</a>" : "";
		// Validar la fila para aplicar estilos
		if($fila=="<tr>"){
			// Mostrar fila en la tabla
		echo $fila;
		$fila="<tr class=\"fila2\">";
		}else{	
		echo $fila;
		$fila="<tr>";
		}

		//Verificar el estado para aplicarle un link, solo si el credito esta por pagar o vencido.
		if($estado=="'por pagar'" or $estado=="'vencido'")
		$link=" <td><a href=\"?ac=ConfirmarPago&id=".$registro["id_credito"]."\">".$registro["Nombre"]."</a></td>";
		else
		$link="<td>".$registro["Nombre"]."</td>";

		//Mostrar toda la tabla
		echo  $link.
              "<td>".$fechaLimite."</td>
              <td>".$fechaPago."</td>
              <td>".$registro["Monto"]."</td>
              <td>".$registro["Estado"]."</td>
              <td>".$Doc."</td>
            </tr>";
	}
	$conexion->close();
}
 // Funcion para mostrar contenido de la tabla Deposito
function todosDepositos($str){
	$conexion=conectarse();

	if ($str!="") {
		$consulta="SELECT t2.Nombre,t1.fecha_deposito,t1.monto,t1.doc_deposito FROM `tbldepositos` as t1 inner join tblusuario as t2 on t1.id_usuario=t2.id_usuario 
        where t2.Nombre like '$str%' order by t1.fecha_deposito desc ";
	}else{
		$consulta="SELECT t2.Nombre,t1.fecha_deposito,t1.monto,t1.doc_deposito FROM `tbldepositos` as t1 inner join tblusuario as t2 on t1.id_usuario=t2.id_usuario order by t1.fecha_deposito desc";
	}
	
        $ejecutar_consulta= $conexion->query(utf8_decode($consulta));

        $fila="<tr>";

	while ($registro = $ejecutar_consulta-> fetch_assoc()) {
		$fechaDeposito=date("d/m/Y", strtotime($registro["fecha_deposito"]));
		$Doc=($registro["doc_deposito"]!="")?"<a href=\"".$registro["doc_deposito"]."\" target=\"_blank\">Doc</a>": "";

		if($fila=="<tr>"){
		echo $fila;
		$fila="<tr class=\"fila2\">";
		}else{	
		echo $fila;
		$fila="<tr>";
		}

		echo"<td>".$registro["Nombre"]."</td>
            <td>".$fechaDeposito."</td>
            <td>".$registro['monto']."</td>
            <td>".$Doc."</td>
         </tr>";
	}
	$conexion->close();

}
 ?>
