<?php



$consulta=ConsultarPersonal($_GET['cedula']);

function ConsultarPersonal($Cedula)
{
    $conexion=mysqli_connect("localhost","root","","Ingeambiental");
    $sentencia="SELECT * FROM personal WHERE Cedula='".$Cedula."' ";
    $result=mysqli_query($conexion,$sentencia);
    $mostrar=mysqli_fetch_assoc($result);
    return[
        $mostrar['Cedula'],
        $mostrar['Nombre'],
        $mostrar['Apellido'],
        $mostrar['Telefono'],
        $mostrar['Direccion'],
        $mostrar['Cargo'],
        $mostrar['Tipo_de_contrato'],
        $mostrar['Rol'],
        $mostrar['Cuenta_bancaria'],
        $mostrar['Contraseña'],
        $mostrar['Imagen']
    ];

}



?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/formulario_personal.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="../js/icons.js"></script>

    <title>ADMINISTRADOR</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
                <button id="sidebarCollapse" class="btn navbar-btn">
                    <i class="fas fa-lg fa-bars"></i>
                </button>
                <a id="logo" href="../Menu_Administrador.html"><img src="../imagenes/logo.png" alt=""></a>
            
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                            <i class="fas fa-sign-out-alt"></i>
                            Cerrar Sesion<span class="sr-only"> </span>
                        </ul>
        </nav>
    </header>

    <section id="todo">
      <nav id="sidebar">
        <img src="../imagenes/usuario.png" alt="">
        <h1>ADMINISTRADOR</h1>
      

        <h2>Nombre :<spam></spam></h2>
        <h2>Apellido :<spam></spam></h2>
        <h2>Telefono :<spam></h2>
        <h2>Cargo :<spam></spam></h2>
    </nav>

    <div class="fondo">
        
        
<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">              
           <div class="carousel-item active">
   
               <form action="Modificar_Personal2.php" method="POST">
                   <h2 class="form__titulo">Actualizar Personal</h2>
                   <div class="contendor-inputs">
                       <input type="hidden" id="cedula" name="cedula" placeholder="Cedula" class="input-100" value="<?php echo $_GET['cedula'] ?>" required>
                       <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input-48" value="<?php echo $consulta[1] ?>"required>
                       <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="input-48" value="<?php echo $consulta[2] ?>"required>
                       <input type="number" id="telefono" name="telefono" placeholder="Telefono" class="input-48"value="<?php echo $consulta[3] ?>" required>
                       <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="input-48" value="<?php echo $consulta[4] ?>"required>
                       <input type="text" id="cargo" name="cargo" placeholder="Cargo" class="input-48" value="<?php echo $consulta[5] ?>" required>
                       <select class="input-48" name="tipodecontrato" value="<?php echo $consulta[6] ?>">
                           <option selected>Tipo de contrato</option>
                           <option>Término fijo</option>
                           <option>Término indefinido</option>
                       </select>
                       <select class="input-48" name="rol" value="<?php echo $consulta[7] ?>">
                           <option selected>Rol</option>
                           <option>Empleado</option>
                           <option>Administrador</option>
                       </select>
                       <input type="number" id="cuentabancaria" name="cuentabancaria" placeholder="N° cuenta bancaria"class="input-48" value="<?php echo $consulta[8] ?>" required>
                       <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="input-100" value="<?php echo $consulta[9] ?>"required>
                       <label>Foto Empleado:</label>
                       <input type="file" required class="file" name="img" value="<?php echo $consulta[10] ?>">
   
                       <input type="submit" name="btninsert" value="Enviar" class="btn-enviar" class="input-100">
                   </div>
               </form>
           </div>
           </div>
           
       </div>
      
    </div> <!--fondo -->
    </section>
    

  

  
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/tabla.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>