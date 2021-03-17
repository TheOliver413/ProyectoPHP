<?php
insertado($_POST['num'],$_POST['cedula'],$_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio'],$_POST['total']);

function insertado($codigo,$cedula,$nombre,$descripcion,$unidades,$precio,$total)
{

include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO materiasprimas VALUES ('".$num."','".$cedula."','".$nombre."','".$descripcion."','".$unidades."','".$precio."','".$total."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='MateriasPrimas.html'; 

</script>
?>