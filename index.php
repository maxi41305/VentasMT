<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body background="img/fondo20233.jpg">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">SISTEMA DE VENTAS MT.</div>
					<div class="panel panel-body">
						<p>
							<img src="img/ventas.jpg"  height="190">
						</p>
						<form id="frmLogin">
							<label>USUARIO</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>CONTRASEÑA</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							
							<span class="btn btn-primary btn-sm" id="entrarSistema">ENTRAR</span>
							<?php  if(!$validar): ?>
								<a href="registro.php" class="btn btn-success">Recuperar Contraseña</a>
							<?php endif; ?>

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
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("CAMPOS VACIOS!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){
					
				if(r==1){
					
					window.location="vistas/inicio.php";
				}else if(r==2){
					alert("El Software para Clientes Muy Pronto Sera Habilitado :D Muchas Gracias...");
					//window.location="usuarios/revendedor/menurevendedor.php";
				}else if(r==3){
					alert("El Software para Clientes Muy Pronto Sera Habilitado :D Muchas Gracias...");
					//window.location="usuarios/cliente/menucliente.php";
				}else if(r==4){
					//alert("empresa");
					window.location="usuarios/empresa/vistas/inicioempresa.php";
				}else{
					alert("Contraseña o Usuario Incorrecto");
				}
			
			}
		});
	});
	});
</script>