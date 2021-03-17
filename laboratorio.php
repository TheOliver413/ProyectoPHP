<?php
insertado($_POST['codigo'],$_POST['cedula'],$_POST['nombre'],$_POST['marca'],$_POST['referencia'],$_POST['unidades']);

function insertado($codigo,$cedula,$nombre,$marca,$referencia,$unidades)
{
include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO laboratorio VALUES ('".$codigo."','".$cedula."','".$nombre."',
'".$marca."','".$referencia."','".$unidades."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Laboratorio.html'; 

</script>
?>