<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";
$idbarra=$_POST['idCodigoBarraa'];

	$obj=new articulos();

	echo $obj->eliminaArticulo($idbarra);

 ?>