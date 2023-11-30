<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$idbarra=$_POST['idCodigoBarraa'];

	$obj=new ventas();

	echo $obj->eliminaArticulo($idbarra);

 ?>