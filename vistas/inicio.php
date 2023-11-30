<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
	<?php require_once "dependencias.php" ?>
</head>
<body>

<?php require_once "Slider.php"; ?>

<section class="container">
	</section>

</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>