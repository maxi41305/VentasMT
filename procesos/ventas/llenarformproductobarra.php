<?php 
	
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$obj= new ventas();
	$codigo=$_POST['codigobarra'];

	echo json_encode($obj->obtenDatosArticulobarra($codigo));

 ?>