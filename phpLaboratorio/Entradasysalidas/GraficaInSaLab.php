<?php
    $database = 'ingeambiental';
    $user = 'root';
    $pass = 'staxx';
         $anio=0;
         $pastel_jsonTable =0;

         if($_SERVER["REQUEST_METHOD"] == "POST"){
             $anio = ($_POST["anio"]);
         }
    try {
        $conn = new PDO ("mysql:host=localhost; dbname=$database",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($anio !=0){
            $pastel = $conn->query("select YEAR(Fecha) AS Año, SUM(Unidades) AS Unidades,Cedula FROM salidas_laboratorio WHERE YEAR(Fecha)='$anio' AND Cedula='1003742061' GROUP BY YEAR(Fecha);");

            $pastel_rows = array();
            $pastel_table = array();

            $pastel_table['cols'] = array(
                array('label' => 'Año','type' => 'string'),
                array('label' => 'Unidades','type' => 'number')
            );

            foreach($pastel as $p){
                $pastel_temp = array();
                $pastel_temp [] = array ('v' => (string) $p['Año']);
                $pastel_temp [] = array ('v' => (int) $p ['Unidades']);
                $pastel_rows [] = array ('c' => $pastel_temp);
            }
            $pastel_table['rows'] = $pastel_rows;
            $pastel_jsonTable = json_encode($pastel_table);
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' .$e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo2.png">
    <script src="https://kit.fontawesome.com/9793ebb1a8.js" crossorigin="anonymous"></script>
    <script src="JS/bootstrap.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Reporte Gráfico I.Lab</title>

    <script type="text/javascript">
        google.load('visualization','1',{'packages':['corechart']});

        <?php
            if($anio !=0){
        ?>
            google.setOnLoadCallback(drawChartPastel);
                function drawChartPastel(){
                    var data = new google.visualization.DataTable(<?=$pastel_jsonTable?>);
                    var option={
                        title: 'Unidades con salidas en el año especificado',
                        is3D: 'true',
                        width: 900,
                        height:700
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('grafico_pastel'));
                    chart.draw(data,option);
                }

        <?php
            }
        ?>


    </script>
</head>

<body>
            <div class="container">
                <h1>Consulta de salidas del inventario de laboratorio <?php if($anio !=0 ) echo "en " .$anio; else{ echo "Según año";} ?></h1>
                <form method="post">
                    <div>
                        <label for="unidades">Ingrese el año del que desea saber las unidades:</label>
                        <input type="number" class="form-control" name="anio">
                    </div>
                    <input type="submit" name="unidades" class="btn btn-primary">
                </form>
                <?php
                    if($anio !=0){
                ?>
                    <div id="grafico_pastel"></div>
                <?php
                    }
                ?>
            </div>
</body>

</html>