<?php
// Variables
$hola = 'hola';
$nombre = 'fran';

// Print
//echo($hola. ' ' .$nombre);
//echo "\n";
//echo("$hola $nombre");
//echo "\n";
//var_dump($hola);
//var_dump($nombre);

// Arrays
$heroes = ['IronMan', 'Cap America']; // 1ra forma asociativo
$heroes[] = '';
$heroes2 = array('IronMan', 'Cap America'); // 2ra forma asociativo
$heroes3['Nombre'] = 'IronMan'; // 1ra forma 
$heroes3['Superpoder'] = 'Volar'; // 1ra forma 
$heroes4 = array("Nombre" => "IronMan2", "Superpoder" => "Volar"); // 2ra forma 

//var_dump($heroes);
//var_dump($heroes2);
//var_dump($heroes3);
//var_dump($heroes4);

// Recorrer Arrays
foreach ($heroes2 as $key => $value) {
    //echo "$key $value";
}

// Variables Globales
//var_dump($_GET);
//var_dump($_POST);

$lista = array(1,2,3,4,5,6,7,8,9,10);

if($_GET['asc'] == '1'){
    sort($lista);
} else {
    rsort($lista);
}

foreach ($lista as $item) {
   // echo "$item ";
}

// Objetos
$persona = array("nombre" => "pepe");
$personaO = (Object)$persona;
//var_dump($personaO->nombre);
$personaStd = new stdClass();
$personaStd->nombre = "pepe";
var_dump($personaStd);
?>