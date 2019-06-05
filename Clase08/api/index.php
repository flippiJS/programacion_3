<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/cdApi.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

// API group

$app->group('/api', function () {
 
    $this->get('/', \cdApi::class . ':traerTodos');
   
    $this->get('/{id}', \cdApi::class . ':traerUno');
  
    $this->post('/', \cdApi::class . ':CargarUno');
  
    $this->delete('/', \cdApi::class . ':BorrarUno');
  
    $this->put('/', \cdApi::class . ':ModificarUno');
       
});

$app->run();