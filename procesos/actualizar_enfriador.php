<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud_enfriadores.php";
	$obj= new crud();



		$datos=array(
		$_POST['idenfriador'],
		$_POST['serieU'],
		$_POST['denominacionU'],
		$_POST['rutaU']);


	echo $obj->actualizar($datos);
 ?>
