<?php
insertado($_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio']);

function insertado($nombre,$descripcion,$unidades,$unipreciodades)
{
include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO herramientas VALUES(null,'".$nombre."','".$descripcion."', '".$unidades."','".$unipreciodades."', 0, 0,0)";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Tabla_Herramientas.php'; 

</script>
?>