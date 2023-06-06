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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto/css/principalEstilos.css">
    <link rel="stylesheet" href="http://localhost/Proyecto/css/merchInfoNewEstilos.css">
    <title>PRODUCTO</title>
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

    <?php
    if(isset($_GET['idProd'])){
        $idProd = $_GET['idProd'];
        $producto = $cad->traeProductoPorId($idProd);

        if($producto){
            echo '<div class="producto-detalles">';
            echo '<h1>DETALLES DEL PRODUCTO</h1>';
            echo '<span>Nombre: ' . $producto['nombre'] . '</span><br>';
            echo '<span>Precio: $' . $producto['precio'] . '</span><br>';
            echo '<img src="data:image/;base64,' . base64_encode($producto['foto']) . '" alt=""><br>';
            echo '<span>Descripcion: ' . $producto['descripcion'] . '</span><br>';
            echo '</div>';
        } else {
            echo 'El producto no existe.';
        }
    } else {
        echo 'No se ha seleccionado ningún producto.';
    }
    ?>

<?php
if($_SESSION['rol'] == 0){
    echo '<button class="BOTON" type="button" onclick="alert(\'Inicia sesión como cliente para comprar\')">COMPRAR</button>';
} elseif($_SESSION['rol'] == 2){
    $userId = $_SESSION['idUsuario'];
    $usuario = $cad->traeUsuarioPorId($userId);
    $monto = $usuario['monto'];

    if ($monto < $producto['precio']) {
        echo '<button id="btnComprar" class="BOTON" type="button" onclick="alert(\'Monto insuficiente\')">COMPRAR</button>';
    } elseif ($producto['stock'] > 0) {
        echo '<button id="btnComprar" class="BOTON" type="button" onclick="realizarVenta()">COMPRAR</button>';
    } else {
        echo '<button id="btnComprar" class="BOTON" type="button" onclick="alert(\'Stock vacío\')">COMPRAR</button>';
    }
}
?>

<?php include 'footer.php'; ?>

<script>
function realizarVenta() {
    var userId = <?php echo $userId; ?>;
    var idProd = <?php echo $idProd; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "nuevaVenta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert("Hubo un error al procesar la venta");
            }
        }
    };
    xhr.send("userId=" + userId + "&idProd=" + idProd);
}
</script>

</body>
</html>
