<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

	$sql="SELECT id_venta,
	fechaCompra,
	id_cliente
from ventas 
where id_venta='$idventa'";

$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];

 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de venta</title>
 	<style type="text/css">
		
@page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
    body{
    	font-size: xx-small;
    }
	</style>

 </head>
 <body>
 		<p>Electronica MT</p>
 		<p>
 			Fecha: <?php echo $fecha; ?>
 		</p>
 		<p>
 			Folio: <?php echo $folio ?>
 		</p>
 		<p>
 			cliente: <?php echo $objv->nombreCliente($idcliente); ?>
 		</p>
 		
 		<table style="border-collapse: collapse;" border="1">
 			<tr>
 				<td>Nombre</td>
 				<td>Precio</td>
				<td>cantidad</td>
 			</tr>
 			<?php 
 				$sql="SELECT dve.id_venta,
				 art.nombre,
				 art.precio,
				art.descripcion,
				dve.cantidad
				from detalle_venta  as dve 
				inner join articulos as art
				on dve.id_producto=art.idCodigoBarra
				and dve.id_venta='$idventa'";

				$result=mysqli_query($conexion,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>
 			<tr>
 				<td><?php echo $mostrar[1]; ?></td>
 				<td><?php echo $mostrar[2] ?></td>
				 <td><?php echo $mostrar[4] ?></td>
 			</tr>
 			<?php
 				$total=$total + $mostrar[2]*$mostrar[4];
 				} 
 			 ?>
 			 <tr>
 			 	<td>Total: <?php echo "$".$total ?></td>
 			 </tr>
 		</table>

 		
 </body>
 </html>
 