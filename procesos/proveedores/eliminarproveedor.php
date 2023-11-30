<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/proveedores.php";
	$id=$_POST['idproveedor'];
	
	$obj= new proveedor();
	echo $obj->eliminaProveedor($id);

 ?>