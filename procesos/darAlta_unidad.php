<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_unidades.php";
	$obj= new crud();



		$datos=array(
		$_POST['idunidad'],
		$_POST['estadoU']);


	echo $obj->alta($datos);




 ?>
