<?php
session_start();
require_once "bd/CAD.php";

if (isset($_POST['userId']) && isset($_POST['idProd'])) {
    $userId = $_POST['userId'];
    $idProd = $_POST['idProd'];

    // Crear una instancia de la clase CAD
    $cad = new CAD();

    $producto = $cad->traeProductoPorId($idProd);
    $stock = $producto['stock'];

    if ($stock > 0) {
        $resultado = $cad->nuevaVenta($userId, $idProd);

        if ($resultado) {
            $precioProducto = $producto['precio'];

            $usuario = $cad->traeUsuarioPorId($userId);
            $montoActual = $usuario['monto'];

            // se resta para obtener el nuevo monto
            $nuevoMonto = $montoActual - $precioProducto;

            $cad->actualizarMontoUsuario($userId, $nuevoMonto);
            $cad->actualizarStockProducto($idProd, $stock - 1);

            echo "La venta se ha registrado correctamente";
        } else {
            echo "Hubo un error al registrar la venta";
        }
    } else {
        echo "Stock vacío";
    }
}
?>
