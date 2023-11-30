<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		require_once "menu.php"; 
    
    
 ?>
<html>


  <head>
  
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
                    $SQL = "SELECT id_producto, COUNT(id_producto) AS cuanto FROM detalle_venta GROUP BY 1 HAVING COUNT(id_producto) ORDER BY cuanto DESC";
                    $consulta=mysqli_query($conexion,$SQL);
                    $n=0;
                    $contador=6;
                    while ($resultado = mysqli_fetch_assoc($consulta)){
                       
                        $SQLl = "SELECT nombre FROM articulos WHERE idCodigoBarra= '$resultado[id_producto]'";
                        $consultaa=mysqli_query($conexion,$SQLl);
                        while ($resultadoo = mysqli_fetch_assoc($consultaa)){
                                
                            if($n<$contador){
                            echo "['" .$resultadoo['nombre']."', ".$resultado['cuanto']."],";
                            $n=$n+1;
                        }
                        }
                }
        
 ?>
	

        ]);

        var options = {
          title: 'Artículos Mas Vendidos',
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
