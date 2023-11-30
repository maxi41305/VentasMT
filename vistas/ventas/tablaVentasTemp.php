
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT * FROM tablaarticulo";
	$total=0;
	$cliente="Maxi";
 ?>
 <form id="tablaventas">    
	 <h4>Hacer venta</h4>

 <label>Seleciona Cliente</label>
			<select class="form-control input-sm" id="clienteVenta" name="clienteVenta">
				<option value="A">Selecciona</option>
				<?php
				$idclientee=1;
				$sqll="SELECT id_usuario,nombre,apellido 
				from usuarios where borrado=0";
				$result=mysqli_query($conexion,$sqll);
				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[2]." ".$cliente[1]." D.N.I:".$cliente[0] ?></option>
				<?php endwhile; ?>
			</select>

 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" id="generarventa"  onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
			
 		</span>
		<br>
		<input class="form-control me-2 light-table-filter" id="buscador" data-table="idm" type="text" 
      placeholder="Buscador">
 	</caption>

<caption><label>artículos</label></caption>

	<tr>
		<td>Nombre</td>
		<td>Descripcion</td>
		<td>C. a Vender</td>
		<td>Precio</td>
		<td>codigo barra</td>
		<td>Stock Actual</td>
		<td>Imagen</td>
		<td>Editar</td>
		<td>Eliminar</td>
		
	</tr>
	<tbody id="tablita">
	<?php 
 
	$result=mysqli_query($conexion,$sql);
	?>
	<?php	while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		
		<td>
		<img width="80" height="80" src="<?php echo $ver[0]; ?>">
		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDato('<?php echo $ver[5] ?>','<?php echo $ver[3] ?>','<?php echo $ver[6] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
			
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[5] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		
	</tr>
	<?php 
 		$total= $total + $ver[4] * $ver[3];
 		
 		$cliente="Maxi";	 
 ?>
<?php endwhile; ?>


 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>
</body>
</table>
</form>
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
<script type="text/javascript">
	function crearVenta(){

		vacios=validarFormVacio('tablaventas');

if(vacios > 0){
	alertify.alert("Debes llenar todos los campos!!");
	return false;
}
		datos=$('#tablaventas').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/ventas/crearVenta.php",
			success:function(r){
				console.log(r);
				if(r==1){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					alertify.alert("Venta creada con exito, consulte la informacion en ventas hechas :D");
				}else if(r==5){
					alertify.error("Tabla Vacia");
				}
			}
		});
	}
</script>