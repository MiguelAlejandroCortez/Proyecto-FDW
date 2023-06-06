<?php

require_once "CAD.php";

if (!isset($_SESSION['IdVendedor'])) {
    header("Location: registroProducto.php");
    exit;
}

$cad = new CAD();
if (isset($_POST['nombreProducto']) && isset($_POST['precio']) && isset($_POST['descripcion']) && isset($_POST['categoria']) && isset($_POST['marca']) && isset($_POST['stock'])) {
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = $_FILES['imagen']['tmp_name'];
        $imagenContent = addslashes(file_get_contents($imagen));

        $idVendedor = $_SESSION['IdVendedor'];

        $cad->agregaProducto($_POST['nombreProducto'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $_POST['marca'], $imagenContent, $idVendedor, $_POST['stock']);
        header("Location: SesionVendedor.php");
    }
}

unset($_POST['nombreProducto']);
unset($_POST['precio']);
unset($_POST['descripcion']);
unset($_POST['categoria']);
unset($_POST['marca']);
unset($_POST['stock']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/Proyecto/bd/cssBD/registroProdEstilos.css">
    <title>Registro Producto</title>
</head>
<body>
    <form action="registroProducto.php" method="POST" enctype="multipart/form-data">
        <span>Nombre del Producto:</span>
        <input type="text" name="nombreProducto" required><br>
        <span>Precio del producto:</span>
        <input type="text" name="precio" required><br>
        <span>Descripcion del producto:</span>
        <input type="text" name="descripcion" required><br>
        <span>Categoria del producto:</span>
        <input type="text" name="categoria" required><br>
        <span>Marca del producto:</span>
        <input type="text" name="marca" required><br>
        <span>Stock del producto:</span>
        <input type="number" name="stock" required><br>
        <input type="file" name="imagen" required>
        <br><br>
        <input type="submit" value="Registrate">
    </form>
    <div class="button-container">
            <a href="http://localhost/Proyecto/bd/SesionVendedor.php"><button class="button">REGRESAR</button></a>
            <p><br><br></p>
    </div>

</body>
</html>