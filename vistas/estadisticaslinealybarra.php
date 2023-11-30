<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Estadística</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Estadística  Electronica MT
					</div>
					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaBarras"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load("estadisticas/lineal.php");
		$('#cargaBarras').load("estadisticas/barras.php");

	});
</script>
<?php 
}else{
	header("location:../index.php");
}
?>
