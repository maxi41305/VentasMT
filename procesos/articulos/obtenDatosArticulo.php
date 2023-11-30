<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Articulos.php";

	$obj= new articulos();


	$idbarra=$_POST['idbarra'];

	echo json_encode($obj->obtenDatosArticulo($idbarra));

 ?>