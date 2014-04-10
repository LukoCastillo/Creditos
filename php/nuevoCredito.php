<?php 

    /*
    * Es la vista para el formulario 
    * que se llenara para realizar un Nuevo Credito.
    */

if($_SESSION['tipoUsuario']=="Administrador"){ 
    include ('php/conexion.php');   
 ?>

<div class="wrapper-AccionCaja">
	 <h3>Nuevo Credito</h3>
	 <!-- form para enviar los nuevos depositos -->
	 <form method="POST" action="" enctype="multipart/form-data">

	 	<label>Tipo Credito:</label>
	 	<select name="slc_tipoCredito" required>
	 		<option value="">Seleccione..</option>
            <?php 
                # Obtener a todos los tipo de creditos del sistema
                include("php/select-option.php");
                selectTipoCredito();
             ?>
	 	</select>
        <label>Fecha Limite:</label>
        <input type="date" name="txt_fecha" required>
        <label>Monto:</label>
        <input type="number" name="monto" required>
        <label>Subir Archivo doc,jpg,pdf, con el combrobante</label>
        <input type="file" name="documento"> 
         <br>
        <div class="botones">
            <input type="submit" value="Guardar"/>
            <input type="reset" value="Cancelar"/>
        </div>
	 </form>
</div>

<?php 

if(isset($_POST['monto'])){
    # Incluir el archivo donde se encuentran las funciones ALtaCredito() y inspeccionCredito();
    include('php/funciones/creditos.php');
    #Esta funcion se utiliza para dar de alta el credito en la base de datos.
    AltaCredito();
    # Funcion que se utiliza para inspeccionar si el credito esta vencido o esta al dia.
    inspeccionCreditos();
} 
}else{
    header("Location:home.php");
}

 ?>