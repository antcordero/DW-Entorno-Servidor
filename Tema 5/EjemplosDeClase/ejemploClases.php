<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Clases - public vs private</title>
</head>
<body>
    <?php
        class Coche {
            public $color = "Verde";
        }

        $miCoche = new Coche();
        $miCoche->color = "Rojo";
        echo $miCoche->color;

        class CochePrivado {
            private $color = "Azul";
        }

        $miCochePrivado = new CochePrivado();
        //$miCochePrivado->color = "Amarillo"; //genera un error
        //echo $miCochePrivado->color;


        //Forma de acceder a una propiedad private -> getter y setter
        class CocheConGetterSetter {
            private $color = "Blanco";

            public function getColor() {
                return $this->color;
            }

            public function setColor($color) {
                $this->color = $color;
            }
        }
        
    ?>
</body>
</html>