<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		require_once "menu.php"; 
    
    
 ?>
<html>
  <head>
  <title>Estadística</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
          require_once "../clases/Conexion.php";
                $c=new conectar();
                $conexion=$c->conexion();
                    $SQL = "SELECT * FROM articulos where borrado=0 ORDER BY cantidad ASC";
                    $consulta=mysqli_query($conexion,$SQL);
                    $n=0;
                    $contador=8;
                    while ($resultado = mysqli_fetch_assoc($consulta)){
                        if($n<$contador){
                            echo "['" .$resultado['nombre']."', ".$resultado['cantidad']."],";
                            $n=$n+1;
                        }
                    
                }
        
 ?>


        ]);

        var options = {
          title: 'Artículos con Menor Stock',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>