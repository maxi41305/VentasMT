


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
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
					<div class="panel panel-heading">RECUPERAR CONTRASEÑA</div>
					<div class="panel panel-body">
						<form id="frmRecuperarcontrasenia">
							<label>Ingresar Correo Electronico</label>
							<input type="text" class="form-control input-sm" name="correo" id="correo">
							<label>Ingresar D.N.I</label>
							<input type="text" class="form-control input-sm" name="dni" id="dni">
							<p></p>
							<span class="btn btn-primary" id="registro">SIGUIENTE</span>
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

			vacios=validarFormVacio('frmRecuperarcontrasenia');

			if(vacios > 0){
				alert("CAMPOS VACIOS");
				return false;
			}

			datos=$('#frmRecuperarcontrasenia').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/RecuperarUsuario.php",
				success:function(r){
					
					if(r==1){
						
						
						alert("Correo enviado Junto con su nueva contraseña");
						window.location="index.php";
					}else{
						
						alert("ERROR DNI O CORREO INCORRECTOS :(");
					}
				}
			});
		});
	});
</script>
