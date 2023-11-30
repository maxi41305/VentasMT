<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/cambiarContrasenia.php";
    session_start();
	$iduser=$_SESSION['iduser'];
	$obj= new cambiarr();

	$datos=array(
        $_POST['contrasenia1'],
		$_POST['contraseniaAnterior'],
		$iduser
			);

	

	echo $obj->cambiarContrasenia($datos);
 ?>