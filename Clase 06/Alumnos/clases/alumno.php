<?php

    class Alumno
    {
        #Atributos
        public $id;
        public $nombre;
        public $legajo;
        public $localidad;

        #Constructor
        public function __construct($id, $nombre, $legajo, $localidad)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->legajo = $legajo;
            $this->localidad = $localidad;
        }

        #Metodos
        public function toJason()
        {
            return json_encode($this);
        }

        public function toCsv()
        {
            return $this->id.';'.$this->nombre.";".$this->legajo.";".$this->localidad.PHP_EOL;
        }

        
    }
?>
