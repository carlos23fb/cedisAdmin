
<?php require 'clases/header.php'; ?>
<?php require_once "clases/conexion.php"; ?>
<?php require 'scripts.php';
$obj= new conectar();
$conexion=$obj->conexion();

$sqltipo="SELECT id_tipo,tipo
FROM tipo_empleado ";
$resultipo =mysqli_query($conexion,$sqltipo);

$sqlpuesto="SELECT id_puesto,
puesto
FROM puesto";
$resultpuesto=mysqli_query($conexion,$sqlpuesto);
?>
<br>

<div class="container" >
   <div class="row">
      <div class="col-sm-33">
         <div class="card text-left">
            <div class="card-header">
               Unidades en mantenimiento
            </div>
            <div class="card-body">

               <h2>Lista de unidades automotrices inactivas</h2>
               <hr>
               <div id="tablaDatatable">

               </div>

            </div>
            <div class="card-footer text-muted">
               CEDIS VILLA HIDALGO
            </div>
         </div>
      </div>

   </div>

</div>


<!-- Modal Agregar-->
<div class="modal fade" id="agregarnuevosdatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva entrega de Enfriador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form   id="frmnuevo" method="post">

               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="sap">Numero Sap</label>
                     <input type="text" class="form-control" name="sap"   id="sap">
                  </div>
                  <div class="form-group col-md-7">
                     <label for="tipo">Tipo</label>
                     <input type="text" class="form-control" name="tipo"  id="tipo">
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="descripcion">Descripcion</label>
                     <input type="text" class="form-control" name="descripcion"   id="descripcion">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="numeroruta">Estado</label>
                     <select class="form-control" name="estado" id="estado">
                        <option value="1">Unidad automotriz activa</option>
                        <option value="0">Unidad automotriz inactiva</option>

                     </select>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnAgregarnuevo" class="btn btn-primary">Guardar</button>
               </div>
            </form>

         </div>

      </div>
   </div>
</div>


<!-- Modal Modificar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reportar o dar de alta la unidad </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form  action="generar_reporte.php" method="post">
            <input type="number" hidden="" name="idunidad" id="idunidad">
            <button type="submit"  class="btn btn-primary">Reportar mantenimiento de la unidad automotriz</button>
            

         </form>
         <form   id="frmnuevoU"  method="post">


              <input type="number" hidden="" name="idunidad" id="idunidad">
              <br>
              <hr>

                 <div class="form-group col-md-7">
                    <label for="estadoU">Estado</label>
                    <select  class="form-control" name="estadoU" id="estadoU">
                       <option value="1">Unidad automotriz activa</option>
                       <option value="0">Unidad automotriz inactiva</option>

                    </select>
              </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btnActualizar" class="btn btn-success">Dar de Alta</button>
            </div>
         </form>
      </div>

    </div>
  </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
   $('#frmnuevo')[0].reset();
   $('#btnAgregarnuevo').click(function(){

      datos=$('#frmnuevo').serialize();

      $.ajax({
         type:"POST",
         data:datos,
         url:"procesos/registrar_unidad.php",
         success:function(r){
            if(r==1){
               $('#frmnuevo')[0].reset();
               $('#tablaDatatable').load('tabla_unidades_mantenimiento.php');
               alertify.success("Unidad agregada con exito");

            }else{
               alertify.error("Fallo al agregar la unidad");
            }
         }
      });
   });

   $('#btnActualizar').click(function() {
      datos=$('#frmnuevoU').serialize();

      $.ajax({
         type:"POST",
         data:datos,
         url:"procesos/darAlta_unidad.php",
         success:function(r){
            if(r==1){
               $('#tablaDatatable').load('tabla_unidades_mantenimiento.php');
               alertify.success("Unidad dada de alta con exito");

            }else{
               alertify.error("Fallo al actualizar la informacion de la unidad");
            }
         }


      });
   });

});



</script>


<script type="text/javascript">
$(document).ready(function(){

   $('#tablaDatatable').load('tabla_unidades_mantenimiento.php');
});

</script>


<script type="text/javascript">
   function agregarFrmActualizar(idunidad) {
      $.ajax({
         type:"POST",
         data:"idunidad=" + idunidad,
         url:"procesos/getDataUnidad.php",
         success:function(r) {
            datos=jQuery.parseJSON(r);
            $('#idunidad').val(datos['sap']);
            $('#tipoU').val(datos['tipo']);
            $('#descripcionU').val(datos['descripcion']);
            $('#estadoU').val(datos['estado']);
         }
      });
   }

   function eliminarDatos(idunidad){
      alertify.alert('¡Eliminando unidad automotriz!', '¿Seguro que quieres dar de baja esta unidad automotriz?',

      function(){
         $.ajax({
            type:"POST",
            data:"idunidad=" + idunidad,
            url:"procesos/darAlta_unidad.php",
            success:function(r) {
               if (r==1) {
                  $('#tablaDatatable').load('tabla_unidades_mantenimiento.php');
                  alertify.success("¡Eliminado con exito!");
               }else {
                  alertify.error("Error al tratar de eliminar el registro");

               }

            }
         });




      });

   }




</script>
