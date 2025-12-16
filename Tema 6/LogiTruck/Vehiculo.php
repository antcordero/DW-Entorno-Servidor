<?php

    //clase abstracta de vehiculo porque no se van a crear objetos de esta clase
    abstract class Vehiculo {
        //crear variables para que las vean las clases hijas
        protected $matricula;
        protected $marca;
        protected $cargaMaxima;

        protected function __construct($matricula, $marca, $cargaMaxima) {
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->cargaMaxima = $cargaMaxima;
        }

        public function getMatricula() {
            return $this->matricula;
        }

        public function getMarca() {
            return $this->marca;
        }

        //no se usan los set porque no se van a modificar los datos una vez creados los objetos

        //crear unn método abstracto para que las clases hijas lo implementen
        abstract public function calcularCostoEnvio($distanciaKm);

        //método get para obtener la información
        public function getInfo() {
            return "Vehículo: " . $this->marca . "[" . $this->matricula . "]";
        }


    }


?>