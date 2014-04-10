<?php 
   // incluir conexion a base de datos y funcion para el contenido de tablas

	include ('../conexion.php');
	include ('Contenidotablas.php');

// Obtener atributos tipo de filtro y valor

	$tipoFiltro=$_GET['tipo'];
	$valor=$_GET['valor'];

	if($tipoFiltro=="Credito"){
		// Tipo de filto Credito
		MostrarCreditos($valor);
	}elseif($tipoFiltro=="Deposito"){
		//Tipo de filtro Deposito
		MostrarDepositos($valor);
	}

	// Funciones para mostrar el contenido de la tabla

	function MostrarCreditos($valor){
		switch ($valor) {
			case 'pagados':
					// Consulta para obtener los creditos Pagados
					$cambio="where Estado='pagado'";
				break;
			case 'PorPagar':
					// Consulta para obtener los creditos Por Pagar
					$cambio="where Estado='por pagar'";
			break;
			case 'vencidos':
					// Consulta para obtener los creditos Vencidos
					$cambio="where Estado='vencido'";

			break;
			default:
				$cambio="";
			break;
		}
		todosCreditos($cambio);

	}
	// Funciones para mostrar el contenido de la busqueda
	function MostrarDepositos($valor){
		todosDepositos($valor);
	}
 ?>