<?php 
if($_SESSION['tipoUsuario']=="Administrador"){ 
	include ('php/conexion.php');   
 ?>
<div class="wrapper-AccionCaja">
<h3>Eliminar tipo Credito</h3>
	<form id="EliminarTipoCredito" method="POST" action="">
		<label>Seleccione el tipo de credito a eliminar</label>
 	 <select name="slc_tipoCredito">
 	 	<option value="">--Tipo Cretido--</option>
 	 	<?php 
	     		# Obtener a todos los tipo de creditos del sistema
	     		include("php/select-option.php");
	     		selectTipoCredito();
	     	?>
 	 </select>
 	 <div class="botones">
 	 		<input type="submit" value="Eliminar">
        	<input type="reset" value="Cancelar">
 	 </div>
	</form>
</div>
<?php 
	if(isset($_POST['slc_tipoCredito'])){
  	include ('BorrarTipoCredito.php');
	}
}else{
    header("Location:home.php");
}
 ?>