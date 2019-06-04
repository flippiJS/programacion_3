<?php
    require_once "Persona.php";

    class Alumno extends Persona
    {
        #Atributos
        public $legajo;

        #Constructor
        public function __construct($nombreAux, $apellidoAux, $dniAux, $legajoAux)
        {
            parent::__construct($nombreAux, $apellidoAux, $dniAux);
            $this->legajo = $legajoAux;
        }

        #Metodos
        public function toJason()
        {
            return json_encode($this);
        }

        public function toCsv()
        {
            return $this->nombre.";".$this->apellido.";".$this->dni.";".$this->legajo.";".$this->photoId.";".PHP_EOL;
        }
    }

?>