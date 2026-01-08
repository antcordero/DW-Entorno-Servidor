<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4.1 - Juego Cartas</title>
</head>
<body>
    <?php
        class Jugador {
            private $apodo;
            private $puntos;

            public function __construct($apodo, $puntos) {
                $this->apodo = $apodo;
                $this->puntos = $puntos;
            }

            public function getInfo($apodo, $puntos) {
                return "<li>Jugador[$apodo]: ($puntos puntos)</li>";
            }
        }

        $equipo = [];

        $jugador1 = new Jugador("Toni", 15);
        $jugador2 = new Jugador("Toni2", 20);
        $jugador3 = new Jugador("Toni3", 25);

        //añadir cada uno al array
        array_push($equipo, $jugador1, $jugador2, $jugador3);

        //vista del array
        foreach ($equipo as $jugador) {
            echo $jugador->getInfo($jugador->apodo, $jugador->puntos) . "<br>";
        }
    ?>
</body>
</html>