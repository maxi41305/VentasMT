<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/RecuperarUsuario.php";

	$obj= new RecuperarUsuario();
	
	$datos=array(
		$_POST['correo'],
		$_POST['dni'],
		
	);

	

	echo $obj->RecuperarUsuarioo($datos);

 ?>