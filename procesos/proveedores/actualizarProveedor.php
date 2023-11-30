<?php 
	
	require_once "../../clases/Conexion.php";
	require_once "../../clases/proveedores.php";
	session_start();
	$iduser=$_SESSION['iduser'];
	$proveedor=$_POST['id_proveedor'];
	$nombre=$_POST['nombreproveedorU'];
	$direccion=$_POST['direccionU'];
	$numero=$_POST['numeroU'];

	$datos=array(
		$iduser,
		$_POST['id_proveedor'],
		$_POST['nombreproveedorU'],
		$_POST['direccionU'],
		$_POST['numeroU']
			);

	$obj= new proveedor();

	echo $obj->actualizaProveedor($datos);
		
 ?>