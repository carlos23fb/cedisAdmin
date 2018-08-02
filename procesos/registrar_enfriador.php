<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_enfriadores.php";
	$obj= new crud();



		$datos=array(
		$_POST['ensa'],
		$_POST['serie'],
		$_POST['denominacion'],
		$_POST['ruta']);

	echo $obj->agregar($datos);
 ?>
