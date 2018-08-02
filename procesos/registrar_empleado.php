<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_empleados.php";
	$obj= new crud();



		$datos=array(
		$_POST['sap'],
		$_POST['nombre'],
		$_POST['ruta'],
		$_POST['tipo'],
		$_POST['puesto']);

	echo $obj->agregar($datos);
 ?>
