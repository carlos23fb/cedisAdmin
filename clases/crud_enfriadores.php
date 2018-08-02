<?php
header("Content-Type: text/html;charset=utf-8");
	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into refrigerador (ensa,numero_serie,denominacion,ruta)
								 values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]')";


			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idenfriador) {
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT ensa,
			numero_serie,
			denominacion,
			ruta

			FROM refrigerador
			where ensa='$idenfriador'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'ensa' => $ver[0] ,
				'serie' => $ver[1],
				'denominacion' => $ver[2],
				'ruta' => $ver[3]

			);

			return $datos;
		}

		public function actualizar($datos){

			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE  refrigerador set numero_serie='$datos[1]',
												 denominacion='$datos[2]',
												 ruta='$datos[3]'
											where ensa='$datos[0]'
												 ";

		   return mysqli_query($conexion,$sql);


		}

		public function eliminar($idenfriador) {

			$obj= new conectar();
			$conexion=$obj->conexion();

 			$sql="DELETE FROM refrigerador WHERE ensa='$idenfriador'";
			return mysqli_query($conexion,$sql);

		}


	}

 ?>
