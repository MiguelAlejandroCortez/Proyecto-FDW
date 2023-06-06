<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ENGSUP</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Proyecto/css/principalEstilos.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        .img {
            position: relative; 
            top: 100px;
            left: 0;
            width: 100vw;
            height: 400px;
            z-index: -1;
        }
    </style>
</head>
<body>
<?php 
    session_start();

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

  <img src="LOGOS/suplies-circulos.JPG" alt="Descripcion" class="img">

  <?php include 'footer.php'; ?>
</body>
</html>