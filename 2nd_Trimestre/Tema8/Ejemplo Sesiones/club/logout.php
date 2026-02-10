<?php
session_start();
//Vaciamos todas todas las variables de sesión
session_unset();
//Destruimos la sesión
session_destroy();

header("Location: index.php?mensaje=Has salido correctamente");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Logout</h1>
</body>
</html>