<?php
// ==========================================
// 1. CONFIGURACIÓN DE LA CONEXIÓN
// ==========================================
$servidor = "localhost";
$usuario  = "root";
$password = "";
$basedatos = "prueba";

// ==========================================
// 2. CREAR LA CONEXIÓN (El Puente)
// ==========================================
// 'new mysqli' crea un OBJETO que representa nuestra conexión.
// Si falla, el objeto contendrá los errores.
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

// ==========================================
// 3. VERIFICAR SI HUBO ERROR (Protocolo de Seguridad)
// ==========================================
// connect_errno devuelve un número de error. Si es 0 (false), todo fue bien.
if ($conexion->connect_errno) {
    // Si entra aquí, la conexión falló.
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit(); // 'exit' mata el script. No tiene sentido seguir sin base de datos.
}

// Opcional pero recomendado: Forzar UTF-8 para evitar problemas con tildes
$conexion->set_charset("utf8");

// ==========================================
// 4. PREPARAR Y LANZAR LA CONSULTA (Query)
// ==========================================
// Escribimos la sentencia SQL en una variable string
$sql = "SELECT id, nombre, apellido1, email FROM alumnos";

// Lanzamos la petición.
// OJO: $resultado NO son los datos todavía. Es un objeto "manejador" (un puntero).
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2 style="text-align:center;">👥 Usuarios Registrados</h2>

<?php
// ==========================================
// 5. MOSTRAR LOS DATOS (El Bucle)
// ==========================================

// Primero preguntamos: ¿Ha vuelto alguna fila?
if ($resultado->num_rows > 0) {

    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th></tr>";

    // EL BUCLE WHILE (La parte más importante)
    // fetch_assoc() hace dos cosas:
    // 1. Saca la siguiente fila de la caja de resultados.
    // 2. La convierte en un ARRAY ASOCIATIVO ($fila['nombre']).
    // Cuando se acaban las filas, devuelve FALSE y el bucle termina.
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['apellido1'] . "</td>";
        echo "<td>" . $fila['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center'>No hay usuarios en la base de datos.</p>";
}

// ==========================================
// 6. CERRAR CONEXIÓN (Limpieza)
// ==========================================
// Siempre es buena práctica cerrar lo que abres para liberar memoria en el servidor.
$conexion->close();
?>

</body>
</html>