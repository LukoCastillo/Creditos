<?php 
if($_SESSION['tipoUsuario']=="Administrador"){    
 ?>

<div class="wrapper-AccionCaja">

	<h3>Agregar Nuevo tipo de credito</h3>

	<form id="NuevoTipoCredito" method="post" action="">

		<label>Nombre del tipo del credito:</label>
		<input type="text" name="txt_nombre">
		<label>Descripcion:</label>
		<textarea name="txtA_descripcion"></textarea>

		<div class="botones">
			<input type="submit" value="Agregar">
        	<input type="reset" value="Cancelar">
		</div>

	</form>

</div>

<?php 
	if(isset($_POST['txt_nombre'])){
  	include ('AltaTipoCredito.php');
	}
}else{
    header("Location:home.php");
}
 ?>