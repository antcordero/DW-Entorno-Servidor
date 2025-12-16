<?php
    class Asistente {
        private $nombre; //variable super global con el nombre del asistente
        private $email;
        private $edad;
        private $tipoEntrada;

        public function __construct($nombre, $email, $edad, $tipoEntrada) {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->edad = $edad;
            $this->tipoEntrada = $tipoEntrada;
        }

        //getters -> para obtener los valores de las variables privadas
        public function getNombre() {
            return $this->nombre;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getEdad() {
            return $this->edad;
        }

        public function getTipoEntrada() {
            return $this->tipoEntrada;
        }

        //setters -> para modificar los valores de las variables privadas
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }

        public function setTipoEntrada($tipoEntrada) {
            $this->tipoEntrada = $tipoEntrada;
        }

        //funciones

        //función pública para calcular el precio con una estrucutura de control 
        public function calcularPrecio() {
            $precioBase = 50; //Establecer precio base de la entrada
            switch ($this->tipoEntrada) {
                case "vip":
                    return $precioBase * 2;
                case "estudiante":
                    return $precioBase * 0.5;
                case "estudiante":
                    return $precioBase;
            }
        }

        
    }
?>