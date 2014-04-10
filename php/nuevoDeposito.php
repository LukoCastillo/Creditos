<?php 
    /*
    * Es la vista para el formulario 
    * que se llenara para realizar el nuevo deposito de los socios.
    */

if($_SESSION['tipoUsuario']=="Administrador"){ 
    include ('php/conexion.php');
 ?>

<div class="wrapper-AccionCaja">
	 <h3>Nuevo Deposito</h3>
	 <!-- form para enviar los nuevos depositos -->
	 <form method="POST" action="" enctype="multipart/form-data">
	 	<label>Socio</label>
	 	<select name="slc_nombreSocio" required>
	 		<option value="">Seleccione..</option>
            <?php 
                # Obtener todo los socios de la base de datos.
                include ('select-option.php');
                selectUsuario("socios");
             ?>
	 	</select>

        <label>Monto</label>
        <input type="number" name="txt_Deposito" required>
        <label>Subir Archivo doc,jpg,pdf, con el combrobante</label>
        <input type="file" name="Documento"> 
         <br>
        <div class="botones">
        	<input type="submit" value="Agregar"/>
            <input type="reset" value="Cancelar"/>
        </div>
	 </form>
</div>
<?php
if(isset($_POST['txt_Deposito'])){

    # Incluir el archivo donde se encuentra la funcion Deposito();
    include('php/funciones/saldoActual.php');
    #Mandar a llamar la funcion para Guardar el deposito dentro de la base de datos
    Deposito();
} 
}else{
    header("Location:home.php");
}
 ?>