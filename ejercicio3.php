<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        $usuario = [
            'nombre' => 'Ana',
            'email' => 'ana@correo.com',
            'edad' => 25
        ];

        print_r($usuario);

        //llamar a un valor e imprimirlo
        echo $usuario['email'];
        print_r($usuario['email']);

        //asignar un nuevo valor
        $usuario['edad'] = 26;

        //suma
        $arrayNum = [1, 2];
        print_r($arrayNum[0] + $arrayNum[1]);

    ?>
</body>
</html>