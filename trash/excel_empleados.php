<!DOCTYPE html>
<html lang="es" dir="ltr">

		<meta charset="utf-8">

</html>
<?php require '../clases/header.php'; ?>
<?php require '../scripts.php'; ?>
<?php
header("Content-Type: text/html;charset=utf-8");
require '../clases/PHPExcel/IOFactory.php';
require_once '../clases/conexion.php';
$obj= new conectar();
$conexion=$obj->conexion();

$archivo ='C:\xampp\htdocs\cedisAdmin\excel\enfriadores.xlsx';

$objPHPExcel = PHPEXCEL_IOFactory::load($archivo);

	$objPHPExcel->setActiveSheetIndex(9);

	$numRows = $objPHPExcel->setActiveSheetIndex(9)->getHighestRow();


	for($i = 2; $i <= $numRows; $i++){

		$sap = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$nombre = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();



		$sql = "INSERT INTO clientes (sap_cliente, nombre) VALUE('$sap','$nombre')";


		$result=mysqli_query($conexion,$sql);

	}





 ?>
