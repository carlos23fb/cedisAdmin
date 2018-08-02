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

$archivo ='C:\xampp\htdocs\dataTablephp\excel\unidades.xlsx';

$objPHPExcel = PHPEXCEL_IOFactory::load($archivo);

	$objPHPExcel->setActiveSheetIndex(0);

	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();


	for($i = 2; $i <= $numRows; $i++){

		$sap = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$tipo = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$descripcion = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$estado = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();


		$sql = "INSERT INTO unidades (sap_unidad, tipo, descripcion,estado) VALUE('$sap','$tipo','$descripcion','$estado')";


		$result=mysqli_query($conexion,$sql);

	}





 ?>
