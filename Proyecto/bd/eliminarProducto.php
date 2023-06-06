<?php
session_start();
require_once "CAD.php";

if (isset($_GET['idProd'])) {
    $cad = new CAD();
    $idProd = $_GET['idProd'];
    $cad->eliminarProducto($idProd);
}

header("Location: SesionVendedor.php");
exit;
?>
