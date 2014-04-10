<?php 
    /*
    * Este archivo se utiliza para tener control de toda la paginacion y los enlaces de la pagina.
    * Dirigiendolos a su destino y mostrando su contendio.
    */

    # La variable ac se utiliza como accion(url de los enlaces a) que se obtiene a traves del metodo GET
  	$accion = $_GET['ac'];
  	switch ($accion) {
  		case 'Depositos':
  		       $titulo="Depositos";
  		       $contenido="php/homeDepositos.php";
  			break;
  		case 'Creditos':
  		      $titulo="Creditos";
  		      $contenido="php/homeCreditos.php";
  			break;
  		case 'NuevoDeposito':
  		      $titulo="Creditos";
  		      $contenido="php/nuevoDeposito.php";
  			break;
  		case 'NuevoCredito':
  		      $titulo="Creditos";
  		      $contenido="php/nuevoCredito.php";
  			break;	
  		case 'ConfirmarPago':
  		      $titulo="Creditos";
  		      $contenido="php/confirmarPago.php";
  			break;
        /* 
            * Acciones de configuracion del usuario
        */
        case 'NuevoUsuario':
            $titulo="Agregar Usuario";
            $contenido="php/Usuario/AgregarUsuario.php";
        break;
        case 'ModificarUsuario':
            $titulo="Modificar Usuario";
            $contenido="php/Usuario/ModificarUsuario.php";
        break;	
        case 'EliminarUsuario':
            $titulo="Eliminar Usuario";
            $contenido="php/Usuario/EliminarUsuario.php";
        break;
         /* 
            * Acciones de configuracion de tipo de credito
        */	
         case 'NuevoTipoCredito':
            $titulo="Agregar tipo Credito";
            $contenido="php/tipoCredito/AgregarTipoCredito.php";
        break;
        case 'ModificarTipoCredito':
            $titulo="Modificar tipo Credito";
            $contenido="php/tipoCredito/ModificarTipoCredito.php";
        break;  
        case 'EliminarTipoCredito':
            $titulo="Eliminar Tipo Credito";
            $contenido="php/tipoCredito/EliminarTipoCredito.php";
        break;
  		default:
  		     $titulo="Home";
  			 $contenido="php/cajaActual.php";
  			break;
  	}
   
 ?>