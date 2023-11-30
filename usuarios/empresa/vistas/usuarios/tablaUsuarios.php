<?php 
	
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="SELECT id_usuario,
					nombre,
					apellido,
					telefono,
					direccion,
					id_nivel,
					email
			from usuarios";
	$result=mysqli_query($conexion,$sql);

 ?>

<input class="form-control me-2 light-table-filter" id="buscador" data-table="idm" type="text" 
      placeholder="Buscador">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Usuarios </label></caption>
	<tr>
		<td>D.N.I</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Telefono</td>
		<td>Dirección</td>
		<td>Nivel</td>
		<td>Usuario</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>
		<tbody id="tablita">
	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		
	</tr>
<?php endwhile; ?>
</tbody>
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