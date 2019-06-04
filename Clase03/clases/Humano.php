<?php
    class Humano
    {
        #Atributos
        public $nombre;
        public $apellido;

        #Constructor
        public function __construct($nombreAux, $apellidoAux)
        {
            $this->nombre = $nombreAux;
            $this->apellido = $apellidoAux;
        }

        #Metodos
        public function ToJson()
        {
            return json_encode($this);
        }
    }

?>