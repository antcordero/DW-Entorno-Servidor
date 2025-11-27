<!-- Clase Tarea -->
<?php
    class Tarea {
        public $descripcion;
        public $prioridad;

        public function __construct($descripcion, $prioridad) {
            $this->descripcion = $descripcion;
            $this->prioridad = $prioridad;
        }
    }

?>
