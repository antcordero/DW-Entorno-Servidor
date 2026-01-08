<?php
    class Carta {
        public $palo;
        public $numero;

        public function __construct($palo, $numero) {
            $this->palo = $palo;
            $this->numero = $numero;
        }

        public function mostrar() {
            return "$this->numero de $this->palo";
        }
    }

    $palos = ["oros", "copas", "espadas", "bastos"];
    $baraja = [];

    foreach ($palos as $palo) {
        for ($num = 1; $num <= 10; $num++) {
            $baraja[] = new Carta($palo, $num);
        }
    }

    shuffle($baraja);

    for ($i = 0; $i < 5; $i++) {
        echo $baraja[$i]->mostrar() . "<br>";
    }
?>
