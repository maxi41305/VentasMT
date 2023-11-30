<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Categorias.php";
	$id=$_POST['categoria'];

	$obj= new categorias();
	echo $obj->restaurarCategoria($id);

 ?>