<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo this - warning</title>
</head>
<body>
    <?php

        class ClaseEjemplo {
            public $var = 3;

            public function mostrarVar() {
                echo $this->var; //imprime 3
            }

            public function mostrarVar2() {
                //echo $var; //genera un warning
            }
        }

        $objeto = new ClaseEjemplo();
        $objeto->mostrarVar();
        $objeto->mostrarVar2();
    ?>

    
</body>
</html>