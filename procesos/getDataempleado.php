<?php
require_once '../clases/conexion.php';
require_once '../clases/crud_empleados.php';

$obj = new crud();




echo json_encode($obj->obtenDatos($_POST['idempleado']))

 ?>
