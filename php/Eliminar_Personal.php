<?php

$cedula=($_GET["cedula"]);
$conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="DELETE FROM personal WHERE Cedula='".$cedula."'";
    $rs=mysqli_query($conexion,$sentencia);

?>

<script>
alert("Datos del Usuario '<?php $Cedula?>' Eliminados Exitosamente");
window.location.href='Tabla_personal.php';
</script>