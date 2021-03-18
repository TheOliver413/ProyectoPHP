<?php

ModificarPersonal($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['direccion'],$_POST['cargo'],$_POST['tipodecontrato'],$_POST['rol'],$_POST['cuentabancaria'],$_POST['contraseña'],$_POST['img'],$_POST['cedula']);


function ModificarPersonal($Nombre,$Apellido,$Telefono,$Direccion,$Cargo,$Tipo_de_contrato,$Rol,$Cuenta_bancaria,$Contraseña,$Imagen,$Cedula)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="UPDATE personal SET Nombre='".$Nombre."', Apellido='".$Apellido."', Telefono='".$Telefono."', Direccion='".$Direccion."', Cargo='".$Cargo."', Tipo_de_contrato='".$Tipo_de_contrato."',Rol='".$Rol."',Cuenta_bancaria='".$Cuenta_bancaria."',Contraseña='".$Contraseña."',img='".$Imagen."'WHERE Cedula='".$Cedula."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


}

?>
<script>
alert("Datos del Usuario '<?php $Cedula?>' Modificados Exitosamente");
window.location.href='Tabla_personal.php';
</script>