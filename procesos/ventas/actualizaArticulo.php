<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$obj=new ventas();


$datos=array(
    $_POST['cantidadU'],
    $_POST['idCodigoBarraU'],
    $_POST['stockactual']        
);

    echo $obj->actualizaArticulo($datos);

 ?>