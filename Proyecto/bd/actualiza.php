<?php

require_once "cad.php";
#session_start();

$datosModificar = "";
$bandContra = false;
$bandCorreo = false;
$bandNombre = false;
$bandMonto = false;

if(isset($_POST['contraseña']))
{
    if($_POST['contraseña'] != "")
    {
        $contraseña = $_POST['contraseña'];
        $datosModificar = "contraseña='$contraseña'";
        $bandContra = true;
    }
}

if(isset($_POST['correo']))
{
    if($_POST['correo'] != "")
    {
        $correo = $_POST['correo'];
        if($bandContra)
        {
            $aux = $datosModificar;
            $datosModificar = "correoe ='$correo', ".$aux;
        }
        else
        {
            $datosModificar = "correoe='$correo'";    
        }
        $bandCorreo = true;
    }
}

if(isset($_POST['nombre']))
{
    if($_POST['nombre'] != "")
    {
        $nombre = $_POST['nombre'];
        if($bandContra || $bandCorreo)
        {
            $aux = $datosModificar;
            $datosModificar = "nombre ='$nombre', ".$aux;
        }
        else
        {
            $datosModificar = "nombre='$nombre'";    
        }
        $bandNombre = true;
    }
}

if(isset($_POST['monto']))
{
    if($_POST['monto'] != "")
    {
        $monto = $_POST['monto'];
        if($bandContra || $bandCorreo || $bandNombre)
        {
            $aux = $datosModificar;
            $datosModificar = "monto ='$monto', ".$aux;
        }
        else
        {
            $datosModificar = "monto='$monto'";    
        }
        $bandMonto = true;
    }
}

echo $datosModificar."<br>";

if($bandNombre || $bandCorreo || $bandContra || $bandMonto)
{
    $cad = new CAD();
    if($cad->modificaUsuario($datosModificar, $_SESSION['idUsuario']))
    {
        $idUsuario = $_SESSION['idUsuario'];
        echo "El usuario $idUsuario se ha actualizado correctamente";
    }
}
else
{
    echo "No se ha actualizado nada";
}

unset($_POST['nombre']);
unset($_POST['correo']);
unset($_POST['contraseña']);
unset($_POST['monto']);
$datosModificar = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZA</title>
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/actualizaEstilos.css">
</head>
<body>
    <h1>Actualiza tus datos</h1>
    <form action="actualiza.php" method="post">
        <span>Nombre:</span><input type="text" name="nombre"><br>
        <span>Correo:</span><input type="text" name="correo"><br>
        <span>Contraseña:</span><input type="text" name="contraseña"><br>
        <span>Monto:</span><input type="number" name="monto"><br>
        <br>
        <input type="submit" value="Actualiza tus datos">
    </form>
    <div class="button-container">
        <a href="http://localhost/Proyecto/principal.php"><button class="button">Volver a la página principal</button></a>
    </div>
</body>
</html>