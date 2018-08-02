
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

<div   class="container" >
   <div class="row">
      <div  class="col-sm-33">
         <div class="card text-left">
            <div class="card-header">
               <h2>Tabla empleados</h2>
            </div>
            <div class="card-body">

               <span class="btn btn-success" id="opennewmodal" data-toggle="modal" data-target="#agregarnuevosdatos">Agregar Nuevo
                  <span class="fa fa-user-plus" ></span>
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
            <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form   id="frmnuevo" method="post">

               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="sap">Numero Sap</label>
                     <input type="number"  maxlength="4" class="form-control" name="sap"   id="sap">
                  </div>
                  <div class="form-group col-md-7">
                     <label for="numerosap">Nombre Completo</label>
                     <input type="text" class="form-control" name="nombre"  id="nombre">
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-5">
                     <label for="tipo">Tipo de Empleado</label>
                     <select class="form-control" name="tipo" id="tipo">
                        <?php
                        while ($tipo=mysqli_fetch_row($resultipo)) {


                           ?>
                           <option value="<?php echo $tipo[1] ?>"> <?php echo $tipo[1] ?></option>
                           <?php
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group col-md-5">
                     <label for="puesto">Puesto</label>
                     <select class="form-control" name="puesto" id="puesto">

                        <?php while ($puesto=mysqli_fetch_row($resultpuesto)) {

                           ?>
                           <option value="<?php echo $puesto[1] ?>"><?php echo $puesto[1] ?></option>

                           <?php
                        }
                        ?>
                     </select>

                  </div>
               </div>
               <div class="form-group col-md-4">
                  <label for="numeroruta">Numero de Ruta</label>
                  <input type="number" maxlength="4" class="form-control" name="ruta" id="ruta">
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
            <h5 class="modal-title" id="exampleModalLabel">Modificar datos del empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form   id="frmnuevoU"  method="post">


               <input type="text" hidden="" name="idempleado" id="idempleado">
               <div class="form-group ">
                  <label for="numerosap">Nombre Completo</label>
                  <input type="text" class="form-control" name="nombreU"  id="nombreU">
               </div>
               <div class="form-row">
                  <div class="form-group col-md-5">
                     <label  for="tipo">Tipo de Empleado</label>
                     <input class="form-control" type="text" name="tipoU" id="tipoU">

                  </div>
                  <div class="form-group col-md-5">
                     <label for="puesto">Puesto</label>
                     <input class="form-control" type="text" name="puestoU" id="puestoU">


                  </div>
               </div>

               <div class="form-group col-md-4">
                  <label for="numeroruta">Numero de Ruta</label>
                  <input type="number" maxlength="4" class="form-control" name="rutaU" id="rutaU">
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnActualizar" class="btn btn-warning">Actualizar Empleado</button>
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
         url:"procesos/registrar_empleado.php",
         success:function(r){
            if(r==1){
               $('#frmnuevo')[0].reset();
               $('#tablaDatatable').load('tabla_empleados.php');
               alertify.success("Empleado agregado con exito");

            }else{
               alertify.error("Fallo al agregar empleado, verifica que el numero SAP no sea identico");
            }
         }
      });
   });
   $('#btnActualizar').click(function() {
      datos=$('#frmnuevoU').serialize();

      $.ajax({
         type:"POST",
         data:datos,
         url:"procesos/actualizar_empleado.php",
         success:function(r){
            if(r==1){

               $('#tablaDatatable').load('tabla_empleados.php');
               alertify.success("Informacion del Empleado actualizada con exito");

            }else{
               alertify.error("Fallo al actualizar la informacion del empleado");
            }
         }


      });
   });



});


</script>


<script type="text/javascript">
$(document).ready(function(){

   $('#tablaDatatable').load('tabla_empleados.php');



});

</script>


<script type="text/javascript">
function agregarFrmActualizar(idempleado) {
   $.ajax({
      type:"POST",
      data:"idempleado=" + idempleado,
      url:"procesos/getDataempleado.php",
      success:function(r) {
         datos=jQuery.parseJSON(r);
         $('#idempleado').val(datos['sap_empleado']);
         $('#nombreU').val(datos['nombre']);
         $('#puestoU').val(datos['puesto' ]);
         $('#tipoU').val(datos['tipo']);
         $('#rutaU').val(datos['ruta']);
      }
   });
}

function eliminarDatos(idempleado){
   alertify.alert('¡Eliminando registro de empleado!', '¿Seguro que quieres eliminar este empleado?',

   function(){
      $.ajax({
         type:"POST",
         data:"idempleado=" + idempleado,
         url:"procesos/eliminar_empleado.php",
         success:function(r) {
            if (r==1) {
               $('#tablaDatatable').load('tabla_empleados.php');
               alertify.success("¡Eliminado con exito!");
            }else {
               alertify.error("Error al tratar de eliminar el registro");

            }

         }
      });




   });

}




</script>
