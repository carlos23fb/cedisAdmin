
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
               Tabla De Enfriadores en Campo
            </div>
            <div class="card-body">

               <span class="btn btn-success" id="opennewmodal" data-toggle="modal" data-target="#agregarnuevosdatos">Agregar Nuevo
                  <span class="far fa-snowflake" ></span>
               </span>
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
                     <label for="sap">ENSA</label>
                     <input type="text" class="form-control" name="ensa"   id="ensa">
                  </div>
                  <div class="form-group col-md-7">
                     <label for="numerosap">Nuemero de Serie</label>
                     <input type="text" class="form-control" name="serie"  id="serie">
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="sap">Denominacion</label>
                     <input type="text" class="form-control" name="denominacion"   id="denominacion">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="numeroruta">Numero de Ruta</label>
                     <input type="number" maxlength="4" class="form-control" name="ruta" id="ruta">
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar datos del enfriador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form   id="frmnuevoU"  method="post">


              <input type="text" hidden="" name="idenfriador" id="idenfriador">
              <div class="form-group ">
                  <label for="serie">Serie</label>
                  <input type="text" class="form-control" name="serieU"  id="serieU">
              </div>

                 <div class="form-group">
                    <label  for="tipo">Denominacion</label>
                    <input class="form-control" type="text-area" name="denominacionU" id="denominacionU">

                 </div>
                 <div class="form-group">
                   <label for="numeroruta">Numero de Ruta</label>
                   <input type="number" maxlength="4" class="form-control" name="rutaU" id="rutaU">
                 </div>
              </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btnActualizar" class="btn btn-warning">Actualizar Refrigerador</button>
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
         url:"procesos/registrar_enfriador.php",
         success:function(r){
            if(r==1){
               $('#frmnuevo')[0].reset();
               $('#tablaDatatable').load('tabla_enfriadores.php');
               alertify.success("Alta de enfriador en ruta con exito");

            }else{
               alertify.error("Fallo al agregar la alta del enfriador");
            }
         }
      });
   });
   $('#btnActualizar').click(function() {
      datos=$('#frmnuevoU').serialize();

      $.ajax({
         type:"POST",
         data:datos,
         url:"procesos/actualizar_enfriador.php",
         success:function(r){
            if(r==1){
               alertify.success("Informacion del Enfriador actualizada con exito");
               $('#tablaDatatable').load('tabla_enfriadores.php');




            }else{
               alertify.error("Fallo al actualizar la informacion del Enfriador");
            }
         }


      });
   });



});



</script>


<script type="text/javascript">
$(document).ready(function(){

   $('#tablaDatatable').load('tabla_enfriadores.php');
});

</script>


<script type="text/javascript">
   function agregarFrmActualizar(idenfriador) {
      $.ajax({
         type:"POST",
         data:"idenfriador=" + idenfriador,
         url:"procesos/getDataEnfriador.php",
         success:function(r) {
            datos=jQuery.parseJSON(r);
            $('#idenfriador').val(datos['ensa']);
            $('#serieU').val(datos['serie']);
            $('#denominacionU').val(datos['denominacion']);
            $('#rutaU').val(datos['ruta']);
         }
      });
   }

   function eliminarDatos(idenfriador){
      alertify.alert('¡Eliminando enfriador de la ruta!', '¿Seguro que quieres dar de baja este enfriador?',

      function(){
         $.ajax({
            type:"POST",
            data:"idenfriador=" + idenfriador,
            url:"procesos/eliminar_enfriador.php",
            success:function(r) {
               if (r==1) {
                  $('#tablaDatatable').load('tabla_enfriadores.php');
                  alertify.success("¡Eliminado con exito!");
               }else {
                  alertify.error("Error al tratar de eliminar el registro");

               }

            }
         });




      });

   }




</script>
