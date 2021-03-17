<?php
require 'conexiontablas.php';

$codigo = $_POST['codigo'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$unidades = $_POST['unidades'];
$precio= $_POST['precio'];
$total = $_POST['total'];


$insertar = "INSERT INTO insumos VALUES ('$codigo','$cedula','$nombre','$descripcion','$unidades','$precio,'$total');";

$resultado = mysqli_query($conn,$insertar);

if($resultado){
    echo "<script> alert('Datos insertados'); 
            location.href = 'insumos.html'; 
          </script>";
}
else{
    echo "<script> alert('Datos no insertados'); 
            location.href = 'insumos.html'; 
        </script>";
}
?>