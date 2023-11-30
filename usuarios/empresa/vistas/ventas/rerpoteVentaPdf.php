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
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css
	 /bootstrap.css">
 </head>
 <body>
 	
	 <p align="center" style="color:blue; font-size:50px">TODO EN ELECTRONICA</p>
	 <p align="center" style="color:blue; font-size:50px">M.T</p>
 	<img class="img-responsive logo img-thumbnail" src="../../img/mt.jpg" alt="" width="150px" height="150px"></a>
        </div>
	 <br>
 		<table class="table">
 			<tr>
 				<td>Fecha: <?php echo $fecha; ?></td>
 			</tr>
 			<tr>
 				<td>Folio: <?php echo $folio ?></td>
 			</tr>
 			<tr>
 				<td>cliente: <?php echo $objv->nombreCliente($idcliente); ?></td>
 			</tr>
 		</table>


 		<table class="table">
	
 			<tr>
 				<td>nombre producto</td>
 				<td>Precio</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
 			</tr>

 			<?php 
 			$sqll="SELECT dve.id_venta,
			 			  art.nombre,
			 			  art.precio,
			              art.descripcion
		 from detalle_venta  as dve 
		 inner join articulos as art
		 on dve.id_producto=art.idCodigoBarra
		 and dve.id_venta='$idventa'";

			$resultt=mysqli_query($conexion,$sqll);
			$total=0;
			while($mostrar=mysqli_fetch_row($resultt)):
 			 ?>

 			<tr>
 				<td><?php echo $mostrar[1]; ?></td>
 				<td><?php echo $mostrar[2]; ?></td>
 				<td>1</td>
 				<td><?php echo $mostrar[3]; ?></td>
 			</tr>
 			<?php 
 				$total=$total + $mostrar[2];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total=  <?php echo "$".$total; ?></td>
 			 </tr>
 		</table>
 </body>
 </html>