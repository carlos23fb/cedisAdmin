<?php
header("Content-Type: text/html;charset=utf-8");
	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into unidades (sap_unidad,tipo,descripcion,estado)
								 values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]')";


			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idunidad) {
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT sap_unidad,
			tipo,
			descripcion,
			estado

			FROM unidades
			where sap_unidad='$idunidad'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'sap' => $ver[0] ,
				'tipo' => $ver[1],
				'descripcion' => $ver[2],
				'estado' => $ver[3]

			);

			return $datos;
		}

		public function actualizar($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE  unidades set tipo='$datos[1]',
												 descripcion='$datos[2]',
												 estado='$datos[3]'
											where sap_unidad='$datos[0]'
												 ";

		   return mysqli_query($conexion,$sql);


		}

		public function eliminar($idunidad) {

			$obj= new conectar();
			$conexion=$obj->conexion();

 			$sql="DELETE FROM unidades WHERE sap_unidad='$idunidad'";
			return mysqli_query($conexion,$sql);

		}

		public function alta($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE  unidades set estado='$datos[1]'

											where sap_unidad='$datos[0]'
												 ";

		   return mysqli_query($conexion,$sql);


		}


	}

 ?>
