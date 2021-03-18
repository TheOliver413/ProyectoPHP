<?php

ModificarInsumos($_POST['nombre'],$_POST['descripcion'],$_POST['unidades'],$_POST['precio'],$_POST['num']);


function ModificarInsumos($Nombre,$Descripcion,$Unidades,$Precio,$Num)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="UPDATE insumos SET Nombre='".$Nombre."', Descripcion='".$Descripcion."', Unidades='".$Unidades."', Precio='".$Precio."'WHERE Num='".$Num."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


}

?>
<script>
alert("Datos del Insumo Modificados Exitosamente");
window.location.href='Tabla_Insumos.php';
</script>