

<?php 
//john gray libro, randy pau trabajaba en disney, 
	class articulos{
		public function agregaImagen($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into imagenes (id_categoria,
										nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$fecha')";
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}
		public function insertaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$cantidadarticulo=$datos[5];
			$precioarticulo=$datos[6];
			$borrado=0;

			$codigobarra=$datos[7];
			$resultado=self::validarCodigobarra($codigobarra);
		if($resultado==0){

			if($precioarticulo>0){
				if($cantidadarticulo>0){
				
									$sql="INSERT into articulos (id_categoria,
									id_imagen,
									borrado,
									id_usuario,
									nombre,
									descripcion,
									cantidad,
									precio,
									idCodigoBarra,
									precioReveendedor,
									id_proveedor,
									fechaCaptura) 
						values ('$datos[0]',
								'$datos[1]',
								'$borrado',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]',
								'$fecha')";
				return mysqli_query($conexion,$sql);
				
				}else {
					return 8;
				}
			}else{
				return 7;
			}


		}else 
		$resultadoU=self::validarCodigobarrapapelera($codigobarra);
			if($resultadoU==1){
				return 3;		
			}else{
				return 2;
			}
		
		
		
		return 3;
		
		
	   }


	   public function validarCodigobarrapapelera($codigobarra){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT * from articulos where idCodigoBarra='$codigobarra' and borrado=1";
		$result=mysqli_query($conexion,$sql);
		
		if(mysqli_num_rows($result) == 0){
	
				return 0;
		   }else{
			return 1;
		}
	}
	   public function validarCodigobarra($codigobarra){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT * from articulos where idCodigoBarra='$codigobarra'";
		$result=mysqli_query($conexion,$sql);
		
		if(mysqli_num_rows($result) == 0){
	
				return 0;
		   }else{
			return 1;
		}
	}

		public function obtenDatosArticulo($idCodigoBarra){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT idCodigoBarra, 
						id_categoria, 
						nombre,
						descripcion,
						cantidad,
						id_proveedor,
						precio 
				from articulos 
				where idCodigoBarra='$idCodigoBarra'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idCodigoBarra' => $ver[0],
				'id_categoria' => $ver[1],
				'nombre' => $ver[2],
				'descripcion' => $ver[3],
				'cantidad' => $ver[4],
				'id_proveedor' => $ver[5],
				'precio' => $ver[6]
						);
			
			return $datos;
		}

		public function actualizaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$cantidadarticulo=$datos[5];
			$precioarticulo=$datos[6];
			if($precioarticulo>0){
				if($cantidadarticulo>0){
							$sql="UPDATE articulos set id_categoria='$datos[1]', 
							nombre='$datos[3]',
							id_proveedor='$datos[2]',
							descripcion='$datos[4]',
							cantidad='$datos[5]',
							precio='$datos[6]'
							where 	idCodigoBarra='$datos[0]'";


							return mysqli_query($conexion,$sql);
				}else{
					return 5;
				}

			}else{
				return 4;
			}
		
		}

		public function eliminaArticulo($idCodigoBarra){
			$c=new conectar();
			$conexion=$c->conexion();

			//preguntar si no esta en uso; si esta en uso no se puede eliminar.
			$resultado=self::veruso($idCodigoBarra);
			if($resultado==0){

				$sql="UPDATE articulos SET borrado = 1 WHERE articulos.idCodigoBarra ='$idCodigoBarra'";
			$result=mysqli_query($conexion,$sql);

		return $result;
			}else{
				return 3;
			}


			
			
			
		}
		public function restaurarArticulo($idCodigoBarra){
			$c=new conectar();
			$conexion=$c->conexion();

				$sql="UPDATE articulos SET borrado = 0 WHERE articulos.idCodigoBarra ='$idCodigoBarra'";
			$result=mysqli_query($conexion,$sql);

		return $result;			
		}

		public function veruso($idCodigoBarra){
			$c=new conectar();
			$conexion=$c->conexion();
	
			$sql="SELECT * from detalle_venta where id_producto='$idCodigoBarra'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
		}

		public function obtenIdImg($idCodigoBarra){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_imagen 
					from articulos 
					where idCodigoBarra='$idCodigoBarra'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	}
 ?>