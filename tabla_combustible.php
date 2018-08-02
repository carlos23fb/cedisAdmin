<?php
require_once "clases/conexion.php";

$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT sap_unidad,
fecha,
descripcion,
cantidad,
sap_empleado
FROM combustible";

$result=mysqli_query($conexion,$sql);

?>

<div class="container" >
   <table class="table table-hover table-condensed" id="iddatatable">
      <thead style="background-color: #dc3545;color:white; font-weight:bold;">
         <tr >
            <td>Sap unidad</td>
            <td>Fecha</td>
            <td>Descripcion</td>
            <td>Cantidad</td>
            <td>Sap empleado</td>



         </tr>
      </thead>
      <tfoot style="background-color: #ccc;color:white; font-weight:bold;">
         <tr>
            <td>Sap unidad</td>
            <td>Fecha</td>
            <td>Descripcion</td>
            <td>Cantidad</td>
            <td>Sap empleado</td>

         </tr>
      </tfoot>
      <tbody>
         <?php

         while ($mostrar=mysqli_fetch_row($result)) {


            ?>
            <tr >
               <td><?php echo $mostrar[0] ?></td>
               <td><?php echo $mostrar[1] ?></td>
               <td><?php echo $mostrar[2] ?></td>
               <td><?php echo $mostrar[3] ?></td>
               <td><?php echo $mostrar[4] ?></td>


            </tr>
            <?php
         }
         ?>

      </tbody>
   </table>

</div>

<script type="text/javascript">
$(document).ready(function() {
   $('#iddatatable').DataTable();

});
</script>
