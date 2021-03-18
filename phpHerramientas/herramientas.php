<?php
insertado($_POST['num'],$_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio']);

function insertado($num,$nombre,$descripcion,$unidades,$precio)
{
include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO herramientas VALUES ('".$num."','".$nombre."','".$descripcion."',
'".$unidades."','".$precio."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Tabla_Herramientas.php'; 

</script>
?>