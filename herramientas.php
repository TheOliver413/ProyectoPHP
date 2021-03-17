<?php
insertado($_POST['num'],$_POST['cedula'],$_POST['nombre'],$_POST['unidades']);

function insertado($id,$cedula,$nombre,$unidades)
{
include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO herramientas VALUES ('".$num."','".$cedula."','".$nombre."',
'".$unidades."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Herramientas.html'; 

</script>
?>