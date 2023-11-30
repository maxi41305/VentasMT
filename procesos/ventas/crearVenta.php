<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	$obj= new ventas();

	$dato=array(
		$_POST['clienteVenta']
			);
	echo $obj->crearVenta($dato);
 ?>