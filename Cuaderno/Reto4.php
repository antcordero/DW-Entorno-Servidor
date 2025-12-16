<?php
    $precioBase = 8;
    $esMiercoles = true;
    $tieneCarnetJoven = false;

    $precio = $precioBase;

    if ($esMiercoles) {
        $precio *= 0.8;
    }

    if ($tieneCarnetJoven) {
        $precio *= 0.9;
    }

    echo "Precio final: $precio €";
?>
