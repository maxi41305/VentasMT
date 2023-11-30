<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios;
	

	$datos=array(
			$_POST['idUsuario'],  
		    $_POST['nombreU'] , 
		    $_POST['apellidoU'],
			$_POST['direccionU'],
			$_POST['telefonoU'],  
		    $_POST['usuarioU'],
			$_POST['nivelSelectU']
			
				);  
	echo $obj->actualizaUsuario($datos);
	


 ?>