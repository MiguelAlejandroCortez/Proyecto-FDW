<?php
session_start();
require_once "CAD.php";

if(isset($_POST['nombre']) && isset($_POST['contraseña'])){
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $cad = new CAD();
    if($cad->verificaUsuario($nombre, $contraseña)){
        $_SESSION['nombre'] = $nombre;

        $rol = $_SESSION['rol'];

        if($rol == 1){
            header("Location: ../principal.php");
            exit;
        }elseif($rol == 2){
            header("Location: ../principal.php");
            exit;
        }elseif($rol == 3){
            header("Location: ../principal.php");
            exit;
        }else{
            echo "Rol desconocido";
        }
    }else{
        echo "Correo de usuario o contraseña incorrectos";
    }
}

unset($_POST['nombre']);
unset($_POST['contraseña']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/InicioSesionEstilos.css">
</head>
<body>
    <div class="formulario">
        <h1>Inicio de sesión</h1>
        <form action="inicioSesion.php" method="POST">
            <div class="username">
                <input type="text" name="nombre" required>
                <label>Nombre de Usuario</label>
            </div>
            <div class="username">
                <input type="password" name="contraseña" required>
                <label>Contraseña</label>
            </div>
            <input type="submit" value="Iniciar">
            <div class="registrarse">
                ¿Quieres registrarte? <a href="opcRegistros.php">Registro</a>
            </div>
        </form>
        <div class="button-container">
            <a href="http://localhost/Proyecto/principal.php"><button class="button">Volver a la página principal</button></a>
        </div>
    </div>



    <script src="js/inicioSesionJS.js"></script>
</body>
</html>