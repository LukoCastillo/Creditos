<?php 
if($_SESSION['tipoUsuario']=="Administrador"){    
	include ('php/conexion.php');
 ?>

<div class="wrapper-AccionCaja">
	<h3>Modificar Tipo de credito</h3>
	<form id="ModificarTipoCredito" action="" method="POST">
		<label>Seleccione el tipo del credito</label>
		<select onchange="showUser(this.value,'tipoCredito')" name="slc_nombre">
			<option value="">Tipo Credito</option>
			<?php 
	     		# Obtener a todos los tipo de creditos del sistema
	     		include("php/select-option.php");
	     		selectTipoCredito();
	     	?>
		</select>

		<label>Nombre del tipo de credito</label>
		<input type="text" id="nombreTipoCredito" name="txt_nombreTipoCredito">
		<label>Descripcion</label>
		<textarea id="DescripcionTipoCredito" name="txtA_descripcion"></textarea>

		<div class="botones">
			<input type="submit" value="Modificar">
        	<input type="reset" value="Cancelar">
		</div>
	</form>
</div>
<?php 
	if(isset($_POST['txt_nombreTipoCredito'])){
  	include ('CambioTipoCredito.php');
	}
}else{
    header("Location:home.php");
}
 ?>