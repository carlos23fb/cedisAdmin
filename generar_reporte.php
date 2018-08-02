
<?php require 'clases/header.php'; ?>
<?php require_once "clases/conexion.php";
require 'scripts.php';

?>

<br>

<div class="container" >
   <div class="row">
      <div class="col-sm-12">
         <div class="card text-left">
            <div class="card-header">
               <h2>Mantenimiento</h2>
            </div>
            <div class="card-body">
               <br>
               <h3>Formulario de reporte de mantenimiento</h3>
               <hr>
               <br>
               <div class="modal-body">
                  <form    id="frmnuevo" method="post">

                     <div class="form-group col-md-3">
                        <?php
                        $id=$_POST['idunidad'];
                         ?>
                         <div class="form-row">
                            <div class="form-group">
                               <input type="number" name="sap" id="sap" hidden value="<?php echo $id ?>">
                               <label for="date ">Fecha del servicio de mantenimiento:</label>
                               <br>
                               <input class="form-control" type="date" name="date" id="date" >
                            </div>

                            <div class="form-group">
                               <label for="kilometraje">Kilometraje:</label>
                               <input class="form-control" type="number" name="kilometraje" id="kilometraje">
                            </div>



                         </div>
                         <div class="form-group">
                            <label for="servicio">Servicio que se le dio a la unidad:</label>
                            <input class="form-control" type="text" name="servicio" id="servicio">
                            <br>
                            <label for="notas">Notas:</label>
                            <input class="form-control" type="text" name="notas" id="notas" value="">

                         </div>




                     </div>
                     <button type="button"  id="btnAgregar" class="btn btn-primary">Generar reporte</button>


                  </form>

               </div>

               <br>





            </div>
            <div class="card-footer text-muted">
               CEDIS VILLA HIDALGO
            </div>
         </div>
      </div>

   </div>

</div>




<script type="text/javascript">
$(document).ready(function () {
   $('#btnAgregar').click(function () {

      datos=$('#frmnuevo').serialize();
      $.ajax({
         type:"POST",
         data:datos,
         url:"procesos/reporte_script.php",
         success:function (r) {
            if (r==1) {
               $('#frmnuevo')[0].reset();
               alertify.success("Reporte generado con exito");


            }else {
               alertify.error("Fallo al generar el reporte");
            }


         }




      });




   });

});




</script>
