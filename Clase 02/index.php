<?php

//Escribimos
$vNameFile = 'archivo.txt';
$vFile = fopen($vNameFile, 'a');
$vData = 'Prueba datos <br>';
fwrite($vFile, $vData);
fclose($vFile);

// Leemos
$vNameFile = 'archivo.txt';
$vFile = fopen($vNameFile, 'r');
$data = fread($vFile,filesize($vNameFile));
fclose($vFile);
echo $data;
?>