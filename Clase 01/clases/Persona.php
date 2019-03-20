<?php
include_once('Humano.php');
abstract class Persona extends Humano
{
    public $dni;

    public function __construct($dn, $nom, $ape){
        parent::__construct($nom, $ape);
        $this->dni = $dn;
    }
}

?>