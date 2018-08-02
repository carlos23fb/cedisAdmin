<?php
header("Content-Type: text/html;charset=utf-8");
	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into empleados (sap_empleado,nombre,ruta,tipo,puesto)
								 values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]',
											'$datos[4]')";


			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idempleado) {
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT sap_empleado,
			nombre,
			puesto,
			ruta,
			tipo
			FROM empleados
			where sap_empleado='$idempleado'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'sap_empleado' => $ver[0] ,
				'nombre' => $ver[1],
				'puesto' => $ver[2],
				'ruta' => $ver[3],
				'tipo' => $ver[4]
			);

			return $datos;
		}

		public function actulizar($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE  empleados set nombre='$datos[1]',
												 ruta='$datos[2]',
												 tipo='$datos[3]',
												 puesto='$datos[4]'
											where sap_empleado='$datos[0]'
												 ";

		   return mysqli_query($conexion,$sql);


		}

		public function eliminar($idempleado) {

			$obj= new conectar();
			$conexion=$obj->conexion();

 			$sql="DELETE FROM empleados WHERE sap_empleado='$idempleado'";
			return mysqli_query($conexion,$sql);

		}


	}

 ?>
