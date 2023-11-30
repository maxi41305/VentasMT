<?php 	
session_start();
if(isset($_SESSION['usuario'])){


?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>usuarios</title>
		<?php require_once "menu.php"; ?>

		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_nivel,nombrenivel
		from nivelusuario";
		$result=mysqli_query($conexion,$sql);
		?>




	</head>
	<body>
		<div class="container">
			<h1>Administrar usuarios</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">

						<select class="form-control input-sm" id="nivelSelect" name="nivelSelect">
							<option value="A">Selecciona Nivel</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>D.N.I</label>
						<input type="number" class="form-control input-sm" name="dni" id="dni" data-validation="number" onblur="validardni(this)" >
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombre" id="nombre" onkeypress="return soloLetras(event)" onblur="validarnombre(this)">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" name="apellido" id="apellido" onkeypress="return soloLetras(event)" onblur="validarapellido(this)">
						
						<label>Email o Usuario</label>
						<input type="email" class="form-control input-sm" name="usuario" id="usuario" data-validation="email" onblur="validarCorreo(this)" >
                        
						<p></p>
						<label>Telefono</label>
						<input type="number" class="form-control input-sm" id="telefono" name="telefono" onblur="validartelefono(this)">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="direccion" name="direccion" onblur="validardireccion(this)">
						<label>Password</label>
						<input type="password" class="form-control input-sm" name="password" id="password" onblur="validarpassword(this)">
						<p></p>
						<span class="btn btn-primary" id="registro">Registrar</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaUsuariosLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
						<label>Nivel Usuario</label>
						<select class="form-control input-sm" id="nivelSelectU" name="nivelSelectU">
								<option value="A">Selecciona Nivel Usuario</option>
								<?php 
									$sql="SELECT id_nivel,nombrenivel
									from nivelusuario";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombreU" id="nombreU" onkeypress="return soloLetras(event)" onblur="validarnombreU(this)">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU" onkeypress="return soloLetras(event)" onblur="validarapellidoU(this)">
							<label>Email</label>
							<input type="email" class="form-control input-sm" name="usuarioU" id="usuarioU" data-validation="email" onblur="correo(this)" >
							<label>Telefono</label>
							<input type="number" class="form-control input-sm" id="telefonoU" name="telefonoU" onblur="validartelefonoU(this)">
							<label>Dirección</label>
							<input type="text" class="form-control input-sm" id="direccionU" name="direccionU" onblur="validardireccionU(this)">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualiza Usuario</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		function agregaDatosUsuario(idusuario){

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procesos/usuarios/obtenDatosUsuario.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					
					$('#idUsuario').val(dato['id_usuario']);
					$('#nombreU').val(dato['nombre']);
					$('#apellidoU').val(dato['apellido']);
					$('#direccionU').val(dato['direccion']);
					$('#telefonoU').val(dato['telefono']);
					$('#usuarioU').val(dato['email']);
					$('#passwordU').val(dato['password']);
					$('#nivelSelectU').val(dato['id_nivel']);
					
				}
			});
		}

		function eliminarUsuario(idusuario){
			alertify.confirm('¿Desea eliminar este usuario?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../procesos/usuarios/eliminarUsuario.php",
					success:function(r){
						console.log(r);
						if(r==1){
							$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
							alertify.success("Eliminado con exito!!");
						}else if(r==3){
							alertify.error("Este usuario esta siendo utilizado no se puede eliminar");
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
			$('#btnActualizaUsuario').click(function(){

				vacios=validarFormVacio('frmRegistroU');

				if(vacios > 0){
					alertify.alert('Debes llenar todos los campos!!');
					return false;
				}

				datos=$('#frmRegistroU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/usuarios/actualizaUsuario.php",
					success:function(r){

						if(r==1){
							$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
							alertify.success("Actualizado con exito :D");
						}else{

							if(r==2){
							alertify.error("Este email ya existe, vuelva a intentar");
							$('#usuarioU').val("");
							}
						}
					}
				});
			
			});
		
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');

			$('#registro').click(function(){

				vacios=validarFormVacio('frmRegistro');
				
			
				if(vacios > 0){
					alertify.alert('Debes llenar todos los campos!!');
					return false;
				}
			
				
				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/regLogin/registrarUsuario.php",
					success:function(r){
						

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
							alertify.success("Agregado con exito");
						}else{
							if(r==3){
								alertify.error('ERROR dni repetido, el campo sera vaciado');
								$('#dni').val("");
							}else{
								if(r==4){
								alertify.error('ERROR telefono repetido, el campo sera vaciado');
								$('#telefono').val("");
							}else{
								if(r==5){
								alertify.error('ERROR email repetido, el campo sera vaciado');
								$('#usuario').val("");
							}else{
								if(r==2){
									var idusuario = document.getElementById('dni').value;
										alertify.confirm('Este Usuario se encuentra en la papelera. ¿lo desea restaurar?', function(){ 
										$.ajax({
											type:"POST",
											data:"idusuario=" + idusuario,
											url:"../procesos/usuarios/restaurarUsuario.php",
											success:function(r){
												if(r==1){
													$('#frmRegistro')[0].reset();
													$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
													alertify.success("Usuario restaurado");
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
							}
							}
							
						}
					}
				});
			});
		});
	</script>
<?php
}else{
	//header("location:../index.php");
}

?>

<script>
	// Java Scrip No permitir espacio 
dni.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
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
apellido.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
usuario.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
telefono.addEventListener("keyup",e=>{    
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
password.addEventListener("keyup",e=>{    
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
apellidoU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
telefonoU.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
usuarioU.addEventListener("keyup",e=>{    
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
function validarCorreo(elemento){
		var correo = document.getElementById('usuario').value;
		arroba = correo.indexOf("@");
		punto =  correo.lastIndexOf(".");
		extension= correo.split(".")[1];
		
		if (arroba < 1 || ( punto - arroba < 2 )||correo===""){
			alertify.error('ERROR correo invalido, el campo sera vaciado');
		   $('#usuario').val("");
		}else{
		  if(extension.length >3){
			alertify.error('ERROR correo invalido, el campo sera vaciado');
			$('#usuario').val("");
			return;
		  }
		  //alert("correo valido");
		
	}
   }
</script>
<script>
function correo(elemento){
		var correo = document.getElementById('usuarioU').value;
		arroba = correo.indexOf("@");
		punto =  correo.lastIndexOf(".");
		extension= correo.split(".")[1];
		
		if (arroba < 1 || ( punto - arroba < 2 )||correo===""){
			alertify.error('ERROR correo invalido, el campo sera vaciado');
		   $('#usuarioU').val("");
		}else{
		  if(extension.length >3){
			alertify.error('ERROR correo invalido, el campo sera vaciado');
			$('#usuarioU').val("");
			return;
		  }
		  //alert("correo valido");
		
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
function validarapellidoU(elemento){
		var apellidoU = document.getElementById('apellidoU').value;
		
		  if(apellidoU.length <2){
			alertify.error('ERROR apellido muy corto');
			$('#apellidoU').val("");
			return;
		  }else if(apellidoU.length >30){
			alertify.error('ERROR apellido muy largo');
			$('#apellidoU').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarapellido(elemento){
		var apellido = document.getElementById('apellido').value;
		
		  if(apellido.length <2){
			alertify.error('ERROR apellido muy corto');
			$('#apellido').val("");
			return;
		  }else if(apellido.length >30){
			alertify.error('ERROR apellido muy largo');
			$('#apellido').val("");
			return;
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
function validardni(elemento){
		var dni = document.getElementById('dni').value;
		
		  if(dni.length <7){
			alertify.error('ERROR dni muy corto');
			$('#dni').val("");
			return;
		  }else if(dni.length >8){
			alertify.error('ERROR dni muy largo');
			$('#dni').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validartelefono(elemento){
		var telefono = document.getElementById('telefono').value;
		
		  if(telefono.length <10){
			alertify.error('ERROR telefono muy corto');
			$('#telefono').val("");
			return;
		  }else if(telefono.length >15){
			alertify.error('ERROR telefono muy largo');
			$('#telefono').val("");
			return;
		  }
		 
		
	}
</script>
<script>
function validarpassword(elemento){
		var password = document.getElementById('password').value;
		
		  if(password.length <2){
			alertify.error('ERROR password muy corto');
			$('#password').val("");
			return;
		  }else if(password.length >50){
			alertify.error('ERROR password muy largo');
			$('#password').val("");
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
function validartelefonoU(elemento){
		var telefono = document.getElementById('telefonoU').value;
		
		  if(telefono.length <10){
			alertify.error('ERROR telefono muy corto');
			$('#telefonoU').val("");
			return;
		  }else if(telefono.length >15){
			alertify.error('ERROR telefono muy largo');
			$('#telefonoU').val("");
			return;
		  }
		 
		
	}
</script>


