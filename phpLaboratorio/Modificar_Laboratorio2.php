<?php

ModificarLaboratorio($_POST['nombre'],$_POST['descripcion'],$_POST['marca'],$_POST['referencia'],$_POST['unidades'],$_POST['precio'],$_POST['num']);


function ModificarLaboratorio($Nombre,$Descripcion,$Marca,$Referencia,$Unidades,$Precio,$Num)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="UPDATE laboratorio SET Nombre='".$Nombre."', Descripcion='".$Descripcion."',Marca='".$Marca."',Referencia='".$Referencia."', Unidades='".$Unidades."', Precio='".$Precio."'WHERE Num='".$Num."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


}

?>
<script>
alert("Datos del Laboratorio Modificados Exitosamente");
window.location.href='Tabla_Laboratorio.php';
</script>