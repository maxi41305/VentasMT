<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
//	$c= new conectar();
//	$conexion=$c->conexion();

	//$idcliente=$_POST['clienteVenta'];
	$idproducto=$_POST['codigobarraV'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$precio=$_POST['precioV'];
	$img=$_POST['rutaimagen'];
	$stockingresado=$_POST['cantidad'];

	//$sql="SELECT nombre,apellido 
	//		from usuarios 
	//		where id_usuario='$idcliente'";
	//$result=mysqli_query($conexion,$sql);

	//$c=mysqli_fetch_row($result);

//	$ncliente=$c[1]." ".$c[0];

//	$sql="SELECT nombre 
//			from articulos 
//			where idCodigoBarra='$idproducto'";
//	$result=mysqli_query($conexion,$sql);

	$nombreproducto=$_POST['nombreV'];
	
	$articulo=array(
		$_POST['rutaimagen'],
		$_POST['nombreV'],
		$_POST['descripcionV'],
		$_POST['cantidadV'],
		$_POST['precioV'],
		$_POST['codigobarraV'],
		$_POST['cantidad']
				);

	$obj= new ventas();

	echo $obj->insertaArticulo($articulo);
 ?>