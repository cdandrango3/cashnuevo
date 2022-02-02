
<?php
	
	$valoresY=array('10','20','30','10','20','30','40','10',10,25,5,1);//montos
	$valoresX=array('Enero','Febrero','Marzo','Abril','Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');//fechas

	

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<div id="graficaLineal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter'
	};

	var data = [trace1];

	Plotly.newPlot('graficaLineal', data);
</script>