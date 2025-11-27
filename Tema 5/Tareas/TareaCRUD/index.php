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

        session_start();
        
        //Inicializar tareas solo si no existe la sesión
        if (!isset($_SESSION['tareas'])) {
            $_SESSION['tareas'] = [
                new Tarea("Comprar pan", "Alta"),
                new Tarea("Estudiar DWES", "Alta"),
                new Tarea("Ver serie", "Baja"),
            ];
        }
        $tareas = &$_SESSION['tareas'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Añadir nueva tarea
            if (isset($_POST['descripcion']) && isset($_POST['prioridad']) && !empty(trim($_POST['descripcion']))) {
                $tareas[] = new Tarea(trim($_POST['descripcion']), $_POST['prioridad']);
                $_SESSION['tareas'] = array_values($tareas);
            }
            
            // Eliminar tarea por índice
            if (isset($_POST['eliminar']) && is_numeric($_POST['eliminar'])) {
                $index = (int)$_POST['eliminar'];
                if ($index >= 0 && $index < count($tareas)) {
                    unset($tareas[$index]);
                    $_SESSION['tareas'] = array_values($tareas); // Reindexar después de eliminar
                }
            }
        }
    ?>

    <!--Formulario para añadir tareas-->
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
        <?php foreach ($tareas as $index => $tarea): ?>
        <tr>
            <td><?php echo $index; ?></td>
            <td><?php echo htmlspecialchars($tarea->descripcion); ?></td>
            <td><?php echo htmlspecialchars($tarea->prioridad); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="eliminar" value="<?php echo $index; ?>">
                    <button type="submit" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!--resetar tareas -->
    <form method="POST" action="" style="margin-top: 20px;">
        <input type="hidden" name="reset" value="1">
        <button type="submit" onclick="return confirm('¿Resetear a tareas iniciales?')">Resetear Tareas</button>
    </form>

    <?php
    //reset de la sesión
    if (isset($_POST['reset'])) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</body>
</html>
