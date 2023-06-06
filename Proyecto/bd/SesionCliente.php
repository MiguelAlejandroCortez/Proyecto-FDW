<?php
session_start();
require_once "CAD.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/eliminaEstilos.css">
    <title>CLIENTE</title>
</head>
<body>
    <h1>HOLA CLIENTE </h1>
    <h3>¿Desea Actualizar su usuario?</h3>
 <?php   
$cad = new CAD();

$idUsuario = $_SESSION['idUsuario'];

$datosUsuario = $cad->traeUsuarioPorId($idUsuario);

if ($datosUsuario) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>idUsuario</th>";
    echo "<th>Nombre</th>";
    echo "<th>Correo</th>";
    echo "<th>Monto</th>";
    echo "<th>Actualizar</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>".$datosUsuario['idUsuario']."</td>";
    echo "<td>".$datosUsuario['nombre']."</td>";
    echo "<td>".$datosUsuario['correoe']."</td>";
    echo "<td>".$datosUsuario['monto']."</td>";
    echo "<td><a href='actualiza.php?idUsuario=".$datosUsuario['idUsuario']."'>Actualizar</a></td>";
    echo "</tr>";

    echo "</table>";
}

$compras = $cad->traeComprasPorIdUsuario($idUsuario);

if ($compras) {
    echo "<h3>Carrito de Compras</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>Fecha de Compra</th>";
    echo "<th>Precio</th>";
    echo "<th>Nombre</th>";
    echo "<th>Marca</th>";
    echo "<th>Producto</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";

    foreach ($compras as $compra) {
        echo "<tr>";
        echo "<td>".$compra['fecha_Venta']."</td>";
        echo "<td>".$compra['precio']."</td>";
        echo "<td>".$compra['nombre']."</td>";
        echo "<td>".$compra['marca']."</td>";
        echo "<td><img height='100' src='data:image/;base64,".base64_encode($compra['foto'])."' alt=''></td>";
        echo "<td><a href='eliminaVenta.php?idVenta=".$compra['idVenta']."'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}


?>

<div class="button-container">
    <a href="http://localhost/Proyecto/principal.php"><button class="button">Volver a la página principal</button></a>
</div>
<div class="button-container">
    <a href="http://localhost/Proyecto/bd/Cerrar.php"><button class="button">Cerrar Sesión</button></a>
    <p><br><br></p>
</div>

</body>
</html>