<?php
    require_once 'TipoVehículos.php';
    //obtener todo lo de TipoVehículos.php en la clase

    class Flota {
        //array para almacenar los vehículos
        private $listaVehiculos;

        public function __construct() {
            $this->listaVehiculos = [];
        }

        //funciones para gestionar la flota
        public function agregarVehiculo(Vehiculo $nuevoVehiculo) {
            $this->listaVehiculos[] = $nuevoVehiculo;
        }

        //getter para obtener la lista de vehículos
        public function getVehiculos() {
            return $this->listaVehiculos;
        }

        //convertir todo el array de objetos en texto para que no pierda los datos al cerrar el php
        public function guardarEnTexto() {
            //codificación
            return base64_encode(serialize($this->listaVehiculos));
        }

        public function cargaDeTexto($texto) {
            if (!empty($texto)) {
                $datosRecuperados = unserialize(base64_decode($texto));
            }

            if ($datosRecuperados) {
                $this->listaVehiculos;
            }
        }
        
    }
?>