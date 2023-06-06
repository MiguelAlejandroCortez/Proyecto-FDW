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
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/sesionEstilos.css">
    <title>VENDEDOR</title>
</head>
<body>
    <h1>HOLA VENDEDOR </h1>
    <h3>¿Desea Actualizar su usuario?</h3>
 <?php   
$cad = new CAD();

$IdVendedor = $_SESSION['IdVendedor'];

$datosVendedor = $cad->traeUsuarioPorIdVendedor($IdVendedor);

if ($datosVendedor) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>idVendedor</th>";
    echo "<th>Nombre</th>";
    echo "<th>Correo</th>";
    echo "<th>Actualizar</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>".$datosVendedor['IdVendedor']."</td>";
    echo "<td>".$datosVendedor['nombre']."</td>";
    echo "<td>".$datosVendedor['correoe']."</td>";
    echo "<td><a href='actualizaVendedor.php?IdVendedor=".$datosVendedor['IdVendedor']."'>Actualizar</a></td>";
    echo "</tr>";

    echo "</table>";
}

$datosProducto = $cad->traeProductoPorIdVendedor($IdVendedor);

if ($datosProducto) {
    echo "<h3>Tus Productos</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>idProd</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Precio</th>";
    echo "<th>Nombre</th>";
    echo "<th>Categoria</th>";
    echo "<th>Marca</th>";
    echo "<th>Stock</th>";
    echo "<th>Foto</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
    
    foreach ($datosProducto as $producto) {
        echo "<tr>";
        echo "<td>".$producto['idProd']."</td>";
        echo "<td>".$producto['descripcion']."</td>";
        echo "<td>".$producto['precio']."</td>";
        echo "<td>".$producto['nombre']."</td>";
        echo "<td>".$producto['categoria']."</td>";
        echo "<td>".$producto['marca']."</td>";
        echo "<td>".$producto['stock']."</td>";
        echo "<td><img height='100' src='data:image/;base64,".base64_encode($producto['foto'])."' alt=''></td>";
        echo "<td><a href='eliminarProducto.php?idProd=".$producto['idProd']."'>Eliminar</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

$ventas = $cad->traeVentasPorIdVendedor($IdVendedor);

if ($ventas) {
    echo "<h3>Reporte de Tus Ventas</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>idVenta</th>";
    echo "<th>Fecha Venta</th>";
    echo "<th>idUsuario</th>";
    echo "<th>idProd</th>";
    echo "</tr>";

    foreach ($ventas as $venta) {
        echo "<tr>";
        echo "<td>".$venta['idVenta']."</td>";
        echo "<td>".$venta['fecha_venta']."</td>";
        echo "<td>".$venta['idUsuario']."</td>";
        echo "<td>".$venta['idProd']."</td>";
        echo "</tr>";
    }

    echo "</table>";
}


?>

<div class="button-container">
    <a href="http://localhost/Proyecto/bd/registroProducto.php"><button class="button">Agregar Producto</button></a>
</div>

<div class="button-container">
    <a href="http://localhost/Proyecto/principal.php"><button class="button">Volver a la página principal</button></a>
</div>
<div class="button-container">
    <a href="http://localhost/Proyecto/bd/Cerrar.php"><button class="button">Cerrar Sesión</button></a>
    <p><br><br></p>
</div>

</body>
</html>