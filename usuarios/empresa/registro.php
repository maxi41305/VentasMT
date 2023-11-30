<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-danger">
					<div class="panel panel-heading">REGISTRAR ADMINISTRADOR</div>
					<div class="panel panel-body">
						<form id="frmRegistro">
							<label>NOMBRE</label>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre">
							<label>APELLIDO</label>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido">
							<label>USUARIO</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>CONTRASEÑA</label>
							<input type="text" class="form-control input-sm" name="password" id="password">
							<p></p>
							<span class="btn btn-primary" id="registro">REGISTRAR</span>
							<a href="index.php" class="btn btn-default">REGRESAR</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("CAMPOS VACIOS");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("REGISTRADO CON EXITO");
					}else{
						alert("FALLO AL REGISTRAR");
					}
				}
			});
		});
	});
</script>

