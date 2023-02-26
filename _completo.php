<?php 
require_once "include/gestionBbdd.php";
session_start();
if (isset($_POST['modificar'])) {
    $codOld = $_SESSION['cod'];
    $seccion = $_POST['seccion'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['pais'];
    $precio = $_POST['precio'];
    GestionBBDD::editarProducto($codOld, $seccion, $nombre, $fecha, $pais, $precio);
    header("Location: completo.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            background-color: rgb(248, 196, 100);
        }
        table {
            margin: 2rem auto;
            padding: 1rem;
            border: 3px solid orange;
        }
        .boton {
            text-align: center;
            padding-top: 1rem;
        }
        button {
            padding: .25rem .5rem;
        }
    </style>
</head>
<body>
    <table class="tabla">
        <form action="_completo.php" method="post">
        <?php
            $_SESSION['cod'] = $_POST['codigo'];
            $array_de_productos = GestionBBDD::productos();
            foreach ($array_de_productos as $pro) {
                if($pro->getCodigoProducto() == $_SESSION['cod']) {
                    echo "<tr><td><label>Código artículo</label></td><td><input type='text' name='cod' value='".$pro->getCodigoProducto()."'disabled></input></td></tr>";
                    echo "<tr><td><label>Sección</label></td><td><input type='text' name='seccion' value='".$pro->getSeccionProducto()."'></input></td></tr>";
                    echo "<tr><td><label>Nombre artículo</label></td><td><input type='text' name='nombre' value='".$pro->getNombreProducto()."'></input></td></tr>";
                    echo "<tr><td><label>Fecha</label></td><td><input type='text' name='fecha' value='".$pro->getFechaProducto()."'></input></td></tr>";
                    echo "<tr><td><label>País de origen</label></td><td><input type='text' name='pais' value='".$pro->getPaisProducto()."'></input></td></tr>";
                    echo "<tr><td><label>Precio</label></td><td><input type='text' name='precio' value='".$pro->getPrecioProducto()."'></input></td></tr>";
                    break;
                }
            }
        ?>
            <tr><td colspan="2" class="boton"><button type="submit" name="modificar">Actualizar</button></td></tr>
        </form>
    </table>
</body>
</html>