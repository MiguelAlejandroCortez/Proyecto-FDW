<?php
require_once "CAD.php";

if (isset($_GET['idVendedor'])) {
    $cad = new CAD();
    $idVendedor = $_GET['idVendedor'];

    if ($cad->eliminaVendedor($idVendedor)) {
        echo "Vendedor eliminado correctamente.";
        header("location: SesionAdmi.php");
    } else {
        echo "Error al eliminar el vendedor.";
    }
}