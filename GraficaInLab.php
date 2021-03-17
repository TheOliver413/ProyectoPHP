<?php
    require 'cn.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>REPORTES GRAFICOS</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Cantidad de productos ingresados al inventario Herramientas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Unidades',
            data: [
                <?php
                    $consulta = "SELECT * FROM entradas_laboratorio";
                    $resultado = $mysqli->query($consulta);
                    while($res=mysql_fetch_array($resultado)){
                ?>
                        ['<?php echo $res['Cedula']; ?>', <?php echo $res ['Unidades']?>],
                <?php        
                    }
                ?>
            ]
        }]
    });
});


		</script>
	</head>
	<body>
        <script src="Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
        <script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</body>
</html>