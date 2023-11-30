
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$borrado=0;
	$sql="SELECT art.nombre,
	art.descripcion,
	art.cantidad,
	art.precio,
	art.precioReveendedor,
	img.ruta,
	cat.nombreCategoria,
	pro.nombreproveedor,
	art.idCodigoBarra
from articulos as art 
inner join imagenes as img
on art.id_imagen=img.id_imagen
inner join categorias as cat
on art.id_categoria=cat.id_categoria
inner join proveedores as pro
on art.id_proveedor=pro.id_proveedor WHERE art.borrado='$borrado' ORDER BY cantidad ASC";


 ?>
      <input class="form-control me-2 light-table-filter" id="buscador" data-table="idm" type="text" 
      placeholder="Buscador">
      <hr>
      </form>
  </div>

  <br>
<table class="table table-hover table-condensed table-bordered idm" style="text-align: center;">
<caption><label>artículos</label></caption>

	<tr>
		<td>Nombre</td>
		<td>Descripcion</td>
		<td>Cantidad</td>
		<td>Precio</td>
		<td>Precio Revendedor</td>
		<td>codigo barra</td>
		<td>Imagen</td>
		<td>Categoria</td>
		<td>Proveedor</td>
		<td>Editar</td>
		<td>Eliminar</td>
		
	</tr>
	<tbody id="tablita">
	<?php 
 
	$result=mysqli_query($conexion,$sql);
	?>
	
	<?php	while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[8]; ?></td>
		
		<td>
			<?php 
			$imgVer=explode("/", $ver[5]) ; 
			$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
			?>
			<img width="80" height="80" src="<?php echo $imgruta ?>">
		</td>
		<td><?php echo $ver[6]; ?></td>
		<td><?php echo $ver[7]; ?></td>
		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[8] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
			
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[8] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>

	</tr>
<?php endwhile; ?>

</body>
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