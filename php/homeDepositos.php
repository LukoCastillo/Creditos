<!-- Contenido de home Depositos -->
<?php 

   /*
   *  Muestra la tabla donde se encuentran todo los depositos realizados.
   */
   include ('php/conexion.php');+
   #Incluir archivo donde se encuentra la funcion todosDepositos().
   include ('php/funciones/Contenidotablas.php');
 ?>
<h3>Depositos</h3>
<!-- Filtros para realizar la busquedas -->
<div class="filtros"> 
   <label>Buscar Socio:</label> <input type="search" onkeyup="busqueda(this.value,'Deposito')"> 
</div>
<!-- tabla de despliege de resultados de la busqueda -->
<div class="resultados">
   <TABLE class="tblResul">
      <thead>
         <tr>
            <th>Socio</th>
            <th>Fecha del deposito</th>
            <th>Valor</th>
            <th>Documento</th>
         </tr>
      </thead>
      <tbody id="tblbody">
         <?php 
            #  Funcion que muestra una tabla con todos los depositos realizados y guardados en la base de datos
            todosDepositos('');
          ?>
      </tbody>
   </TABLE>
</div>