<?php 

require_once "../../clases/Conexion.php";
$c= new conectar();
$conexion=$c->conexion();
?>


<h4>Vender un producto</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmVentasProductos">

		
			<input type="text" id="cantidad" hidden="" name="cantidad">
			<label>Código Barra</label>
			<div class="input-group">
			<input type="text" class="form-control input-sm" id="codigobarra" name="codigobarra" onchange="codigodebarra()">
			</div>
			<p></p>
			<label>Nombre</label>
			<input readonly="" type="text" class="form-control input-sm" id="nombreV" name="nombreV">
			<label>Descripción</label>
			<textarea readonly="" id="descripcionV" name="descripcionV" class="form-control input-sm"></textarea>
			
			<input type="text" id="cantidadV" hidden="" name="cantidadV">
			<input type="text" id="codigobarraV" hidden="" name="codigobarraV">
			
			<label>Precio</label>
			<input readonly="" type="text" class="form-control input-sm" id="precioV" name="precioV">
			<input type="text" id="rutaimagen" hidden="" name="rutaimagen">
			<p></p>
			<span class="btn btn-danger" id="btnVaciarVentas">Vaciar ventas</span>
		</form>
	</div>
	<div class="col-sm-4">
		<div id="tablaVentasTempLoad"></div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Stock Venta</h4>
					</div>
					<div class="modal-body">
						<form id="frmArticulosU" enctype="multipart/form-data">
	
							<label>Cantidad</label>
							<input type="number" class="form-control input-sm" id="cantidadU" name="cantidadU">
							<input type="text" id="idCodigoBarraU" hidden="" name="idCodigoBarraU">	
							<input type="text" id="stockactual" hidden="" name="stockactual">							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>


	
	
	<script type="text/javascript">
		function agregaDato(barra,cantidad,stockactual){
			$('#idCodigoBarraU').val(barra);
			$('#cantidadU').val(cantidad);
			$('#stockactual').val(stockactual);
		}

		$(document).ready(function(){
			$('#btnActualizaarticulo').click(function(){
				vacios=validarFormVacio('frmArticulosU');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmArticulosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/ventas/actualizaArticulos.php",
					success:function(r){
						if(r==1){
							
							$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
							alertify.success("Actualizado con exito :D");
						}else if(r==4){
							alertify.error("Cantidad ingresada es Mayor al stock actual");
						}else if(r==5){
							alertify.error("Cantidad ingresada Tiene que ser Mayor a 0 ");
						}
					}
				});
			});
		});
	</script>
				
		<script type="text/javascript">
		function eliminaArticulo(idCodigoBarra){
			alertify.confirm('¿Desea eliminar este articulo?', function(){ 
				$.ajax({
					type:"POST",
					data:"idCodigoBarraa=" + idCodigoBarra,
					url:"../procesos/ventas/eliminarArticulo.php",
					success:function(r){
						if(r==1){
							
							$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}




	</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
		
		$('#btnVaciarVentas').click(function(){

		$.ajax({
			url:"../procesos/ventas/vaciarTemp.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
			}
		});
	});

	});
</script>



<script type="text/javascript">
	$(document).ready(function(){
		$('#clienteVenta').select2();
		

	});
</script>
<script type="text/javascript">	
	function codigodebarra(){
	
	$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
    

	datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/llenarformproductobarra.php",
				success:function(r){
					console.log(r);
					$bandera=0;
					if(r==5){
						alertify.alert("articulo sin stock");
						$('#codigobarra').val("");
						return false;
					}
					if(r==0){
						alertify.alert("Este Articulo no Existe");
						$('#codigobarra').val("");
						$agregar=0;
					}else{
						dato=jQuery.parseJSON(r);
					$('#nombreV').val(dato['nombre']);
					$('#descripcionV').val(dato['descripcion']);
					$('#cantidadV').val(dato['cantidad']);
					$('#precioV').val(dato['precio']);
					$('#rutaimagen').val(dato['ruta']);
					$('#codigobarraV').val(dato['codigobarra']);
					$('#cantidad').val(dato['cantidad']);
					
					$agregar=1;
					vacios=validarFormVacio('frmVentasProductos');
					if(vacios > 0){
						alertify.alert("campos vacios");
					$('#codigobarra').val("");
					$agregar=0;
					return false;
					}	
					
				}
				
					if($agregar==1){
			datos=$('#frmVentasProductos').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/agregaProductoTemp.php",
				success:function(r){
					
				if(r==4){

					alertify.error("La cantidad ingresada supera el Stock Actual");
				}else if(r==5){
					alertify.error("La cantidad ingresada supera el Stock Actual");

				}else if(r==3){
					alertify.error("La cantidad ingresada supera el Stock Actual");
				}else if(r==1){
					alertify.success("Se agregooo :D");
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#codigobarra').val("");
					$bandera=1;
				}
					
				}
			});
		}

						
			
		
				}			
						});
	
}

</script>
<script>
cantidadU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
