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
    <title>ELIMINA</title>
</head>
<body>
    <h1>Elimina usuarios</h1>
    
    <?php
        $cad = new CAD();

        if(isset($_GET['idUsuario']))
        {
            if($cad->eliminaUsuario($_GET['idUsuario']))
            {
                header("location: SesionAdmi.php");
               # echo "Usuario eliminado";
            }
        }

        $datos = $cad->traeUsuarios();
        if($datos)
        {
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr>";
            echo "<th>idUsuario</th>";
            echo "<th>Nombre</th>";
            echo "<th>Correo</th>";
            echo "<th>Eliminar</th>";
            echo "</tr>";

            foreach($datos as $registro)
            {
                echo "<tr>";
                $idUsuario = $registro['idUsuario'];
                echo "<td>".$idUsuario."</td>";
                echo "<td>".$registro['nombre']."</td>";
                echo "<td>".$registro['correoe']."</td>";
                echo "<td><a href='elimina.php?idUsuario=$idUsuario'>Elimina</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    <div class="button-container">
        <a href="http://localhost/Proyecto/principal.php"><button class="button">Volver a la página principal</button></a>
    </div>
</body>
</html>