<?php
include_once('Persona.php');
class Alumno extends Persona
{
    public $legajo;

    public function __construct($nom, $ape, $dn, $leg){
        parent::__construct($dn, $nom, $ape);
        $this->legajo = $leg;
    } 

    public function toJSON(){
        return json_encode($this);
    } 
}

?>