
<?php require 'clases/header.php'; ?>
<?php require_once "clases/conexion.php";
require 'scripts.php';

$obj= new conectar();
$conexion=$obj->conexion();
?>

<br>

<div class="container" >
   <div class="row">
      <div class="col-sm-12">
         <div class="card text-left">
            <div class="card-header">
               <h2>Indicadores Mensuales</h2>
            </div>
            <div class="card-body">
               <h3>Indicadores de Calidad, Gente y Productividad </h3>
               <hr>

               <br>
               <div class="modal-body">
                  <h4>Radar</h4>
                  <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
                  <?php
                  $mantenimiento=$_POST['mantenimiento'];
                  $limpiezaA=$_POST['limpiezaA'];
                  $seleccion=$_POST['seleccion'];

                  $asuentismo=$_POST['ausentismo'];
                  $imagen=$_POST['imagen'];
                  $mermas=$_POST['mermas'];

                  $atencion=$_POST['atencion'];
                  $limpiezaU=$_POST['limpiezaU'];
                  $nivel=$_POST['nivel'];

                   ?>
                  <script>

                  data = [
                     {
                        type: 'scatterpolar',
                        r: [<?php echo $atencion ?>, <?php echo $limpiezaU ?>, <?php echo $nivel ?>, <?php echo $asuentismo ?>,<?php echo $imagen ?>,<?php echo $mermas ?>,<?php echo $mantenimiento ?>,<?php echo $limpiezaA ?>,<?php echo $seleccion ?>],
                        theta: ['Atencion a clientes','Limpieza general de unidades','Nivel de servicio', 'Ausentismo','Imagen personal','Mermas','Mantenimiento preventivo','Limpieza de almacen','Selección y acomodo de embase'],
                        fill: 'toself',
                        name: 'Calidad'
                     }
                  ]

                  layout = {
                     polar: {
                        radialaxis: {
                           visible: true,
                           range: [0, 100]
                        }
                     }
                  }

                  Plotly.plot("myDiv", data, layout)
                  </script>


               </div>

               <hr>
               <h3>20 Mejores Clientes </h3>


               <?php
               include 'scripts.php';


               $sql = "select  nombre, count(sap) total from refrigerador group by sap order by total desc limit 20";

               $result=mysqli_query($conexion,$sql);

               ?>

               <div class="container" >
                  <table class="table" id="iddatatable">
                     <thead style="background-color: #dc3545;color:white; font-weight:bold;">
                        <tr >
                           <td>Nombre</td>
                           <td>Total de Enfriadores</td>



                        </tr>
                     </thead>
                     <tfoot style="background-color: #ccc;color:white; font-weight:bold;">
                        <tr>
                           <td>Nombre</td>
                           <td>Total de Enfriadores</td>

                        </tr>
                     </tfoot>
                     <tbody>
                        <?php

                        while ($mostrar=mysqli_fetch_row($result)) {

                           ?>
                           <tr >
                              <td><?php echo $mostrar[0] ?></td>
                              <td><?php echo $mostrar[1] ?></td>


                           </tr>
                           <?php
                        }
                        ?>

                     </tbody>
                  </table>

               </div>
               <br>
               <br>
               <br>
               <hr>
               <h3>Clientes que no tienen enfriador</h3>
               <?php
               $sql1 = "SELECT sap_cliente, nombre
                FROM  clientes WHERE
                clientes.sap_cliente NOT IN (SELECT sap FROM refrigerador)";
                $result2=mysqli_query($conexion,$sql1);
                ?>



               <div class="container" >
                  <table class="table" id="iddatatable2">
                     <thead style="background-color: #dc3545;color:white; font-weight:bold;">
                        <tr >
                           <td>Numero Sap</td>
                           <td>Nombre</td>



                        </tr>
                     </thead>
                     <tfoot style="background-color: #ccc;color:white; font-weight:bold;">
                        <tr>
                           <td>Numero Sap</td>
                           <td>Nombre</td>

                        </tr>
                     </tfoot>
                     <tbody>
                        <?php



                        while ($mostrar=mysqli_fetch_row($result2)) {

                           ?>
                           <tr >
                              <td><?php echo $mostrar[0] ?></td>
                              <td><?php echo $mostrar[1] ?></td>


                           </tr>
                           <?php
                        }

                        ?>


                     </tbody>
                  </table>

               </div>
               <br>
               <br>
               <br>

               <script type="text/javascript">
               $(document).ready(function() {
                  $('#iddatatable').DataTable();
                  $('#iddatatable2').DataTable();

               });
               </script>





            </div>
            <div class="card-footer text-muted">
               CEDIS VILLA HIDALGO
            </div>
         </div>
      </div>

   </div>

</div>
