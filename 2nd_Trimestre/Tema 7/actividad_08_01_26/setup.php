<?php
// CONFIGURACIÓN DEL SERVIDOR
$host = 'localhost';
$user = 'root';
$pass = ''; // Dejar vacío en XAMPP por defecto
$dbName = 'tienda';

try {
    // 1. CONEXIÓN AL SERVIDOR MYSQL
    // Importante: No especificamos la base de datos en el DSN porque quizás no exista aún.
    $pdo = new PDO("mysql:host=$host", $user, $pass); // Conexión sin DB seleccionada con un sistema de objetos PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    echo "<h3>Iniciando script de instalacion...</h3>"; // Mensaje inicial de comprobación
    // 2. CREACIÓN DE LA BASE DE DATOS
    // La instrucción IF NOT EXISTS evita errores si el script se ejecuta dos veces.
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "[OK] Base de datos '$dbName' verificada.<br>";
    // 3. SELECCIÓN DE LA BASE DE DATOS
    $pdo->exec("USE $dbName");
    // 4. CREACIÓN DE LA TABLA
    $sqlTabla = "CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        precio DECIMAL(10, 2) NOT NULL,
        stock INT DEFAULT 0,
        fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;"; // MOTOR DEL QUE CORRE LA VERSIÓN NUEVA
    $pdo->exec($sqlTabla);
    echo "[OK] Tabla 'productos' verificada.<br>";
    // 5. INSERCIÓN MASIVA DE DATOS (SEEDING)
    // Primero comprobamos si la tabla ya tiene datos para no duplicarlos
    $stmt = $pdo->query("SELECT COUNT(*) FROM productos");
    $cantidadActual = $stmt->fetchColumn();
    if ($cantidadActual == 0) {
        echo "[INFO] La tabla esta vacia. Iniciando carga de 50 registros...<br>";
            // INICIO DE TRANSACCIÓN: Vital para el rendimiento en inserciones masivas
    $pdo->beginTransaction();
    // Preparamos la sentencia UNA sola vez fuera del bucle (Eficiencia)
    $insertStmt = $pdo->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");
    for ($i = 1; $i <= 50; $i++) {
        $nombre = "Articulo de prueba N. $i";
        $precio = rand(1000, 50000) / 100; // Genera precios entre 10.00 y 500.00
        $stock = rand(0, 100);
        $insertStmt->execute([$nombre, $precio, $stock]);
    }
        // CONFIRMACIÓN DE LA TRANSACCIÓN: Se guardan los 50 registros de golpe
        $pdo->commit();
        echo "[OK] Insercion masiva completada con exito.<br>";
    } else {
        echo "[INFO] La tabla ya contiene $cantidadActual registros. No se han insertado nuevos datos.<br>";
    }
} catch (PDOException $e) {
    // Si ocurre un error durante la transacción, revertimos los cambios
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    // Mostrar error de forma legible
    echo "<div style='background-color:#ffcccc; padding:10px; border:1px solid red;'>";
    echo "<strong>ERROR FATAL:</strong> " . $e->getMessage();
    echo "<br>Verifique que el usuario '$user' tiene permisos de creacion (CREATE/INSERT).";
    echo "</div>";
}
?>
