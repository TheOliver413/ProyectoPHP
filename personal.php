<?php
require 'conexiontablas.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$cargo = $_POST['cargo'];
$tipodecontrato = $_POST['tipodecontrato'];
$rol = $_POST['rol'];
$cuentabancaria = $_POST['cuentabancaria'];
$contraseña = $_POST['contraseña'];
$img = $_POST['img'];

$insertar = "INSERT INTO personal VALUES ('$cedula','$nombre','$apellido','$telefono','$direccion','$cargo,'$tipodecontrato','$rol',
'$cuentabancaria','$contraseña','$img');";

$resultado = mysqli_query($conn,$insertar);

if($resultado){
    echo "<script> alert('Datos insertados'); 
            location.href = 'personal.html'; 
          </script>";
}
else{
    echo "<script> alert('Datos no insertados'); 
            location.href = 'personal.html'; 
        </script>";
}
?>