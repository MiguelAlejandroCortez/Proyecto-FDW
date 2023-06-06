<?php
require_once "CAD.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto/bd/cssBD/eliminaEstilos.css">
    <title>ADMIN</title>
</head>
<body>
    <h1>HOLA ADMINISTRADOR</h1>
    
    <?php
    $cad = new CAD();

    $usuarios = $cad->traeUsuarios();
    if ($usuarios) {
        echo "<h3>Usuarios</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        echo "<th>idUsuario</th>";
        echo "<th>Nombre</th>";
        echo "<th>Correo</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";

        foreach ($usuarios as $usuario) {
            echo "<tr>";
            $idUsuario = $usuario['idUsuario'];
            echo "<td>".$idUsuario."</td>";
            echo "<td>".$usuario['nombre']."</td>";
            echo "<td>".$usuario['correoe']."</td>";
            echo "<td><a href='elimina.php?idUsuario=$idUsuario'>Elimina</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $vendedores = $cad->traeTodosVendedores();
    if ($vendedores) {
        echo "<h3>Vendedores</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        echo "<th>idVendedor</th>";
        echo "<th>Nombre</th>";
        echo "<th>Correo</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";

        foreach ($vendedores as $vendedor) {
            echo "<tr>";
            $idVendedor = $vendedor['IdVendedor'];
            echo "<td>".$idVendedor."</td>";
            echo "<td>".$vendedor['nombre']."</td>";
            echo "<td>".$vendedor['correoe']."</td>";
            echo "<td><a href='eliminaVendedor.php?idVendedor=$idVendedor'>Elimina</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $ventas = $cad->traeTodasVentas();
    if ($ventas) {
        echo "<h3>Reporte de Ventas</h3>";
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
            echo "<td>".$venta['fecha_Venta']."</td>";
            echo "<td>".$venta['idUsuario']."</td>";
            echo "<td>".$venta['idProd']."</td>";
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
