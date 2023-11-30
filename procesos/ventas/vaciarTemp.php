<?php 
require_once "../../clases/Conexion.php";
$c=new conectar();
$conexion=$c->conexion();
	session_start();
$sql="DELETE FROM id20447177_finalmaxi.tablaarticulo";
		$result=mysqli_query($conexion,$sql);

 ?>