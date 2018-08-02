<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_empleados.php";
	$obj= new crud();



		$datos=array(
		$_POST['idempleado'],
		$_POST['nombreU'],
		$_POST['rutaU'],
		$_POST['tipoU'],
		$_POST['puestoU']);

	echo $obj->actulizar($datos);
 ?>
