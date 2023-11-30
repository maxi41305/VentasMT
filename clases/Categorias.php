


<?php 

	class categorias{

		public function agregaCategoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$borrado=0;
			$nombreCategoria=$datos[1];
			$resultado=self::validarNombrecategoria($nombreCategoria);
		if($resultado==0){
			$sql="INSERT into categorias(id_usuario,
								nombreCategoria,
								borrado,
								fechaCaptura)
								values ('$datos[0]',
									'$datos[1]',
									'$borrado',
									'$datos[2]')";

						return mysqli_query($conexion,$sql);

		}else{
			
			$resultadoU=self::validarnombrepapelera($nombreCategoria);
			if($resultadoU==1){
				return 3;		
			}else{
				return 2;
			}


		}
		}
		public function validarNombrecategoria($nombreCategoria){
			$c=new conectar();
			$conexion=$c->conexion();
	
			$sql="SELECT * from categorias where nombreCategoria='$nombreCategoria'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
		}
		public function validarnombrepapelera($nombreCategoria){
			$c=new conectar();
			$conexion=$c->conexion();
	
			$sql="SELECT * from categorias where nombreCategoria='$nombreCategoria' and borrado=1";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
		}
		public function actualizaCategoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			
			$sql="UPDATE categorias set nombreCategoria='$datos[1]'
								where id_categoria='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaCategoria($idcategoria){
			$c= new conectar();
			$conexion=$c->conexion();
			
			
			$resultado=self::veruso($idcategoria);
			if($resultado==0){
			
			$sql="UPDATE categorias SET borrado = 1 WHERE categorias.id_categoria = '$idcategoria'";
			return mysqli_query($conexion,$sql);
		}else{
			return 3;
		}
		}
		public function veruso($idcategoria){
			$c=new conectar();
			$conexion=$c->conexion();
	
			$sql="SELECT * from articulos where id_categoria='$idcategoria'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
		}
		public function restaurarCategoria($idcategoria){
			$c= new conectar();
			$conexion=$c->conexion();
			
			$sql="UPDATE `categorias` SET `borrado`=0 WHERE `nombreCategoria`='$idcategoria'";
			return mysqli_query($conexion,$sql);
	
		}

	}

 ?>