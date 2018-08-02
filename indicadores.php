
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
               <h2>Indicadores de Calidad</h2>
            </div>
            <div class="card-body">
               <h3>Indicador Mensual</h3>
               <hr>

               <br>
               <div class="modal-body">
                  <form  action="generarGrafica.php"  id="frmnuevo" method="post">
                     <h4>Gente</h4>

                     <div class="form-row">
                        <div class="form-group col-md-3">
                           <label for="ausentismo">Ausentismo</label>
                           <br>
                           <select  class="form-control" name="ausentismo" id="ausentismo">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>

                        </div>
                        <div class="form-group col-md-3">
                           <label for="imagen">Imagen Personal</label>
                           <br>
                           <select  class="form-control" name="imagen" id="imagen">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>
                        <div class="form-group col-md-3">
                           <label for="mermas">Mermas</label>
                           <br>
                           <select  class="form-control" name="mermas" id="mermas">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>
                     </div>
                     <hr>
                     <h4>Productividad</h4>

                     <div class="form-row">

                        <div class="form-group col-md-3">
                           <label for="seleccion">Selección y acomodo de embase</label>
                           <br>
                           <select  class="form-control" name="seleccion" id="seleccion">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>

                        </div>
                        <div class="form-group col-md-3">
                           <label for="limpiezaA">Limpieza de almacen</label>
                           <br>
                           <select  class="form-control" name="limpiezaA" id="limpiezaA">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>
                        <div class="form-group col-md-3">
                           <label for="mantenimiento">Mantenimiento Preventivo</label>
                           <br>
                           <select  class="form-control" name="mantenimiento" id="mantenimiento">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>


                     </div>
                     <hr>
                     <h4>Calidad</h4>

                     <div class="form-row">

                        <div class="form-group col-md-3">
                           <label for="atencion">Atencion a clientes</label>
                           <br>
                           <select  class="form-control" name="atencion" id="atencion">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>

                        </div>
                        <div class="form-group col-md-3">
                           <label for="limpiezaU">Limpieza de unidades</label>
                           <br>
                           <select  class="form-control" name="limpiezaU" id="limpiezaU">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>
                        <div class="form-group col-md-3">
                           <label for="nivel">Nivel de Servicio</label>
                           <br>
                           <select  class="form-control" name="nivel" id="nivel">
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                              <option value="80">80%</option>
                              <option value="90">90%</option>
                              <option value="100">100%</option>

                           </select>
                        </div>
                     </div>


                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btnAgregarnuevo" class="btn btn-success">Generar Grafica</button>
                     </div>
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
