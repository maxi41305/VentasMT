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


	$sql="SELECT direccion,
	telefono
from usuarios 
where id_usuario ='$idcliente'";

$resultt=mysqli_query($conexion,$sql);

$verr=mysqli_fetch_row($resultt);

$direccioncliente=$verr[0];
$telefonoclient=$verr[1];

	?>	




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link type="text/css" rel="stylesheet" href="style.css">
<style>
@import url('fonts/BrixSansRegular.css');
@import url('fonts/BrixSansBlack.css');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 9pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 12pt;
	display: block;
	background: #0a4661;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 10px;
}
.logo_factura{
	width: 25%;
}
.info_empresa{
	width: 50%;
	text-align: center;
}
.info_factura{
	width: 25%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 50%;
}
.datos_cliente{
	padding: 10px 10px 0 10px;
}
.datos_cliente label{
	width: 75px;
	display: inline-block;
}
.datos_cliente p{
	display: inline-block;
}

.textright{
	text-align: right;
}
.textleft{
	text-align: left;
}
.textcenter{
	text-align: center;
}
.round{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
	padding-bottom: 15px;
}
.round p{
	padding: 0 15px;
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: red;
	color: black;
	padding: 5px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%);
}
	
</style>
</head>
<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img src="../../img/mt.jpg" width="100px" height="100px">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">TODO EN ELECTRONICA "M.T"</span>
					<p>Lomas de Jardin 50 viviendas</p>
					<p>Teléfono: +(54) 9 3743-591444</p>
					<p>Email: Todoenelectronica@gmail.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong><?php echo $folio ?></strong></p>
					<p>Fecha: <?php echo $fecha; ?></p>
					<p>Hora: <?php echo date('h:i:s A');?></p>
					<p>Vendedor: Torales Maxi</p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>dni:</label><p><?php echo $idcliente ?></p></td>
							<td><label>Teléfono:</label> <p><?php echo $telefonoclient ?></p></td>
						</tr>
						<tr>
							<td><label>Nombre:</label> <p><?php echo $objv->nombreCliente($idcliente); ?></p></td>
							<td><label>Dirección:</label> <p><?php echo $direccioncliente ?></p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Cant.</th>
					<th class="textleft">Nombre</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio </th>
					
				</tr>
			</thead>
			<tbody id="detalle_productos">
			<?php 
 			$sqll="SELECT dve.id_venta,
						  dve.cantidad,
			 			  art.nombre,
			 			  art.precio,
			              art.descripcion
		 from detalle_venta  as dve 
		 inner join articulos as art
		 on dve.id_producto=art.idCodigoBarra
		 and dve.id_venta='$idventa'";

			$detalle=mysqli_query($conexion,$sqll);
			$total=0;
			while($mostrar=mysqli_fetch_row($detalle)):
 			 ?>
				<tr>
					<td class="textcenter"><?php echo $mostrar[1]; ?></td>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[4]; ?></td>
					<td class="textright"><?php echo $mostrar[3]; ?></td>
					
				</tr>
			
			</tbody>
			<?php 
 				$total=$total + $mostrar[3] * $mostrar[1];
 			endwhile;
 			 ?>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span><?php echo "$".$total; ?></span></td>
				</tr>
				<tr>
					
					<td class="textright"><span>0</span></td>
				</tr>
				
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php echo "$".$total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con Torales Maxi, 3743591444 y maxiitorales41305@gmail.com</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>