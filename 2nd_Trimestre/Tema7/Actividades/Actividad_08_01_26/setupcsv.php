<?php
// CONFIGURACIÓN
$host = 'localhost';
$user = 'root';
$pass = ''; 
$dbName = 'tienda';
$csvFile = 'datos.csv';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Aseguramos base de datos y tabla
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4");
    $pdo->exec("USE $dbName");

    // Creamos la tabla si no existe
    $pdo->exec("CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        precio DECIMAL(10, 2) NOT NULL,
        stock INT DEFAULT 0
    ) ENGINE=InnoDB;");

    // Verificamos si existe el CSV
    if (!file_exists($csvFile)) {
        throw new Exception("Falta el archivo $csvFile");
    }

    echo "<h3>♻️ Reiniciando tabla e importando CSV...</h3>";

    // 1. Vaciar tabla
    $pdo->exec("TRUNCATE TABLE productos");
    echo "[OK] Tabla vaciada correctamente.<br>";

    // 2. Importar CSV
    $gestor = fopen($csvFile, "r");
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");

    // Saltar cabecera
    fgetcsv($gestor); 

    $contador = 0;
    while (($datos = fgetcsv($gestor, 1000, ",")) !== false) {
        $stmt->execute([$datos[0], $datos[1], $datos[2]]);
        $contador++;
    }

    $pdo->commit();
    fclose($gestor);

    echo "<div style='color:green; font-weight:bold; border:1px solid green; padding:10px;'>";
    echo "✅ ÉXITO: Se han borrado los datos viejos y se han cargado $contador productos del CSV.";
    echo "</div>";

    //mostrar datos
    $sql = "SELECT id, nombre, precio, stock FROM productos";
    $result = $pdo->query($sql);

    echo "<h3>Listado de productos</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio (€)</th>
            <th>Stock</th>
          </tr>";

    // Recorremos los resultados y los mostramos
    while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['precio']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['stock']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "ERROR: " . $e->getMessage();
}
?>
