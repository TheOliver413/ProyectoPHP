<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="Ingeambiental";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$conn){
        die("No hay conexion: ".mysqli_connect_error());
    }
    session_start();

    $nombre=$_POST["email"];
    $pass=$_POST["pass"];

    $_SESSION['usuario'] = $nombre;

    $clave=md5($pass);

    $query=mysqli_query($conn,"SELECT * FROM personal WHERE Cedula='".$nombre."' AND Contraseña='".$clave."'");
    $nr=mysqli_num_rows($query);

    if($nr == 1){
        header("Location: Menu_Administrador.html");
    }else if($nr != 1){
        echo("Datos Erroneos");
    }   
?>