<?php

class conectar{
	public function conexion(){

		$conexion=mysqli_connect('localhost',
			'root',
			'123456',
			'cedis_db');
		if ($conexion->set_charset('utf8') === false) {
			die('Error: ' .  $conexion->error);
		}

		return $conexion;

	}
}


?>
