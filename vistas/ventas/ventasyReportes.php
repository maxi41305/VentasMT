<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new ventas();

	$sql="SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas group by id_venta";
	$result=mysqli_query($conexion,$sql); 
	?>
 
<h4>Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
			<input class="form-control me-2 light-table-filter" id="buscador" data-table="idm" type="text" 
      placeholder="Buscador">
				<caption><label>Ventas :)</label></caption>
				<tr>
					<td>Folio</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Total de compra</td>
					<td>Ticket</td>
					<td>Reporte</td>
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
			<tbody id="tablita">
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td>
					<?php
						
						echo $obj->nombreCliente($ver[2]);
							
						 ?>
					</td>
					<td>
						<?php 
							echo "$".$obj->obtenerTotal($ver[0]);
						 ?>
					</td>
					<td>
						<a href="../procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Ticket <span class="glyphicon glyphicon-list-alt"></span>
						</a>
					</td>
					<td>
						<a href="../procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Reporte <span class="glyphicon glyphicon-file"></span>
						</a>	
					</td>
				</tr>
		<?php endwhile; ?>
		</table>
						</tbody>
	</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<script>
$(document).ready(function(){
  $("#buscador").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablita tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
buscador.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>