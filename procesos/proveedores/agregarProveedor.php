<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/proveedores.php";
	$idusuario=$_SESSION['iduser'];
	$nombreproveedor=$_POST['nombre'];
	$direccion=$_POST['direccion'];
    $telefono=$_POST['numero'];
	
	$datos=array(
		$idusuario,
		$nombreproveedor,
		$direccion,
		$telefono
				);

	$obj= new proveedor();

	echo $obj->agregaProveedor($datos);


 ?>