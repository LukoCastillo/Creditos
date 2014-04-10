<?php 
if($_SESSION['tipoUsuario']=="Administrador"){ 
	include ('php/conexion.php');
 ?>
</script>
<div class="wrapper-AccionCaja">
<h3>Modificar Usuario</h3>
	<form id="ModificarUsuario" method="post" action="">
	     <label>Seleccione Usuario</label>
	     <select onchange="showUser(this.value,'usuario')" name="nombreUsuario">
	     	<option value="">Usuario..</option>
	     	<?php 
	     		# Obtener a todos los Usuarios del sistema
	     		include("php/select-option.php");
	     		selectUsuario("todos");
	     	?>
	     </select>

         <label>Nombre</label>
		<input type="text" id="nombreUsuario" name="txt_nombreUsuario">

		<label>Tipo Usuario</label>
		<select id="tipoUsuario" name="slc_TipoUsuario">
			<option>Administrador</option>
			<option>Socio</option>
		</select>

		<label>Contraseña</label>
		<input type="password" name="txt_contrasena">

		<label>Confirmar Contraseña</label>
		<input type="password" name="txt_contrasenaConfirar">

 		<label>Correo electronico</label>
 		<input type="email" id="CorreoUsuario" name="txt_correo">
         <br>	
 		
 		<div class="botones">
        	<input type="submit" value="Modificar">
        	<input type="reset" value="Cancelar">
        </div>
	</form>
</div>
<?php 
	if(isset($_POST['txt_nombreUsuario'])){
  	include ('CambioUsuario.php');
	}
}else{
    header("Location:home.php");
}
 ?>