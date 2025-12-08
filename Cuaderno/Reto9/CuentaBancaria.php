<?php
    class CuentaBancaria {
        public $titular;
        private $saldo;

        public function __construct($titular, $saldoInicial) {
            $this->titular = $titular;
            $this->saldo   = $saldoInicial;
        }

        public function retirar($cantidad) {
            if ($cantidad <= $this->saldo) {
                $this->saldo -= $cantidad;
                echo "Retirados $cantidad €. Saldo actual: {$this->saldo} €<br>";
            } else {
                echo "Error: saldo insuficiente. Saldo actual: {$this->saldo} €<br>";
            }
        }
    }
?>