<?php 

	class usuarios{
	
		public function registroUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');
			$email = $datos[3];
			$telefono = $datos[7];
			$dni=$datos[0];
			$borrado=0;


			$dniresultado=self::validardni($dni);
		if($dniresultado==0){
					
					$telefonoresultado=self::validartelefono($telefono);
					if($telefonoresultado==0){
								
								$emailresultado=self::validaremail($email);
								if($emailresultado==0){
			$sql="INSERT into usuarios (id_usuario,
								nombre,
								apellido,
								email,
								password,
								fechaCaptura,
								id_nivel,
								borrado,
								direccion,
								telefono)
						values ('$datos[0]',
							    '$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$fecha',
								'$datos[5]',
								'$borrado',
								'$datos[6]',
								'$datos[7]')";
			return mysqli_query($conexion,$sql);
		}else{
			return 5;
			}
		
		}else{
		return 4;
		}
		}else{ 
		$resultadoU=self::validarUsuariopapelera($dni);
		if($resultadoU==1){
			return 2;		
		}else{
			return 3;
		}
	}
		}
		public function validarUsuariopapelera($dni){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT * from usuarios where id_usuario='$dni' and borrado=1";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
        }
		public function validardni($dni){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT * from usuarios where id_usuario='$dni'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
        }
		public function validaremail($email){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT * from usuarios where email='$email'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
        }
		public function validartelefono($telefono){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT * from usuarios where telefono='$telefono'";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) == 0){
		
					return 0;
			   }else{
				return 1;
			}
        }
		public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$password=sha1($datos[1]);
			$password=$datos[1];
			$_SESSION['usuario']=$datos[0];
			$_SESSION['iduser']=self::traeID($datos);

			$sql="SELECT * 
						from usuarios 
					where email='$datos[0]'
				and password='$password' and borrado=0";
			$result=mysqli_query($conexion,$sql);
			
			if(mysqli_num_rows($result) > 0){
		

				//ACA TENDRIA QUE HACER EL NUVELES DE USUARIOS PREGUNTANDO A LA BASE DE DATOS QUE NIVEL DE USUARIO TIENE
				if($row = mysqli_fetch_array($result)){
					
					$Tipo_Usuario=$row["id_nivel"];
					return $Tipo_Usuario;
			   }
			
			
			
			}else{
				return 0;
			}
		}
		public function traeID($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			//$password=sha1($datos[1]);
			$password=$datos[1];
			$sql="SELECT id_usuario 
					from usuarios 
					where email='$datos[0]'
					and password='$password'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenDatosUsuario($idusuario){

			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_usuario,
							nombre,
							apellido,
							direccion,
							telefono,
							email,
							password,
							id_nivel
					from usuarios 
					where id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
						'id_usuario' => $ver[0],
							'nombre' => $ver[1],
							'apellido' => $ver[2],
							'direccion' => $ver[3],
							'telefono' => $ver[4],
							'email' => $ver[5],
							'password' => $ver[6],
							'id_nivel' => $ver[7]
						);

			return $datos;
		}

		public function actualizaUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$emaill=$datos[5];
			$id_usuarioo=$datos[0];

			$resultado=self::buscaremail($datos[0]);
			if($resultado==$emaill){

			$sql="UPDATE usuarios set nombre='$datos[1]',
									apellido='$datos[2]',
									direccion='$datos[3]',
									telefono='$datos[4]',
									email='$datos[5]',
									id_nivel='$datos[6]'
						where id_usuario='$datos[0]'";
			return mysqli_query($conexion,$sql);	

			}else{
			
			$emailresultado=self::validaremail($emaill);
			if($emailresultado==0){
						
			
			$sql="UPDATE usuarios set nombre='$datos[1]',
									apellido='$datos[2]',
									direccion='$datos[3]',
									telefono='$datos[4]',
									email='$datos[5]',
									id_nivel='$datos[6]'
					where id_usuario='$datos[0]'";
					return mysqli_query($conexion,$sql);	

			}else{
				$r=2;
				return $r;
			}

			}
		}
		public function buscaremail($id_usuario){
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="SELECT email from usuarios where id_usuario='$id_usuario'";
			$result=mysqli_query($conexion,$sql);

			
			$ver=mysqli_fetch_row($result);

			$datos=$ver[0];
		return $datos;
        }
		
		
		public function restaurarUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();
				

			$sql="UPDATE usuarios SET borrado = 0 WHERE usuarios.id_usuario = '$idusuario'";
			return mysqli_query($conexion,$sql);
	
	
	}
		public function eliminaUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();
				//preguntar si no esta en uso; si esta en uso no se puede eliminar.
				$resultado=self::veruso($idusuario);
				if($resultado==0){

			$sql="UPDATE usuarios SET borrado = 1 WHERE usuarios.id_usuario = '$idusuario'";
			return mysqli_query($conexion,$sql);
		}else{
			return 3;
		}
	
	}
	public function veruso($idusuario){
		$c=new conectar();
		$conexion=$c->conexion();

		$sql="SELECT * from ventas where id_cliente='$idusuario'";
		$result=mysqli_query($conexion,$sql);
		
		if(mysqli_num_rows($result) == 0){
	
				return 0;
		   }else{
			return 1;
		}
	}
}
 ?>