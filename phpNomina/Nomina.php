<?php
    $cedula=$_POST["cedula"];
    $salarioMensual=$_POST["salariomensual"];
    $diasw=$_POST["diasw"];
    $otros=$_POST["otros"];
    $prestamosA=$_POST["prestamosanticipos"];
    $salud=$salarioMensual*0.04;
    $fecha=$_POST["fecha"];


    if($salarioMensual<=1817052){
        $auxiloT=106454/2;
        $devengado=0;
        $deducible=0;
        $valorD=$salarioMensual/(30);
        $salarioQuincenal=$valorD*$diasw;
        $devengado=$salarioQuincenal+$auxiloT+$otros;
        $deducible=$salud+$prestamosA;
        round($total=$devengado-$deducible);

    }
    else{
        $auxiloT=0;
        $devengado=0;
        $deducible=0;
        $valorD=$salarioMensual/(30);
        $salarioQuincenal=$valorD*$diasw;
        $devengado=$salarioQuincenal+$auxiloT+$otros;
        $deducible=$salud+$prestamosA;
        round($total=$devengado-$deducible);
    }

    // echo "<br>";
    // echo "Cedula: ".$cedula;
    // echo "<br>";
    // echo "Mensual: ".$salarioMensual;
    // echo "<br>";
    // echo "DiasW: ".$diasw;
    // echo "<br>";
    // echo "Quincenal: ".$salarioQuincenal;
    // echo "<br>";
    // echo "Auxilio: ".$auxiloT;
    // echo "<br>";
    // echo "Otros: ".$otros;
    // echo "<br>";
    // echo "Devengado: ".$devengado;
    // echo "<br>";
    // echo "Salud: ".$salud;
    // echo "<br>";
    // echo "Prestamos Anticipos: ".$prestamosA;
    // echo "<br>";
    // echo "Deducible: ".$deducible;
    // echo "<br>";
    // echo "Fecha: ".$fecha;
    // echo "<br>";

    insertado($cedula,$salarioMensual,$diasw,$salarioQuincenal,$auxiloT,$otros,$devengado,$salud,$prestamosA,$deducible,$fecha,$total);

    function insertado($cedula,$salarioMensual,$diasw,$salarioQuincenal,$auxiloT,$otros,$devengado,$salud,$prestamosA,$deducible,$fecha,$total){

    include('conexiontablas.php');    
    $con = New Conexion();
    $sentencia="INSERT INTO nomina (Cedula, Salario_mensual, Dias_W, Salario_quincenal, Auxilio_transporte, Otros, Total_devengado, salud_Pension, Prestamos_anticipos, Total_deducciones, Fecha, Neto_a_Pagar)
    VALUES ('".$cedula."','".$salarioMensual."','".$diasw."','".$salarioQuincenal."','".$auxiloT."','".$otros."','".$devengado."','".$salud."','".$prestamosA."','".$deducible."','".$fecha."','".$total."')";
    $resultado=$con->query($sentencia) or die("Error de datos ".mysqli_error($con));
    }

    ?>

<script type="text/javascript">
    alert("Se inserto el registro correctamente");
    window.location.href = 'Tabla_Nomina.php';
</script>

?>