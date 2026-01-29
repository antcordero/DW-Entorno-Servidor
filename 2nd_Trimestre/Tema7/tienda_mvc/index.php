<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de tienda</title>
</head>
<body>
    <h1>Gestión de Productos</h1>
    <a href="crear.php"> + Añadir un Nuevo Producto</a>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
            include "dbTienda.php";
            $tienda = new dbTienda(); //Crear el objeto de la base de datos
            $lista = $tienda->listaProductos(); //Obtener la lista de productos
            //Recorrer la lista (array) para mostrar los productos
            if ($lista != null) {
                foreach($lista as $producto) {
                    echo "<tr>";
                    echo "<td>".$producto['id']."</td>";
                    echo "<td>".$producto['nombre']."</td>";
                    echo "<td>".$producto['precio']."€</td>";
                    echo "<td>".$producto['stock']."</td>";
                    echo "<td><a href='editar.php?id=".$producto['id']."'>Editar</a> | <a href='borrar.php?id=".$producto['id']."'>Borrar</a></td>";
                    echo "</tr>";
                }
            }

        ?>
    </table>
</body>
</html>