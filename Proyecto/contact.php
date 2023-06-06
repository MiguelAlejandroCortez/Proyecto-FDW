<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Proyecto/css/principalEstilos.css">
    <link rel="stylesheet" href="http://localhost/Proyecto/css/contactEstilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENGSUP</title>
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

    <div class="contenido">
        <p>Nuestra empresa se dedica a brindar apoyo a los ingenieros en proceso, proporcionando una amplia gama de equipos útiles y necesarios para su trabajo. Entendemos que los ingenieros necesitan contar con herramientas adecuadas y equipos de calidad para llevar a cabo sus proyectos de manera eficiente y exitosa. Es por eso que nos esforzamos por ofrecer una selección diversa de productos, que van desde equipos básicos hasta soluciones más especializadas.
            Nos enorgullece ofrecer a los ingenieros una variedad de opciones asequibles, para que puedan encontrar el equipo que necesitan sin comprometer su presupuesto. Creemos que el acceso a equipos de calidad no debería ser limitado por cuestiones económicas, por lo que nos esforzamos por mantener precios competitivos y proporcionar opciones de financiamiento cuando sea necesario.
            <br><br>Nuestro objetivo es convertirnos en el aliado confiable de los ingenieros, brindándoles una experiencia de compra conveniente y satisfactoria. Trabajamos en estrecha colaboración con fabricantes y proveedores de renombre para garantizar la calidad y confiabilidad de nuestros productos. Además, nuestro equipo de atención al cliente está siempre disponible para brindar asistencia y asesoramiento personalizado, ayudando a los ingenieros a tomar decisiones informadas sobre sus compras.
            En resumen, estamos comprometidos a ser la opción preferida de los ingenieros en busca de equipos útiles y necesarios para su trabajo. Nos esforzamos por ofrecer una amplia variedad de opciones a precios accesibles, sin comprometer la calidad. Nuestra misión es apoyar a los ingenieros en su proceso, brindándoles las herramientas adecuadas para llevar a cabo sus proyectos de manera exitosa.
        </p>
        <p class="TextCentrado">
            ¡¡¡Unete a nuestro equipo de trabajo!!!
        </p>
        <div class="imagen-contenido">
            <img src="LOGOS/suplies-creaHistoria.JPG" alt="Descripcion" class="Unete-imagen">
        </div>
        <p class="TextCentradoDir">
            Encuentranos en Álvaro Obregón 64, Centro, 78300 San Luis, S.L.P.
        </p>
        <div class="Imagenes-contenido">
            <img src="LOGOS/suplies-visita.JPG" alt="Descripcion" class="Visita-imagen">
            <a href="https://www.google.com/maps/@22.1445803,-101.0167599,17z?hl=es&entry=ttu">
                <img src="LOGOS/Mapa.JPG" alt="Descripcion" class="Mapa-imagen">
            </a>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>