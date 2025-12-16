<?php
    
    require_once 'CuentaBancaria.php';

    $cuenta = new CuentaBancaria("Pepe", 100);

    echo "Titular: {$cuenta->titular}<br>";
    echo "(imprime error)<br>";
    $cuenta->retirar(200);

    echo "(imprime éxito)<br>";
    $cuenta->retirar(50);
?>
