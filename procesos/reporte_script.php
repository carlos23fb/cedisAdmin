<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_unidades.php";
	$obj= new crud();



		$datos=array(
		$_POST['sap'],
		$_POST['date'],
		$_POST['kilometraje'],
		$_POST['servicio'],
      $_POST['notas']);

	echo $obj->agregarReporte($datos);
 ?>
