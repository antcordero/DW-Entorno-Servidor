<?php
// =================================================================
// B A C K E N D   (Espacio para el alumno)
// =================================================================

// 1. Estructura de Datos: Array Multidimensional Asociativo [cite: 9]
// TODO: Inicializa el array con los 4 productos que se ven en la foto (Auriculares, Monitor, Cable, Ratón)
// Asegúrate de usar las claves: 'id', 'categoria', 'nombre', 'precio', 'stock'.
$inventario = [
    // ... Rellenar aquí con los datos iniciales ...
];

// Variable para controlar qué lista mostrar (si la completa o la filtrada)
$productos_a_mostrar = $inventario;
$mensaje = "";

// 2. Funciones Personalizadas (Modularidad) [cite: 10]

/**
 * Función para Insertar un nuevo producto.
 * REQUISITO: Paso por referencia para modificar el array original 
 */
function agregarProducto(&$lista, $nombre, $categoria, $precio, $cantidad)
{
    // TODO:
    // 1. Validar que el precio no sea negativo y que el nombre no esté vacío[cite: 7].
    // 2. Crear el nuevo array asociativo del producto.
    // 3. Añadirlo al array original ($lista).
}

/**
 * Función para Buscar productos.
 * REQUISITO: Filtrar por nombre sin distinguir mayúsculas/minúsculas [cite: 5]
 */
function buscarProducto($lista, $termino)
{
    // TODO:
    // 1. Recorrer el array.
    // 2. Usar una función como strpos() o str_contains() ignorando mayúsculas.
    // 3. Retornar un nuevo array solo con las coincidencias.
    return []; // Cambiar esto por el array filtrado
}

// 3. Lógica del Formulario (Procesar POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // A) Si el usuario pulsó "Añadir al Inventario" [cite: 23]
    if (isset($_POST['accion']) && $_POST['accion'] === 'insertar') {
        // Recoger datos del formulario
        // Llamar a la función agregarProducto()
    }

    // B) Si el usuario pulsó "Filtrar Lista" [cite: 19]
    if (isset($_POST['accion']) && $_POST['accion'] === 'buscar') {
        // Recoger término de búsqueda
        // Llamar a la función buscarProducto() y actualizar $productos_a_mostrar
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ElectroShop Gestión</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Grid para los formularios */
        .forms-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
            color: #0056b3;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Botones */
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #0056b3;
        }

        .btn-green {
            background-color: #28a745;
        }

        .btn-blue:hover {
            background-color: #004494;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        .link-reset {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #0056b3;
            text-decoration: none;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        /* Estilos de Alerta  */
        .alerta-stock {
            color: red;
            font-weight: bold;
            background-color: #ffeeee;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>⚡ ElectroShop Gestión</h1>

        <div class="forms-container">

            <div class="card">
                <h3>🔍 Buscar Producto</h3>
                <form method="POST" action="">
                    <input type="hidden" name="accion" value="buscar">
                    <label>Nombre del producto:</label>
                    <input type="text" name="termino" placeholder="Ej: Monitor...">
                    <button type="submit" class="btn btn-blue">Filtrar Lista</button>
                    <a href="" class="link-reset">Ver Todos</a>
                </form>
            </div>

            <div class="card">
                <h3>➕ Nuevo Ingreso</h3>
                <form method="POST" action="">
                    <input type="hidden" name="accion" value="insertar">
                    <label>Nombre Producto:</label>
                    <input type="text" name="nombre" required>

                    <label>Categoría:</label>
                    <select name="categoria">
                        <option value="Audio">Audio</option>
                        <option value="Video">Video</option>
                        <option value="Cables">Cables</option>
                        <option value="Periféricos">Periféricos</option>
                    </select>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <input type="number" name="precio" step="0.01" placeholder="Precio €" required>
                        <input type="number" name="cantidad" placeholder="Cant." required>
                    </div>

                    <button type="submit" class="btn btn-green">Añadir al Inventario</button>
                </form>
                <?php if ($mensaje): ?>
                    <p style="color: red; text-align: center;"><?php echo $mensaje; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <h3>📦 Inventario Actual</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($productos_a_mostrar) > 0) {
                    foreach ($productos_a_mostrar as $producto) {
                        $clase_stock = ($producto['stock'] < 5) ? 'alerta-stock' : '';
                        $stock_texto = ($producto['stock'] < 5) ? "{$producto['stock']} (Reponer)" : $producto['stock'];
                        echo "<tr>
                                <td>{$producto['id']}</td>
                                <td>{$producto['categoria']}</td>
                                <td>{$producto['nombre']}</td>
                                <td>{$producto['precio']} €</td>
                                <td class='{$clase_stock}'>{$stock_texto}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr>
                    <td colspan='5' style='text-align:center; color: #999;'>
                        No hay productos para mostrar.
                    </td>
                </tr>";
                }
                ?>

                <tr>
                    <td colspan="5" style="text-align:center; color: #999;">
                        (Aquí debe aparecer el bucle PHP con los datos)
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>