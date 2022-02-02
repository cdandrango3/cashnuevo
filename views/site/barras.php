<?php
	$valoresY=array('10','20','30','10','20','30','40','10',10,25,5,1);//montos
	$valoresX=array('Enero','Febrero','Marzo','Abril','Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');//fechas
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

	Plotly.newPlot('graficaBarras', data);
</script>