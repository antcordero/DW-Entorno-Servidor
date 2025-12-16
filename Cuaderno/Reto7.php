<?php
$alumnos = [
    "Aitor Menta" => [
        "Matemáticas" => 7,
        "Lengua"       => 4,
        "Inglés"       => 6
    ],
    "Elsa Pato" => [
        "Matemáticas" => 3,
        "Lengua"       => 5,
        "Inglés"       => 4
    ],
    "Esteban Quito" => [
        "Matemáticas" => 9,
        "Lengua"       => 8,
        "Inglés"       => 7
    ]
];

foreach ($alumnos as $nombre => $notas) {
    $suma = 0;
    $numAsignaturas = 0;

    foreach ($notas as $asignatura => $nota) {
        $suma += $nota;
        $numAsignaturas++;
    }

    $media = $suma / $numAsignaturas;

    $colorNombre = ($media < 5) ? "red" : "black";

    echo "<div style='border:1px solid #ccc; margin:10px; padding:10px;'>";
    echo "<h3 style='color:$colorNombre;'>$nombre</h3>";
    echo "<p>Nota media: $media</p>";
    echo "</div>";
}
?>
