<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_unidades.php";
	$obj= new crud();



		$datos=array(
		$_POST['sap'],
		$_POST['tipo'],
		$_POST['descripcion'],
		$_POST['estado']);

	echo $obj->agregar($datos);
 ?>
