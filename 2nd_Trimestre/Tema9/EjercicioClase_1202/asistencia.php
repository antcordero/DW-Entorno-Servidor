<?php
session_start();
// 1. SEGURIDAD
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

require 'db.php';
include 'menu.php';

// 2. OBTENER DATOS DE LA BBDD
// Vamos a contar cuántas veces aparece cada estado
$sql = "SELECT estado, COUNT(*) as cantidad FROM asistencia GROUP BY horas";
$resultado = $conexion->query($sql);

// Preparamos arrays para javascript
$etiquetas = []; // Guardará: "Presente", "Falta"...
$datos = [];     // Guardará: 7, 2, 1...

while($fila = $resultado->fetch_assoc()) {
    $etiquetas[] = $fila['estado'];
    $datos[] = $fila['cantidad'];
}
?>

<h1>Control de Asistencia</h1>
<p>Aquí puedes ver visualmente tu rendimiento en el curso.</p>

<div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
    
    <div style="width: 400px; height: 400px;">
        <canvas id="miGrafica"></canvas>
    </div>

    <div style="padding: 20px;">
        <h3>Resumen Numérico:</h3>
        <ul>
            <?php 
            // Recorremos los datos para mostrarlos en lista también
            for($i=0; $i<count($etiquetas); $i++) {
                echo "<li><strong>" . $etiquetas[$i] . ":</strong> " . $datos[$i] . " horas</li>";
            }
            ?>
        </ul>
    </div>
</div>

</div> <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Recogemos el Canvas del HTML
    const ctx = document.getElementById('miGrafica').getContext('2d');

    // Pasamos los datos de PHP a Javascript usando json_encode
    const etiquetasDesdePHP = <?php echo json_encode($etiquetas); ?>;
    const datosDesdePHP = <?php echo json_encode($datos); ?>;

    // Creamos el gráfico
    new Chart(ctx, {
        type: 'doughnut', // TIPO DE GRÁFICO: 'bar' (barras), 'pie' (tarta), 'doughnut' (donu), 'line' (linea)
        data: {
            labels: etiquetasDesdePHP,
            datasets: [{
                label: 'Número de días',
                data: datosDesdePHP,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Verde para el primero (Presente)
                    'rgba(255, 99, 132, 0.6)', // Rojo para el segundo (Falta)
                    'rgba(255, 206, 86, 0.6)'  // Amarillo para el tercero (Justificada)
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Distribución de Asistencias'
                }
            }
        }
    });
</script>

</body>
</html>