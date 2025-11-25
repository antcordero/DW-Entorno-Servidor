<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletín de Notas Digital</title>
    <style>
        table { 
            border: 1px solid grey;
            width: 80%; 
            margin: 20px auto; 
        }
        th, td { 
            border: 1px solid grey; 
            padding: 10px; 
            text-align: center; 
        }
        th {
            background-color: #7a7a7aff; 
        }

        
    </style>
</head>
<body>
    <?php
        $clase = [
            [
                "nombre" => "Pablo Gómez",
                "grupo" => "1A",
                "notas" => [
                    "DWECL" => 8,
                    "DWES" => 7,
                    "Despliegue" => 9
                ]
            ],
            [
                "nombre" => "Luis García",
                "grupo" => "1B",
                "notas" => [
                    "DWECL" => 4,
                    "DWES" => 3,
                    "Despliegue" => 2
                ]
            ],
            [
                "nombre" => "Marta López",
                "grupo" => "1A",
                "notas" => [
                    "DWECL" => 4,
                    "DWES" => 4.5,
                    "Despliegue" => 5
                ]
            ],
            [
                "nombre" => "Ana Ruiz",
                "grupo" => "1B",
                "notas" => [
                    "DWECL" => 9,
                    "DWES" => 9.5,
                    "Despliegue" => 10
                ]
            ]
        ];

        //tabla con las notas de todos los alumnos
        echo "<table>";
        echo "<tr>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>DWECL</th>
                <th>DWES</th>
                <th>Despliegue</th>
                <th>Media</th>
                <th>Promociona</th>
              </tr>";
        foreach ($clase as $alumno) {
            $notas = $alumno['notas'];
            $sumaNotas = array_sum($notas);
            $media = $sumaNotas / count($notas);
            //promociona o no si la media es >= 5
            if ($media >= 5) {
                $promociona = "SI";
            } else {
                $promociona = "NO";
            }
            //dar color
            if ($media < 5) {
                $colorMedia = "red";
            } else {
                $colorMedia = "green";
            }
          echo "<tr>
                    <td>" . $alumno['nombre'] . "</td>
                    <td>" . $alumno['grupo'] . "</td>
                    <td>" . $notas['DWECL'] . "</td>
                    <td>" . $notas['DWES'] . "</td>
                    <td>" . $notas['Despliegue'] . "</td>
                    <td style='color: " . $colorMedia . ";'><strong>" . number_format($media, 2) . "</strong></td>
                    <td>" . $promociona . "</td>
                  </tr>";
        }
        echo "</table>";
    ?>
</body>
</html>