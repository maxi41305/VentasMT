<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<?php require_once "dependencias.php"; ?>
	<?php require_once "menu.php"; ?>
</head>
<body style="background-color: ">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">CAMBIAR CONTRASEÑA</div>
					<div class="panel panel-body">
						<form id="frmCambiarcontrasenia">
						<label>Ingresar Contraseña Anterior</label>
							<input type="text" class="form-control input-sm" name="contraseniaAnterior" id="contraseniaAnterior">
							<label>Ingresar Contraseña nueva</label>
							<input type="text" class="form-control input-sm" name="contrasenia1" id="contrasenia1">
							<p></p>
							<span class="btn btn-primary" id="cambiar">SIGUIENTE</span>
							<a href="inicio.php" class="btn btn-default">REGRESAR</a>
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
		$('#cambiar').click(function(){

			vacios=validarFormVacio('frmCambiarcontrasenia');

			if(vacios > 0){
				alert("CAMPOS VACIOS");
				return false;
			}

			datos=$('#frmCambiarcontrasenia').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/regLogin/cambiarContrasenia.php",
				success:function(r){
					

					if(r==1){
						alert('CAMBIO CON EXITO');
						window.location="inicio.php";
					}else{
						alert('CONTRASEÑA ANTERIOR INCORRECTA');
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
contraseniaAnterior.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>
<script>
contrasenia1.addEventListener("keyup",e=>{    
            let string = e.target.value;    
            // trim() , trimEnd(), trimStart()            
            //e.target.value = string.trim();
            // e.target.value = string.trimEnd();
            e.target.value = string.trimStart();
})
</script>