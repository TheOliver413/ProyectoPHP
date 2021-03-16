<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="ingeambiental";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$conn){
        die("No hay conexion: ".mysqli_connect_error());
    }
    $nombre=$_POST["email"];
    $pass=$_POST["pass"];

    $query=mysqli_query($conn,"SELECT * FROM personal WHERE Cedula='".$nombre."' AND contraseña='".$pass."'");
    $nr=mysqli_num_rows($query);

    if($nr == 1){
        header("Location: ../menu.html");
    }else if($nr != 1){
        echo("Datos Erroneos");
    }   
?>