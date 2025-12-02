<?php
    /*importar la clase sin exportar desde el otro archivo, la añade directamente */
    require_once "Asistente.php";

    class Evento {
        //array que almacena objetos
        private $listaAsistentes;
        private $capacidadMaxima;

        //constructor solo con capacidad
        public function __construct($capacidad) {
            $this->listaAsistentes = [];
            $this->capacidadMaxima = $capacidad;

            $this->listaAsistentes[] = new Asistente("Ana López", "ana@test", 25, "vip");
            $this->listaAsistentes[] = new Asistente("Luis Pérez", "luis@test", 19, "estudiante");

        }

        //método público para añadir asistentes
        public function registrarAsistente($asistente) {
            if (count($this->listaAsistentes) < $this->capacidadMaxima) {
                $this->listaAsistentes[] = $asistente;
                return true; //registro exitoso
            } else {
                return false; //registro fallido, capacidad máxima alcanzada
            }
        }

        //obtener la lista de asistentes
        public function getListaAsistentes() {
            return $this->listaAsistentes;
        }

        //función para obetener la recaudación total
        public function calcularRecaudacionTotal() {
            $total = 0;
            //recorrer la lista de asistentes
            forEach($this->listaAsistentes as $asistente) {
                $total += $asistente->calcularPrecio();
            }
            return $total;
        }

    }
?>