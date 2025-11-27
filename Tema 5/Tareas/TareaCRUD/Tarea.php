<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio CRUD</title>
</head>
<body>
    <?php
        class Tarea {
            public $descripcion;
            public $prioridad;

            public function __construct($descripcion, $prioridad) {
                $this->descripcion = $descripcion;
                $this->prioridad = $prioridad;
            }
        }

    ?>
</body>
</html>