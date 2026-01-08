<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Gestor de Productos</title>
</head>
<body>
    <?php
        class Producto {
            private $nombre;
            private $precio;

            //constructor
            public function __construct($nombre, $precio) {
                $this->nombre = $nombre;
                $this->precio = $precio;
            }

            //método mostrarInfo
            public function mostrarInfo() {
                echo "El producto " . $this->nombre . " cuesta " . $this->precio . " euros.";
            }

            //getter
            public function getNombre() {
                return $this->nombre;
            }

            //setter
            public function setPrecio($nuevoPrecio) {
                $this->precio = $nuevoPrecio;
            }
        }
    ?>
</body>
</html>