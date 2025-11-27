<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <?php

        include 'Tarea.php';

        //simular una lista de tareas usando un Array
        $tareas = [
            new Tarea("Comprar pan", "Alta"),
            new Tarea("Estudiar DWES", "Alta"),
            new Tarea("Ver serie", "Baja"),
        ];

        //formulario html para añadir nuevas tareas
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nuevaDescripcion = $_POST["descripcion"];
            $nuevaPrioridad = $_POST["prioridad"];
            $tareas[] = new Tarea($nuevaDescripcion, $nuevaPrioridad);
        }
    ?>

    <!-- Formulario para añadir tareas con botón-->
    <form method="POST" action="">
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <select name="prioridad">
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select>
        <button type="submit">Añadir Tarea</button>
    </form>

    <!--Mostrar la lista de tareas en tabla-->
    <h2>Lista de Tareas (CRUD Array)</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Prioridad</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($tareas as $tarea): ?>
        <tr>
            <!-- imprimir posición en el array -->
            <td><?php echo array_search($tarea, $tareas); ?></td>
            <td><?php echo htmlspecialchars($tarea->descripcion); ?></td>
            <td><?php echo htmlspecialchars($tarea->prioridad); ?></td>
            <td><?php echo '<button>Eliminar</button>'; ?></td>
        </tr>
        <?php endforeach; ?>


</body>
</html>