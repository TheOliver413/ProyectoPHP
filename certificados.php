<?php
insertado($_POST['id'],$_POST['cedula'],$_POST['diplomas'],$_POST['afiliacionarl'],$_POST['afiliacioncajacompensacion'],
$_POST['contrato'],$_POST['hojadevida'],$_POST['cedulampliada'],$_POST['antecedentescontraloria'],$_POST['antecedentespolicia'],
$_POST['afiliacionEPS']);

function insertado($id,$cedula,$diplomas,$afiliacionarl,$afiliacioncajacompensacion,$contrato,$hojadevida,$cedulampliada,$antecedentescontraloria,
$antecedentespolicia,$afiliacionEPS)
{

include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO certificados VALUES ('".$id."','".$cedula."','".$diplomas."','".$afiliacionarl."',
'".$afiliacioncajacompensacion."','".$contrato."','".$hojadevida."','".$cedulampliada."','".$antecedentescontraloria."','".$antecedentespolicia."',
'".$afiliacionEPS."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Certificados.html'; 

</script>
?>