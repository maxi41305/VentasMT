<?php 

	class cambiarr{
        public function cambiarContrasenia($datos){
			
			$contraseniaNueva=$datos[0];
			$contraseniaAnterior=$datos[1];
			$Usuario=$datos[2];
			
			$contra=self::traercontra($Usuario);
			
			
			if($contra==$contraseniaAnterior){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE usuarios SET password='$contraseniaNueva' WHERE id_usuario='$Usuario'";
			return mysqli_query($conexion,$sql);	
			$email=self::traeremail($Usuario);
			self::mensajeemail($email);
			
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
	public function traercontra($contras){
		$c=new conectar();
		$conexion=$c->conexion();

		$sqll="SELECT password FROM usuarios WHERE id_usuario='$contras'";
		$result=mysqli_query($conexion,$sqll);
		$contra=mysqli_fetch_row($result)[0];
		return $contra;


	}
	public function mensajeemail($correo){
		$destinatario = $correo;
		// esto es al correo al que se enviará el mensaje
		
		$nombre="Maxii Torales"; 
		$asunto= "Cambio de contraseña"; 
		$mensaje="Hola Usted a Cambiado de Contraseña"; 
		$email="maximilianoraultorales"; 
		$header="Enviado desde la página de Electronica MT"; 
		$mensajeCompleto=$mensaje . "\nAtentamente:" . $nombre;
		
		mail($destinatario, $asunto, $mensajeCompleto, $header); 
		
		


		}

	}
 ?>