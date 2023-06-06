<?php
require_once "CAD.php";

if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']))
{
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

        $cad = new CAD();    
    
        if($cad->verificaCorreoRegistrado($correo)){
            echo "El correo ya está registrado";
        }else{
            $cad->agregaVendedor($nombre, $contraseña, $correo);
            header("location: inicioSesion.php");
        }

}

unset($_POST['nombre']);
unset($_POST['correo']);
unset($_POST['contraseña']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro VENDEDOR</title>
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/registroEstilos.css">
</head>
<body>
    <div class="formulario">
        <h1>Registro de Vendedor</h1>
        <form action="registroVendedor.php" method="POST">
            <span>Escribe tu nombre:</span>
            <input type="text" name="nombre" required>
            <span>Escribe tu correo:</span>
            <input type="text" name="correo" required>
            <span>Escribe tu contraseña:</span>
            <input type="password" name="contraseña" required>
            <input type="submit" value="Registrate">
        </form>
        <div class="registrarse">
            ¿Ya tienes una cuenta? <a href="http://localhost/Proyecto/bd/inicioSesion.php">Inicia sesión</a>
        </div>
    </div>
</body>
</html>