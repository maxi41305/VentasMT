<?php
		require_once "../../clases/Conexion.php";  
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT fechaCompra,total 
				from ventas order by fechaCompra, total DESC";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
		{
			x: datosX,
			y: datosY,
			type: 'bar'
		}
	];
	var layout = {
  title: 'GRAFICO BARRA',
  xaxis: {
    title: 'FECHAS'
  },
  yaxis: {
    title: 'TOTAL VENTAS'
  }
};

	Plotly.newPlot('graficaBarras', data, layout);
</script>