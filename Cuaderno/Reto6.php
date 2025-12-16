<?php
    $stock = [10, 5, 20, 0, 15];

    foreach ($stock as $indice => $cantidad) {
        if ($cantidad == 0) {
            unset($stock[$indice]);
        }
    }

    sort($stock);
    $stock = array_reverse($stock);
    $stock[] = 50;

    print_r($stock);
?>
