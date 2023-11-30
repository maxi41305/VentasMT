
<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios();

	$pass=$_POST['password'];
	$datos=array(
		$_POST['dni'],
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['usuario'],
		$pass,
		$_POST['nivelSelect'],
		$_POST['direccion'],
		$_POST['telefono']
	);

	echo $obj->registroUsuario($datos);

 ?>