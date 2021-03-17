<?php
insertado($_POST['id'],$_POST['cedula'],$_POST['producto'],$_POST['nombre'],$_POST['unidades'],$_POST['fecha']);

function insertado($id,$cedula,$producto,$nombre,$unidades,$fecha)
{
include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO entradas_primas VALUES ('".$id."','".$cedula."','".$producto."','".$nombre."',
'".$unidades."','".$fecha."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='EntradaMateriasPrimas.html'; 

</script>
?>