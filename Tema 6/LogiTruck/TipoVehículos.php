<?php
    require_once 'Vehiculo.php';
    //obtener todo lo de Vehiculo.php en la clase

    class Furgoneta extends Vehiculo {
        //coste de envío
        public function calcularCostoEnvio($distanciaKm) {
            //coste fijo por km para furgonetas
            $precioPorKm = 0.50; //ejemplo: 0.5 unidades monetarias por km
            return $distanciaKm * $precioPorKm;

            //lógica con condicionales
            if ($this->cargaMaxima <= 3000) {
                return $distanciaKm * $precioPorKm;
            } else {
                return $distanciaKm * ($precioPorKm * 1.30);
            }
        }
    }

    class Camion extends Vehiculo {
        private $esRefrigerado;

        public function __construct($matricula, $marca, $carga, $refrigerado) {
            parent::__construct($matricula, $marca, $carga);
            $this->esRefrigerado = $refrigerado;
        }

        public function calcularCostoEnvio($distanciaKm) {
            $precioPorKm = 1;
            $costeFijo = 50;
            $total = ($distanciaKm * $precioPorKm) + $costeFijo;
            
            if ($this->esRefrigerado) {
                $total = $total * 1.25;
            }

            return $total;
        }
    }
?>