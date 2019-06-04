<?php
abstract class Humano
{
    public $nombre;
    public $apellido;

    public function __construct($nom, $ape){
        $this->nombre = $nom;
        $this->apellido = $ape;
    }
}

?>