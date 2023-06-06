<?php
session_start();
require_once "CAD.php";

if (isset($_GET['idVenta'])) {
    $cad = new CAD();
    $idVenta = $_GET['idVenta'];
    $cad->eliminarVenta($idVenta);
}

header("Location: SesionCliente.php");
exit;
?>