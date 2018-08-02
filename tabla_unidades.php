<?php
require_once "clases/conexion.php";

$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT sap_unidad,
tipo,
descripcion,
estado
FROM unidades";

$result=mysqli_query($conexion,$sql);

?>

<div class="container" >
   <table class="table table-hover table-condensed" id="iddatatable">
      <thead style="background-color: #dc3545;color:white; font-weight:bold;">
         <tr >
            <td>Numero sap</td>
            <td>Tipo</td>
            <td>Descripcion</td>
            <td>Estado</td>
            <td>Editar</td>
            <td>Eliminar</td>


         </tr>
      </thead>
      <tfoot style="background-color: #ccc;color:white; font-weight:bold;">
         <tr>
            <td>Numero sap</td>
            <td>Tipo</td>
            <td>Descripcion</td>
            <td>Estado</td>
            <td>Editar</td>
            <td>Eliminar</td>
         </tr>
      </tfoot>
      <tbody>
         <?php

         while ($mostrar=mysqli_fetch_row($result)) {
            if ($mostrar[3]==1) {
               $estado="Unidad automotriz activa";
            }else {
               $estado="Unidad automotriz inactiva";
            }

            ?>
            <tr >
               <td><?php echo $mostrar[0] ?></td>
               <td><?php echo $mostrar[1] ?></td>
               <td><?php echo $mostrar[2] ?></td>
               <td><?php echo $estado ?></td>

               <td style="text-align:center;">
                  <span  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregarFrmActualizar('<?php echo $mostrar[0] ?>')">
                     <span class="fa fa-edit"></span>
                  </span>
               </td>
               <td style="text-align:center;">
                  <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                     <span class="fa fa-trash"></span>
                  </span>

               </td>
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
