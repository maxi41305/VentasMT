<?php 

	class usuarios{
		public function registroUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');
			$idnivel=2;
			$sql="INSERT into usuarios (id_usuario,
								nombre,
								apellido,
								email,
								password,
								fechaCaptura,
								id_nivel,
								direccion,
								telefono)
						values ('$datos[0]',
							    '$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$fecha',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]')";
			return mysqli_query($conexion,$sql);
		}
		public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$password=sha1($datos[1]);

			$_SESSION['usuario']=$datos[0];
			$_SESSION['iduser']=self::traeID($datos);

			$sql="SELECT * 
						from usuarios 
						where email='$datos[0]'
				and password='$password'";
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

			$password=sha1($datos[1]);

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
							email
					from usuarios 
					where id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
						'id_usuario' => $ver[0],
							'nombre' => $ver[1],
							'apellido' => $ver[2],
							'email' => $ver[3]
						);

			return $datos;
		}

		public function actualizaUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE usuarios set nombre='$datos[1]',
									apellido='$datos[2]',
									email='$datos[3]'
						where id_usuario='$datos[0]'";
			return mysqli_query($conexion,$sql);	
		}

		public function eliminaUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from usuarios 
					where id_usuario='$idusuario'";
			return mysqli_query($conexion,$sql);
		}
	





	}

 ?>