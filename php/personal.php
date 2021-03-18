<?php
insertado($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'],
$_POST['direccion'], $_POST['cargo'],$_POST['tipodecontrato'], $_POST['rol'], $_POST['cuentabancaria'],
$_POST['contraseña'],$img=getimagesize($_FILES["img"]["tmp_name"]));

function insertado($cedula,$nombre,$apellido,$telefono,$direccion,$cargo,$tipodecontrato,$rol,$cuentabancaria,$contraseña,
$img)
{

include('conexiontablas.php');    
 $con = New Conexion();
$sentencia="INSERT INTO personal VALUES ('".$cedula."','".$nombre."','".$apellido."','".$telefono."',
'".$direccion."','".$cargo."','".$tipodecontrato."','".$rol."','".$cuentabancaria."','".$contraseña."',
'".$img."')";
$resultado=$con->query($sentencia) or die("Error de datos".mysqli_error($con));
}

?>

<script type="text/javascript">

alert("Se inserto el registro correctamente");
window.location.href='Tabla_Personal.php'; 

</script>
?>