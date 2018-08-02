<?php require 'clases/header.php'; ?>
<?php require_once 'scripts.php'; ?>



<br>
<br>
<br>
<div class="container">
   <div class="card text-center">
      <div class="card-header">
         Bienvenido
      </div>
      <div class="card-body">
         <h4 class="card-title">Menu de opciones</h4>

         <ul class="list-group list-group-flush">
            <li class="list-group-item">
               <a href="empleados.php">Administrar Empleados</a>
            </li>
            <li class="list-group-item">
               <a href="enfriadores.php">Concentrado de Enfriadores</a>
            </li>
            <li class="list-group-item">
               <a href="unidades.php">Concentrado de Unidades</a>
            </li>
            <li class="list-group-item">
               <a href="unidades_mantenimiento.php">Unidades en mantenimiento</a>
            </li>
            <li class="list-group-item">
               <a href="indicadores.php">Indicadores</a>
            </li>

         </ul>
         <br>

         <a href="clases/cerrar_sesion.php">
            <span class="btn btn-danger"   >Cerrar Sesion
               <span class="fa fa-window-close" ></span>
            </span>
         </a>



      </div>
      <div class="card-footer text-muted">
         Grupo Embotellador del Nayar S.A de C.V
      </div>
   </div>

</div>
