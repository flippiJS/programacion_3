<?php
    require_once "Humano.php";

    class Persona extends Humano
    {
        #Atributos
        public $dni;

        #Constructor
        public function __construct($nombreAux, $apellidoAux, $dniAux)
        {
            parent::__construct($nombreAux, $apellidoAux);
            $this->dni = $dniAux;
        }

        #Metodos
        public function ToJson()
        {
            return json_encode($this);
        }     
    }

?>