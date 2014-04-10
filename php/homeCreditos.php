<!-- Contenido de home Creditos -->
<?php 
   /*
   * Vista donde mostrara la tabla con toda la informacion de los creditos realizados 
   */
   include ('php/conexion.php');
    #Incluir archivo donde se encuentra la funcion todosCreditos().
   include ('php/funciones/Contenidotablas.php');
 ?>
<h3>Creditos</h3>

<!-- Filtros para realizar la busquedas -->
<div class="filtros">
   <label>Todos:    </label>  <input type="radio"   name="filtro_Creditos"  value="Todos"    onclick="tblfiltros(this.value,'Credito')"> 
   <label>Pagados:  </label>  <input type="radio"   name="filtro_Creditos"  value="pagados"  onclick="tblfiltros(this.value,'Credito')">
   <label>Por Pagar:</label>  <input type="radio"   name="filtro_Creditos"  value="PorPagar" onclick="tblfiltros(this.value,'Credito')">
   <label>Vencidos: </label>  <input type="radio"   name="filtro_Creditos"  value="vencidos" onclick="tblfiltros(this.value,'Credito')">
</div>

<!-- tabla de despliege de resultados de la busqueda-->
<div class="resultados">
   <TABLE class="tblResul">
      <thead>
         <tr>
            <th>Nombre</th>
            <th>Fecha Limite</th>
            <th>Fecha pagada</th>
            <th>Valor</th>
            <th>Estado</th>
            <th>Documento</th>
         </tr>
      </thead>
      <tbody id="tblbody">
         <!-- Contenido de la tabla creditos -->
         <?php 
           #  Funcion que muestra una tabla con todos los Creditos guardados en la base de datos.
           todosCreditos('');
          ?>
      </tbody>
   </TABLE>
</div>