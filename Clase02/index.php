<?php

//Escribimos
/* $vNameFile = 'archivo.txt';
$vFile = fopen($vNameFile, 'a');
$vData = 'Prueba datos <br>';
fwrite($vFile, $vData);
fclose($vFile); */

// Leemos
/* $vNameFile = 'archivo.txt';
$vFile = fopen($vNameFile, 'r');
$data = fread($vFile,filesize($vNameFile));
fclose($vFile);
echo $data; */

if(isset($_POST['texto'])) {
  $vTexto = $_POST['texto'];
  $listaNombre = [];
  array_push($listaNombre, $vTexto);
  agregarAlArchivo($listaNombre);
  foreach ($listaNombre as $nombre) {
   echo $nombre;
  }
} else {
  echo leerArchivo();
}

function agregarAlArray($array, $texto){
  array_push($array, $texto);
}

function agregarAlArchivo($array) {
  $vNameFile = 'archivo.txt';
  $vFile = fopen($vNameFile, 'a');
  $vData = $array;
  fwrite($vFile, $vData);
  fclose($vFile);
}

function leerArchivoAArray(){
  $vNameFile = 'archivo.txt';
  $vFile = fopen($vNameFile, 'r');
  //$data = fread($vFile,filesize($vNameFile));
  $listaNombre = array();

  $linea = fgets($vFile);
  while(! feof($vFile))
  {
    array_push($listaNombre, $linea);
    echo $linea;
    $linea = fgets($vFile);
  }

  fclose($vFile);
  return $listaNombre;
}

?>
