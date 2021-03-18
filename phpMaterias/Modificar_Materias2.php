<?php

ModificarLaboratorio($_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio'],$_POST['num']);


function ModificarLaboratorio($Nombre,$Descripcion,$Unidades,$Precio,$Num)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="UPDATE materiasprimas SET Nombre='".$Nombre."', Descripcion='".$Descripcion."', Unidades='".$Unidades."', Precio='".$Precio."'WHERE Num='".$Num."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


}

?>
<script>
alert("Datos de la Materia Prima Modificados Exitosamente");
window.location.href='Tabla_Materias.php';
</script>