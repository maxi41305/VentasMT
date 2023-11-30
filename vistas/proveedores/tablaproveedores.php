
<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_proveedor,nombreproveedor,direccion,telefono
					FROM proveedores where borrado=0";
			$result=mysqli_query($conexion,$sql);
	 ?>
<input class="form-control me-2 light-table-filter" id="buscador" data-table="idm" type="text" 
      placeholder="Buscador">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Proveedores :D</label></caption>
	<tr>
		<td>Nombre</td>
		<td>Direccion</td>
		<td>Telefono</td>
		<td>Editar</td>
			<td>Eliminar</td> 
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>
<tbody id="tablita">
	<tr>
		<td><?php echo $ver[1] ?></td>
		<td><?php echo $ver[2] ?></td>
		<td><?php echo $ver[3] ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalUpdateProveedor" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>','<?php echo $ver[2] ?>','<?php echo $ver[3] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaProveedor('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
		
	</tr>
	</tbody>
<?php endwhile; ?>
</table>
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