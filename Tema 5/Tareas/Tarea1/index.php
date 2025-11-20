<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Gestor de Productos</title>
</head>
<body>
    <?php
        require_once 'Producto.php';

        $objeto = new Producto("Teclado Gamer", 50);
        $objeto->mostrarInfo();

        //cambiar el precio a 45
        $objeto->setPrecio(45);
        echo "<br>Después de la rebaja:<br>";
        $objeto->mostrarInfo();
    ?>
</body>
</html>