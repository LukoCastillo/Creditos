<?php 
if($_SESSION['tipoUsuario']=="Administrador"){    
 ?>

<div class="wrapper-AccionCaja">
 <form id="EliminarUsuario" action="" method="post">
 	 <h3>Eliminar Usuario</h3>
 	 <label>Tipo de Usuario</label>
 	 <select onchange="showUser(this.value,'EliminarUsuario')">
 	 	<option value="">--Tipo Usuario--</option>
 	 	<option>Administrador</option>
 	 	<option>Socio</option>
 	 </select>
 	  <label>Seleccione Usuario</label>

 	  
 	  	<select id="slc_user" name="slc_user">
 	  	<option value="">Usuarios</option>
 	  	</select>
 	
 	  <div class="botones">
 	  		<input type="submit" value="Eliminar">
        	<input type="reset" value="Cancelar">
 	  </div>
 </form>
</div>
<?php 
	if(isset($_POST['slc_user'])){
  	include ('BorrarUsuario.php');
	}
}else{
    header("Location:home.php");
}
 ?>