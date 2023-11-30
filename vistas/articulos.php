<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>	Artículos </title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombreCategoria
		from categorias where borrado=0";
		$result=mysqli_query($conexion,$sql);
	?>

<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sqll="SELECT id_proveedor,nombreproveedor
		from proveedores where borrado=0";
		$resultproveedor=mysqli_query($conexion,$sqll);
	?>
	
	</head>
	<body>
		<div class="container">
			<h1>Artículos</h1>
		
			<div class="row">
				<div class="col-sm-4">
					<form id="frmArticulos" enctype="multipart/form-data">
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
							<option value="A">Selecciona Categoria</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
								
						<label>Proveedor</label>
						<select class="form-control input-sm" id="proveedorSelect" name="proveedorSelect">
							<option value="A">Selecciona Proveedor</option>
							<?php while($verproveedor=mysqli_fetch_row($resultproveedor)): ?>
								<option value="<?php echo $verproveedor[0] ?>"><?php echo $verproveedor[1]; ?></option>
							<?php endwhile; ?>
						</select>

						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" onkeypress="return soloLetras(event)" onblur="validarnombre(this)">
						<label>Descripción</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion" onblur="validardescripcion(this)">
						<label>Cantidad</label>
						<input type="number" class="form-control input-sm" id="cantidad" name="cantidad" onblur="validarcantidad(this)">
						<label>Precio Costo</label>
						<input type="number" class="form-control input-sm" id="precio" name="precio" onblur="validarprecio(this)">
						<label>Código barra</label>
						<input type="text" class="form-control input-sm" id="idCodigoBarra" name="idCodigoBarra" onblur="validarcodigobarra(this)">
						<div id="respuesta"> </div>
						<label>Imagen</label>
						<input accept="image/png,image/jpeg" type="file" id="imagen" name="imagen">
						
						<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
				<div id="tablaArticulosLoad"></div>
				</div>

			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
					</div>
					<div class="modal-body">
						<form id="frmArticulosU" enctype="multipart/form-data">
							
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecciona Categoria</option>
								<?php 
								$sql="SELECT id_categoria,nombreCategoria
								from categorias where borrado=0";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Proveedor</label>
							<select class="form-control input-sm" id="proveedorSelectU" name="proveedorSelectU">
								<option value="A">Selecciona proveedor</option>
								<?php 
								$sql="SELECT id_proveedor,nombreproveedor
								from proveedores where borrado=0";
								$resultt=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($resultt)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU" onkeypress="return soloLetras(event)" onblur="validarnombreU(this)">
							<label>Descripcion</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU" onblur="validardescripcionU(this)">
							<label>Cantidad</label>
							<input type="number" class="form-control input-sm" id="cantidadU" name="cantidadU" onblur="validarcantidadU(this)">
							<label>Precio</label>
							<input type="number" class="form-control input-sm" id="precioU" name="precioU" onblur="validarprecioU(this)" >
							
							<input type="text" hidden="" id="idCodigoBarraU" name="idCodigoBarraU" >
							
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>
		
	</body>
	</html>


	<script type="text/javascript">
		function agregaDatosArticulo(idCodigoBarra){
			$.ajax({
				type:"POST",
				data:"idbarra=" + idCodigoBarra,
				url:"../procesos/articulos/obtenDatosArticulo.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idCodigoBarraU').val(dato['idCodigoBarra']);
					$('#categoriaSelectU').val(dato['id_categoria']);
					$('#proveedorSelectU').val(dato['id_proveedor']);
					$('#nombreU').val(dato['nombre']);
					$('#descripcionU').val(dato['descripcion']);
					$('#cantidadU').val(dato['cantidad']);
					$('#precioU').val(dato['precio']);

				}
			});
		}
</script>

	
		<script type="text/javascript">
		function eliminaArticulo(idCodigoBarra){
			alertify.confirm('¿Desea eliminar este articulo?', function(){ 
				$.ajax({
					type:"POST",
					data:"idCodigoBarraa=" + idCodigoBarra,
					url:"../procesos/articulos/eliminarArticulo.php",
					success:function(r){
						console.log(r);
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Eliminado con exito!!");
						}else if(r==3){
							alertify.error("Este Articulo esta siendo utilizado no se puede eliminar");
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
					url:"../procesos/articulos/actualizaArticulos.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Actualizado con exito :D");
						}else if(r==5){
							alertify.error("La cantidad tiene que ser MAYOR a 0 vuelva a intentar");
							
						}else if(r==4){
							alertify.error("El precio tiene que ser MAYOR a 0 vuelva a intentar");
							
						}else{
							alertify.error("Error vuelva a intentar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");


			$('#btnAgregaArticulo').click(function(){

				vacios=validarFormVacio('frmArticulos');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmArticulos"));

				$.ajax({
					url: "../procesos/articulos/insertaArticulos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						$bandera=0;
						if(r == 1){
							$('#frmArticulos')[0].reset();
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Agregado con exito :D");
						}else{
							if(r==3){
											
										$bandera=1;
							}else{
								if(r==8){
									alertify.error("La cantidad tiene que ser MAYOR a 0 vuelva a intentar");
									$('#cantidad').val("");
								}else{
										if(r==7){
										alertify.error("El precio tiene que ser MAYOR a 0 vuelva a intentar");
										$('#precio').val("");
									}else{

										if(r==2){
										alertify.error('ERROR Codigo de Barra existente, el campo sera vaciado verifique en la tabla');
										$('#idCodigoBarra').val("");
										}
									}
								}
							
							}
						}
					
					if($bandera==1){
						var idCodigoBarra = document.getElementById('idCodigoBarra').value;
						alertify.confirm('Este Articulo se encuentra en la papelera. ¿lo desea restaurar?', function(){ 
				$.ajax({
					type:"POST",
					data:"idCodigoBarraa=" + idCodigoBarra,
					url:"../procesos/articulos/restaurarArticulo.php",
					success:function(r){
						if(r==1){
							$('#frmArticulos')[0].reset();
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("articulo restaurado");
						}else{
							alertify.error("No se pudo restaurar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});

					}
					
					
					
					}
				});
				
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>
<script>
nombre.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
descripcion.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
cantidad.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
precio.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
idCodigoBarra.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
nombreU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
descripcionU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
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
<script>
precioU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
idCodigoBarraU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
  function soloLetras(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = [8, 37, 39, 46];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }
  
  function limpia() {
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              document.getElementById("miInput").value = '';
      }
  }
  </script>
  <script>
function validarnombreU(elemento){
		var nombreU = document.getElementById('nombreU').value;
		
		  if(nombreU.length <2){
			alertify.error('ERROR nombre muy corto');
			$('#nombreU').val("");
			return;
		  }else if(nombreU.length >30){
			alertify.error('ERROR nombre muy largo');
			$('#nombreU').val("");
			return;
		  }
		 
		
	}
</script>

<script>
function validarnombre(elemento){
		var nombre = document.getElementById('nombre').value;
		
		  if(nombre.length <2){
			alertify.error('ERROR nombre muy corto');
			$('#nombre').val("");
			return;
		  }else if(nombre.length >30){
			alertify.error('ERROR nombre muy largo');
			$('#nombre').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validardescripcion(elemento){
		var descripcion = document.getElementById('descripcion').value;
		
		  if(descripcion.length <2){
			alertify.error('ERROR descripcion muy corto');
			$('#descripcion').val("");
			return;
		  }else if(descripcion.length >70){
			alertify.error('ERROR descripcion muy largo');
			$('#descripcion').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validardescripcionU(elemento){
		var descripcionU = document.getElementById('descripcionU').value;
		
		  if(descripcionU.length <2){
			alertify.error('ERROR descripcion muy corto');
			$('#descripcionU').val("");
			return;
		  }else if(descripcionU.length >70){
			alertify.error('ERROR descripcion muy largo');
			$('#descripcionU').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarcantidad(elemento){
		var cantidad = document.getElementById('cantidad').value;
		
		  if(cantidad.length <1){
			alertify.error('ERROR cantidad muy corto');
			$('#cantidad').val("");
			return;
		  }else if(cantidad.length >8){
			alertify.error('ERROR cantidad muy largo');
			$('#cantidad').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarcantidadU(elemento){
		var cantidadU = document.getElementById('cantidadU').value;
		
		  if(cantidadU.length <1){
			alertify.error('ERROR cantidad muy corto');
			$('#cantidadU').val("");
			return;
		  }else if(cantidadU.length >8){
			alertify.error('ERROR cantidad muy largo');
			$('#cantidadU').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarcodigobarra(elemento){
		var idCodigoBarra = document.getElementById('idCodigoBarra').value;
		
		  if(idCodigoBarra.length <2){
			alertify.error('ERROR codigo barra muy corto');
			$('#idCodigoBarra').val("");
			return;
		  }else if(idCodigoBarra.length >14){
			alertify.error('ERROR codigo barra muy largo');
			$('#idCodigoBarra').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarprecio(elemento){
		var precio = document.getElementById('precio').value;
		
		  if(precio < 40){
			alertify.error('ERROR precio muy bajo');
			$('#precio').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarprecioU(elemento){
		var precioU = document.getElementById('precioU').value;
		
		  if(precioU < 40){
			alertify.error('ERROR precio muy bajo');
			$('#precioU').val("");
			return;
		  }
		 
		
	}
</script>