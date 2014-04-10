<?php 
if($_SESSION['tipoUsuario']=="Administrador"){    
 ?>
<div class="wrapper-AccionCaja">
<h3>Agregar Usuario</h3>
	<form id="agregarUsuario" method="post" action="">

		<label>Nombre*</label>
		<input type="text" name="txt_nombreUsuario" required>

		<label>Tipo Usuario*</label>
		<select name="slc_TipoUsuario" required>
		    <option value="">--Tipo Usuario--</option>
			<option value="Administrador" >Administrador</option>
			<option value="Socio">Socio</option>
		</select>

		<label>Contraseña*</label>
		<input type="password" name="txt_contrasena" required>

		<label>Confirmar Contraseña*</label>
		<input type="password" name="txt_contrasenaConfirar" required>

 		<label>Correo electronico</label>
 		<input type="email" name="txt_correo">
         <br>
 		
 		<div class="botones">
        	
        	<input type="submit" value="Agregar">
        	<input type="reset" value="Cancelar">
        </div>
	</form>
</div>

<?php 
	if(isset($_POST['txt_nombreUsuario'])){
  	include ('AltaUsuario.php');
	}
 }else{
    header("Location:home.php");
}
 ?>
