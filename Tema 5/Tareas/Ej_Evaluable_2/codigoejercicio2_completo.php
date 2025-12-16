<?php
session_start();

//1. Estructura de datos
if(!isset($_SESSION["inventario"])) {
    $_SESSION["inventario"] = [
        [
            'id' => 1,
            'categoria' => 'Audio',
            'nombre' => 'Auriculares Bluetooth',
            'precio' => 29.99,
            'stock' => 15
        ],
        [
            'id' => 2,
            'categoria' => 'Video',
            'nombre' => 'Monitor 24 Pulgadas',
            'precio' => 120.50,
            'stock' => 3
        ],
        [
            'id' => 3,
            'categoria' => 'Cables',
            'nombre' => 'Cable HDMI 2m',
            'precio' => 9.99,
            'stock' => 50
        ],
        [
            'id' => 4,
            'categoria' => 'Periféricos',
            'nombre' => 'Ratón Inalámbrico',
            'precio' => 15.00,
            'stock' => 2
        ]
    ];
}

$inventario = &$_SESSION["inventario"];

$productos_a_mostrar = $inventario;
$mensaje = "";

function agregarProducto(&$lista, $nombre, $categoria, $precio, $cantidad) {
    
    if ($precio < 0 || empty(trim($nombre))) {
        return false;
    }

    $max_id = 0;
    foreach ($lista as $producto) {
        if ($producto["id"] > $max_id) {
            $max_id = $producto["id"];
        }
    }
    $nuevo_id = $max_id + 1;

    $nuevo_producto = [
        "id" => $nuevo_id,
        "categoria" => $categoria,
        "nombre" => trim($nombre),
        "precio" => floatval($precio),
        "stock" => intval($cantidad)
    ];

    $lista[] = $nuevo_producto;
    return true;
}

function buscarProducto($lista, $termino) {
    $resultados = [];

    if (empty(trim($termino))) {
        return $lista;
    }

    foreach ($lista as $producto) {
        // Usar stripos() para búsqueda case-insensitive
        if (stripos($producto["nombre"], $termino) !== false) {
            $resultados[] = $producto;
        }
    }
    
    return $resultados;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["accion"]) && $_POST["accion"] === "insertar") {
        $nombre = $_POST["nombre"] ?? "";
        $categoria = $_POST["categoria"] ?? "";
        $precio = $_POST["precio"] ?? 0;
        $cantidad = $_POST["cantidad"] ?? 0;

        if (agregarProducto($inventario, $nombre, $categoria, $precio, $cantidad)) {
            $mensaje = "✅ Producto añadido correctamente";
            $productos_a_mostrar = $inventario;
        } else {
            $mensaje = "❌ Error: Precio negativo o nombre vacío";
        }
    }

    if (isset($_POST["accion"]) && $_POST["accion"] === "buscar") {
        $termino = $_POST["termino"] ?? "";
        $productos_a_mostrar = buscarProducto($inventario, $termino);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ElectroShop Gestión</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
        .container { max-width: 1000px; margin: 0 auto; }
        
        /* Grid para los formularios */
        .forms-container { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .card h3 { margin-top: 0; color: #0056b3; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        
        input, select { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        
        /* Botones */
        .btn { width: 100%; padding: 10px; border: none; border-radius: 4px; color: white; font-weight: bold; cursor: pointer; }
        .btn-blue { background-color: #0056b3; }
        .btn-green { background-color: #28a745; }
        .btn-blue:hover { background-color: #004494; }
        .btn-green:hover { background-color: #218838; }
        .link-reset { display: block; text-align: center; margin-top: 10px; color: #0056b3; text-decoration: none; }

        /* Tabla */
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #333; color: white; }
        
        /* Estilos de Alerta  */
        .alerta-stock { color: red; font-weight: bold; background-color: #ffeeee; }
        
        /* Mensajes */
        .mensaje-exito { color: #28a745; text-align: center; font-weight: bold; padding: 10px; }
        .mensaje-error { color: #dc3545; text-align: center; font-weight: bold; padding: 10px; }
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
                <input type="text" name="termino" placeholder="Ej: Monitor..." value="<?php echo isset($_POST["termino"]) ? htmlspecialchars($_POST["termino"]) : ""; ?>">
                <button type="submit" class="btn btn-blue">Filtrar Lista</button>
                <a href="" class="link-reset">Ver Todos</a>
            </form>
        </div>

        <div class="card">
            <h3>➕ Nuevo Ingreso</h3>
            <form method="POST" action="">
                <input type="hidden" name="accion" value="insertar">
                <label>Nombre Producto:</label>
                <input type="text" name="nombre" required value="<?php echo isset($_POST["nombre"]) ? htmlspecialchars($_POST["nombre"]) : ""; ?>">
                
                <label>Categoría:</label>
                <select name="categoria">
                    <option value="Audio" <?php echo (isset($_POST["categoria"]) && $_POST["categoria"] == "Audio") ? "selected" : ""; ?>>Audio</option>
                    <option value="Video" <?php echo (isset($_POST["categoria"]) && $_POST["categoria"] == "Video") ? "selected" : ""; ?>>Video</option>
                    <option value="Cables" <?php echo (isset($_POST["categoria"]) && $_POST["categoria"] == "Cables") ? "selected" : ""; ?>>Cables</option>
                    <option value="Periféricos" <?php echo (isset($_POST["categoria"]) && $_POST["categoria"] == "Periféricos") ? "selected" : ""; ?>>Periféricos</option>
                </select>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <input type="number" name="precio" step="0.01" placeholder="Precio €" required value="<?php echo isset($_POST["precio"]) ? htmlspecialchars($_POST["precio"]) : ""; ?>">
                    <input type="number" name="cantidad" placeholder="Cant." required value="<?php echo isset($_POST["cantidad"]) ? htmlspecialchars($_POST["cantidad"]) : ""; ?>">
                </div>

                <button type="submit" class="btn btn-green">Añadir al Inventario</button>
            </form>
            <?php if($mensaje): ?>
                <p class="<?php echo strpos($mensaje, "✅") !== false ? "mensaje-exito" : "mensaje-error"; ?>"><?php echo $mensaje; ?></p>
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
                    $clase_stock = ($producto["stock"] < 5) ? "alerta-stock" : "";
                    $texto_stock = ($producto["stock"] < 5) ? $producto["stock"] . " (Reponer)" : $producto["stock"] . " u.";
                    
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($producto["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($producto["categoria"]) . "</td>";
                    echo "<td>" . htmlspecialchars($producto["nombre"]) . "</td>";
                    echo "<td>" . number_format($producto["precio"], 2) . " €</td>";
                    echo "<td class='$clase_stock'>" . $texto_stock . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5 style='text-align:center; color: #999;'>No se encontraron productos</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>