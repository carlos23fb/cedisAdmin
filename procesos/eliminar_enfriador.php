<?php
require_once '../clases/conexion.php';
require_once '../clases/crud_enfriadores.php';

$obj = new crud();


echo $obj->eliminar($_POST['idenfriador']);



 ?>
