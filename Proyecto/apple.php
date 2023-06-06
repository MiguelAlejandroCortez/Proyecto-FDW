<?php
session_start();
require_once "bd/CAD.php";

// Crear una instancia de la clase CAD
$cad = new CAD();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Proyecto/css/principalEstilos.css">
    <link rel="stylesheet" href="http://localhost/Proyecto/css/merchNewEstilos.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENGSUP</title>
</head>
<body>
<?php 
    if(!isset($_SESSION['rol'])){
        $_SESSION['rol'] = 0;
    }

    if($_SESSION['rol'] == 1){
        include 'header3.php';
    }elseif($_SESSION['rol'] == 2){
        include 'header2.php';
    }elseif($_SESSION['rol'] == 3){
        include 'header4.php';
    }else{
        include 'header.php';
    }
?>

<h1>MERCANCIA DE HEADPHONES APPLE</h1>

    <?php
    $producto = "APPLE";
    $productos = $cad->verificaProductoConFoto($producto);

    foreach($productos as $producto){
        echo '<div class="producto-container">';
        echo '<a href="http://localhost/Proyecto/producto.php?idProd=' . $producto['idProd'] . '">';        
        echo '<span class="nombre">' . $producto['nombre'] . '</span><br>';
        echo '<img height="200" width="250" src="data:image/;base64,' . base64_encode($producto['foto']) . '" alt=""><br>';
        echo '<span class="precio">' .'$'. $producto['precio'] . '</span><br>';
        echo '</a>';
        echo '</div>';
    }
    ?>

    <?php include 'footer.php'; ?>
</body>
</html>