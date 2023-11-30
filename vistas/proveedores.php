<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Proveedores</title>
		<?php require_once "menu.php"; ?>

	</head>
	<body>
		<div class="container">
			<h1>Proveedores</h1>
		
			<div class="row">
				<div class="col-sm-4">
					<form id="frmProveedores" enctype="multipart/form-data">
						<label>Nombre provedor</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" onkeypress="return soloLetras(event)" onblur="validarnombre(this)">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="direccion" name="direccion" onblur="validardireccion(this)">
						<label>Numero</label>
						<input type="number" class="form-control input-sm" id="numero" name="numero" onblur="validartelefono(this)">
						<p></p>
						<span id="btnAgregarproveedor" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
				<div id="tablaProveedorLoad"></div>
				</div>

			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Proveedor</h4>
					</div>
					<div class="modal-body">
						<form id="frmProveedorU" enctype="multipart/form-data">
							<input type="text" id="id_proveedor" hidden="" name="id_proveedor">
					
							<label>Nombre proveeddor</label>
							<input type="text" class="form-control input-sm" id="nombreproveedorU" name="nombreproveedorU" onkeypress="return soloLetras(event)" onblur="validarnombreU(this)">
							<label>Direccion</label>
							<input type="text" class="form-control input-sm" id="direccionU" name="direccionU" onblur="validardireccionU(this)">
							<label>Numero</label>
							<input type="number" class="form-control input-sm" id="numeroU" name="numeroU" onblur="validartelefonoU(this)">
													
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizarproveedor" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaProveedorLoad').load("proveedores/tablaproveedores.php");

			$('#btnAgregarproveedor').click(function(){

				vacios=validarFormVacio('frmProveedores');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmProveedores').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/proveedores/agregarProveedor.php",
					success:function(r){
						console.log(r);
						if(r==4){
							alertify.error("Nombre proveedor existente verifique en la tabla");
							$('#nombre').val("");
						}

						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmProveedores')[0].reset();

					$('#tablaProveedorLoad').load("proveedores/tablaproveedores.php");
					alertify.success("proveedor agregado con exito :D");
				}else{
					if(r==2){
						alertify.error("telefono existente, el campo sera vaciado");
						$('#numero').val("");
					}else{
					
					if(r==3){
						var idproveedor = document.getElementById('nombre').value;
						alertify.confirm('Este proveedor se encuentra en la papelera ¿desea restaurarlo?', function(){ 
				$.ajax({
					type:"POST",
					data:"idproveedor=" + idproveedor,
					url:"../procesos/proveedores/restaurarProveedor.php",
					success:function(r){
						if(r==1){
							$('#frmProveedores')[0].reset();
							$('#tablaProveedorLoad').load("proveedores/tablaProveedores.php");
							alertify.success("restaurado con existo con exito!!");
						}else{ if(r==3){
							alertify.error("No se pudo restaurar");

						}
							
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
					}
				}
					
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizarproveedor').click(function(){

				vacios=validarFormVacio('frmProveedorU');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmProveedorU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/proveedores/actualizarProveedor.php",
					success:function(r){
						console.log(r);
						if(r==1){
							$('#tablaProveedorLoad').load("proveedores/tablaProveedores.php");
							alertify.success("Actualizado con exito :)");
						}else{
							if(r==5){
							alertify.error("Este telefono ya existe, vuelva a intentar");
							}else if(r==4){
								alertify.error("Este nombre ya existe, vuelva a intentar");
							}else{
							alertify.error("No se pudo actualizar");
						}
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function agregaDato(idProveedor,nombreproveedor,direccion,numero){
			$('#id_proveedor').val(idProveedor);
			$('#nombreproveedorU').val(nombreproveedor);
			$('#direccionU').val(direccion);
			$('#numeroU').val(numero);
		}

	function eliminaProveedor(idproveedor){
			alertify.confirm('¿Desea eliminar esta proveedor?', function(){ 
				$.ajax({
					type:"POST",
					data:"idproveedor=" + idproveedor,
					url:"../procesos/proveedores/eliminarproveedor.php",
					success:function(r){
						if(r==1){
							$('#tablaProveedorLoad').load("proveedores/tablaProveedores.php");
							alertify.success("Eliminado con exito!!");
						}else{ if(r==3){
							alertify.error("No se pudo eliminar el proveedor esta siendo ocupado");

						}
							
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>
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
direccion.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
numero.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
nombreproveedorU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
direccionU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
numeroU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
function validartelefono(elemento){
		var telefono = document.getElementById('numero').value;
		
		  if(telefono.length <10){
			alertify.error('ERROR telefono muy corto');
			$('#numero').val("");
			return;
		  } if(telefono.length >15){
			alertify.error('ERROR telefono muy largo');
			$('#numero').val("");
			return;
		  }
		 
		
	}
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
  function validartelefonoU(elemento){
		var telefono = document.getElementById('numeroU').value;
		
		  if(telefono.length <10){
			alertify.error('ERROR telefono muy corto');
			$('#numeroU').val("");
			return;
		  } if(telefono.length >15){
			alertify.error('ERROR telefono muy largo');
			$('#numeroU').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validardireccion(elemento){
		var direccion = document.getElementById('direccion').value;
		
		  if(direccion.length <2){
			alertify.error('ERROR direccion muy corto');
			$('#direccion').val("");
			return;
		  }else if(direccion.length >50){
			alertify.error('ERROR direccion muy largo');
			$('#direccion').val("");
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
function validardireccionU(elemento){
		var direccionU = document.getElementById('direccionU').value;
		
		  if(direccionU.length <2){
			alertify.error('ERROR direccion muy corto');
			$('#direccionU').val("");
			return;
		  }else if(direccionU.length >50){
			alertify.error('ERROR direccion muy largo');
			$('#direccionU').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarnombreU(elemento){
		var nombreproveedorU = document.getElementById('nombreproveedorU').value;
		
		  if(nombreproveedorU.length <2){
			alertify.error('ERROR nombre muy corto');
			$('#nombreproveedorU').val("");
			return;
		  }else if(nombreproveedorU.length >30){
			alertify.error('ERROR nombre muy largo');
			$('#nombreproveedorU').val("");
			return;
		  }
		 
		
	}
</script>