<?php 

	class RecuperarUsuario{
        public function RecuperarUsuarioo($datos){
			$contrasenia=12344321;
			$email=self::traeremail($datos[1]);
			
			
			if($email==$datos[0]){
			
				$c=new conectar();
			$conexion=$c->conexion();
	
			$sql="UPDATE usuarios SET password='$contrasenia' WHERE id_usuario='$datos[1]'";
			
			$r=mysqli_query($conexion,$sql);
			self::mensajeemail($email);
			return $r;

			}
			
		}

			
		public function traeremail($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();

			$sqll="SELECT email FROM usuarios WHERE id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sqll);
			$email=mysqli_fetch_row($result)[0];
			return $email;


		}
	public function mensajeemail($correo){
		$destinatario = $correo;
		// esto es al correo al que se enviará el mensaje
		
		$nombre="Maxii Torales"; 
		$asunto= "Recuperacion contraseña"; 
		$mensaje="Hola esta es tu nueva Contraseña 12344321"; 
		$email="maximilianoraultorales"; 
		$header="Enviado desde la página de Electronica MT"; 
		$mensajeCompleto=$mensaje . "\nAtentamente:" . $nombre;
		
		mail($destinatario, $asunto, $mensajeCompleto, $header); 
	
		


		}
	}
 ?>