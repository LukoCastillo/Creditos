<?php 

   
    // Mostrar datos de la caja actual y datos de tablas
         include ('php/conexion.php');
         include ('php/funciones/saldoActual.php');
         include ("funciones/tablasHome.php");
 ?>
<h4>Bienvenido, <?php echo $_SESSION['nombre']; ?></h4>
<div id="wrapper-tablas">
   <!-- Menu de acciones -->
   <div class="tabla">
      <div id="menu-acciones">
         <h4>Dinero en caja: $ 
         <?php 
         echo MostrarSaldo();
          ?></h4>
         <?php 
            if($_SESSION['tipoUsuario']=="Administrador"){ 
                  echo "<a href=\"?ac=NuevoDeposito\" class=\"btn\">Nuevo Deposito</a>
                        <a href=\"?ac=NuevoCredito\" >Nuevo Credito</a> <br>
                        <a href=\"?ac=ConfirmarPago\">Confirmar pago credito</a>";
            }else{
                  echo "<a href=\"?ac=NuevoDeposito\" style=\"pointer-events: none;\"class=\"btn\">Nuevo Deposito</a>
                        <a href=\"?ac=NuevoCredito\"  style=\"pointer-events: none;\">Nuevo Credito</a> <br>
                        <a href=\"?ac=ConfirmarPago\" style=\"pointer-events: none;\">Confirmar pago credito</a>";

            }
          ?>
         
      </div>
   </div>
   <!-- tabla de proximos creditos a pagar-->
   <div class="tabla">
      <h4>Proximos creditos a pagar</h4>
      <table class="tablasHome">
         <thead>
            <tr>
               <td>Descripcion</td>
               <td>fecha limite</td>
               <td>Valor</td>
               <td>Documento</td>
            </tr>
         </thead>
         <tbody>
            <!-- Contenido proximos creditos a pagar -->
            <?php 
               tblProximosAPagar();
             ?>

         </tbody>
      </table>
      <a href="?ac=Creditos">ver todos..</a>
   </div>
   <!-- tabla de creditos pagados-->
   <div class="tabla">
      <h4>Creditos Pagados</h4>
      <table class="tablasHome">
         <thead>
            <tr>
               <td>Descripcion</td>
               <td>Fecha Pago</td>
               <td>Valor</td>
            </tr>
         </thead>
         <tbody>
            <!-- Contenido de tabla Creditos Pagados -->
            <?php 
               tblCreditosPagados();
             ?>
            
         </tbody>
      </table>
      <a href="?ac=Creditos">ver todos..</a>
   </div>
   <!-- tabla de Depositos-->
   <div class="tabla">
      <h4>Depositos</h4>
      <table class="tablasHome">
         <thead>
            <tr>
               <td>Socio</td>
               <td>Fecha Deposito</td>
               <td>Valor</td>
               <td>Documento</td>
            </tr>
         </thead>
         <tbody>
            <!-- Contenido de tabla Depositos -->
            <?php 
               tblDepositos();
             ?>
         </tbody>
      </table>
      <a href="?ac=Depositos">ver todos..</a>
   </div>
</div>