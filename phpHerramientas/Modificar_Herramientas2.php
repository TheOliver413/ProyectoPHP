<?php

ModificarHerramientas($_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio'],$_POST['num']);


function ModificarHerramientas($Nombre,$Descripcion,$Unidades,$Precio,$Num)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="UPDATE herramientas SET Nombre='".$Nombre."', Descripcion='".$Descripcion."', Unidades='".$Unidades."', Precio='".$Precio."'WHERE Num='".$Num."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


}

?>
<script>
alert("Datos de la Herramienta Modificados Exitosamente");
window.location.href='Tabla_Herramientas.php';
</script>