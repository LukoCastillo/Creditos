<?php 
    /*
    * Muestra el formulario para confirmar del pago de un credito
    */
    # Es un funcion que solos los administradores.
    if($_SESSION['tipoUsuario']=="Administrador"){  
    include ('php/conexion.php');  
 ?>

<div class="wrapper-AccionCaja">
	 <h3>Confirmar Pago Credito</h3>

	 <!-- form para enviar los nuevos depositos -->
	 <form action="" method="POST">
	 	<label>Credito Vigente</label>
	 	<select name="slc_credito" onchange="showUser(this.value,'Credito')" required>
	 		<option value="">Seleccione..</option>
            <?php 
                
                //Mostrar lista con los nombres de los creditos
                include('select-option.php');
                // Funcion seleccionar credito. Mayor informacion archivo 'select-option.php'
                selectCredito($_GET['id']);

             ?>
	 	</select>

        <label>Dinero en caja</label>
        <input type="text"  value="<?php
            include ("funciones/saldoActual.php");
            echo MostrarSaldo();
         ?>" disabled name="txt_saldo">
        
         <label>Valor Credito</label>
        <input type="text" id="valorCredito" name="txt_valor"  readonly="readonly" />
         <br>
        <div class="botones" >
        	<input type="submit" value="Confirmar"/>
            <input type="reset" value="Cancelar"/>
        </div>
	 </form>
</div>
<?php 
   if(isset($_POST['slc_credito'])){
    #incluir archivo donde contiene la funcion pagarCredito()
    include('php/funciones/creditos.php');

    #Esta funcion se utiliza para hacer un update a los creditos que se confirmaron pagados
    pagarCredito();
    }
}else{
    #Si no es administrador redirigir a la pagina home
    header("Location:home.php");
}

 ?>