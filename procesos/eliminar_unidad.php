<?php
require_once '../clases/conexion.php';
require_once '../clases/crud_unidades.php';

$obj = new crud();


echo $obj->eliminar($_POST['idunidad']);



 ?>
