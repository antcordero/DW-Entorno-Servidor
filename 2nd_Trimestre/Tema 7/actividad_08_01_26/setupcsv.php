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

    // 1. VACIADO DE TABLA (TRUNCATE)
    // Esto borra todos los datos y reinicia los IDs a 1.
    // Es mucho más rápido que DELETE FROM.
    $pdo->exec("TRUNCATE TABLE productos");
    echo "[OK] Tabla vaciada correctamente.<br>";

    // 2. IMPORTACIÓN
    $gestor = fopen($csvFile, "r");
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)");

    // Saltamos cabecera
    fgetcsv($gestor); 

    $contador = 0;
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        // Asumimos CSV: Nombre, Precio, Stock
        $stmt->execute([ $datos[0], $datos[1], $datos[2] ]);
        $contador++;
    }

    $pdo->commit();
    fclose($gestor);

    echo "<div style='color:green; font-weight:bold; border:1px solid green; padding:10px;'>";
    echo "✅ ÉXITO: Se han borrado los datos viejos y se han cargado $contador productos del CSV.";
    echo "</div>";

} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "ERROR: " . $e->getMessage();
}
?>